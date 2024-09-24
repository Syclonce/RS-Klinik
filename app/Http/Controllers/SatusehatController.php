<?php

namespace App\Http\Controllers;

use App\Models\poli;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use LZCompressor\LZString;

use function Laravel\Prompts\error;

class SatusehatController extends Controller
{
    public function getAccessToken()
    {
        $client_id = env('CLIENT_ID');
        $client_secret = env('CLIENT_SECRET');

        $url = env('SATUSEHAT_BASE_URL')."/oauth2/v1/accesstoken?grant_type=client_credentials";

        $response = Http::withHeaders([
            'Content-Type' => 'application/x-www-form-urlencoded',
            'User-Agent' => 'PostmanRuntime/7.26.10',
        ])->asForm()->post($url, [
            'client_id' => $client_id,
            'client_secret' => $client_secret,
        ]);

        // Check if the response was successful
        if ($response->successful()) {
            // Return the access token
            return $response->object()->access_token;
        }

        // Handle error
        return null; // You could also return an error message or throw an exception
    }

    public function getPatientByNik( $jenisKartu )
    {
        // Get NIK from request or fallback to input
        if ($jenisKartu === null) {
            $jenisKartu = $jenisKartu;
        }

        // Check if NIK is provided
        if (empty($jenisKartu)) {
            return response()->json(['error' => 'NIK tidak boleh kosong'], 400);
        }

        // Get access token
        $token = $this->getAccessToken();

        if (!$token) {
            return response()->json(['error' => 'Unable to obtain access token'], 500);
        }

        // Make the API request to fetch patient by NIK
        $url = env('SATUSEHAT_BASE_URL').'/fhir-r4/v1/Patient?identifier=https%3A%2F%2Ffhir.kemkes.go.id%2Fid%2Fnik%7C' . $jenisKartu;

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $token
        ])->get($url);

        // Check for errors in the response
        if ($response->failed()) {
            return response()->json(['error' => 'Request failed', 'details' => $response->body()], 500);
        }

        // Return the API response as JSON

           // Return both the access token and the patient data
            return response()->json([
                'access_token' => $token,
                'patient_data' => $response->json()
            ]);
    }



    public function generateHeaders()
    {

        $cons_id = env('BPJS_PCARE_CONSID');
        $secret_key = env('BPJS_PCARE_SCREET_KEY');
        $username = env('BPJS_PCARE_USERNAME');
        $password = env('BPJS_PCARE_PASSWORD');
        $app_code = env('BPJS_PCARE_APP_CODE');
        $user_key = env('BPJS_PCARE_USER_KEY');


        date_default_timezone_set('UTC');
        $timestamp = strval(time() - strtotime('1970-01-01 00:00:00'));


        $data = "{$cons_id}&{$timestamp}";
        $signature = hash_hmac('sha256', $data, $secret_key, true);
        $encodedSignature = base64_encode($signature);

        $key_decrypt = $cons_id.$secret_key.$timestamp;
        $signature = $encodedSignature;


        $data = "{$username}:{$password}:{$app_code}";
        $encodedAuth = base64_encode($data);
        $authorization = "Basic {$encodedAuth}";

        $data = [
            'X-cons-id'       => $cons_id,
            'X-Timestamp'     => $timestamp,
            'X-Signature'     => $signature,
            'X-Authorization' => $authorization,
            'user_key' => $user_key,
        ];

        return [
            'headers'    => $data,
            'key_decrypt' => $key_decrypt,
        ];

    }

    public function cekstatus()
    {
        $BASE_URL = env('BPJS_PCARE_BASE_URL');
        $SERVICE_NAME = env('BPJS_PCARE_SERVICE_NAME');

        try {
            // Assuming $this->generateHeaders() returns an array of headers
            $headers = array_merge([
                'Content-Type' => 'application/json; charset=utf-8'
            ], $this->generateHeaders()['headers']);

            $response = Http::withHeaders($headers)
                ->get("{$BASE_URL}/{$SERVICE_NAME}/");

            // Check the response status
            if ($response->successful()) {
                return response()->json(['status' => 'connect']);
            } else {
                return response()->json(['status' => 'disconnect']);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'disconnect', 'error' => $e->getMessage()]);
        }
    }
    public function decompress($output)
    {
        // Decompress using LZString
        return LZString::decompressFromEncodedURIComponent($output);
    }

    public function jenisKartu($jenisKartu)
    {
        $BASE_URL = env('BPJS_PCARE_BASE_URL');
        $SERVICE_NAME = env('BPJS_PCARE_SERVICE_NAME');
        $feature = 'peserta';
        $params = 'nik';
        $patientData = $this->getPatientByNik($jenisKartu);

        try {
            // Assuming $this->generateHeaders() returns an array of headers
            $headers = array_merge([
                'Content-Type' => 'application/json; charset=utf-8'
            ], $this->generateHeaders()['headers']);

            // Make the API request
            $response = Http::withHeaders($headers)
                ->get("{$BASE_URL}/{$SERVICE_NAME}/{$feature}/{$params}/{$jenisKartu}");

            // Decode the response body
            $responseBody = json_decode($response->body(), true);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 400);
        }

        // Fetch the encrypted response data
        $encryptedString = $responseBody['response'];

        // Decrypt the string using AES-256-CBC
        $key = $this->generateHeaders()['key_decrypt'];
        $encrypt_method = 'AES-256-CBC';
        $key_hash = hex2bin(hash('sha256', $key));  // Get key hash
        $iv = substr(hex2bin(hash('sha256', $key)), 0, 16);  // Get IV

        // Decrypt the base64-encoded encrypted string
        $decryptedString = openssl_decrypt(base64_decode($encryptedString), $encrypt_method, $key_hash, OPENSSL_RAW_DATA, $iv);

        $jsonString = $this->decompress($decryptedString);

        // Decompress the string
        $data = json_decode($jsonString, true);


            return response()->json([
                "data" => $data,
                "additionalData" => $patientData,
                "date" => date('Y-M-D'),
                "time" => date('H:i:s'),
            ]);


    }


    public function polis()
    {
        $BASE_URL = env('BPJS_PCARE_BASE_URL');
        $SERVICE_NAME = env('BPJS_PCARE_SERVICE_NAME');
        $feature = 'poli/fktp';
        $params = '1';
        $params1 = '100';

        try {
            // Assuming $this->generateHeaders() returns an array of headers
            $headers = array_merge([
                'Content-Type' => 'application/json; charset=utf-8'
            ], $this->generateHeaders()['headers']);

            // Make the API request
            $response = Http::withHeaders($headers)
                ->get("{$BASE_URL}/{$SERVICE_NAME}/{$feature}/{$params}/{$params1}");

            // Decode the response body
            $responseBody = json_decode($response->body(), true);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 400);
        }

        // Fetch the encrypted response data
        $encryptedString = $responseBody['response'];

        // Decrypt the string using AES-256-CBC
        $key = $this->generateHeaders()['key_decrypt'];
        $encrypt_method = 'AES-256-CBC';
        $key_hash = hex2bin(hash('sha256', $key));  // Get key hash
        $iv = substr(hex2bin(hash('sha256', $key)), 0, 16);  // Get IV

        // Decrypt the base64-encoded encrypted string
        $decryptedString = openssl_decrypt(base64_decode($encryptedString), $encrypt_method, $key_hash, OPENSSL_RAW_DATA, $iv);

        $jsonString = $this->decompress($decryptedString);

        // Decompress the string
        $data = json_decode($jsonString, true);
        // Filter the list to include only items where 'poliSakit' is true
        $filteredList = array_filter($data['list'], function($item) {
            return isset($item['poliSakit']) && $item['poliSakit'] === true;
        });

        // Prepare the response data
        $responseData = [
            "count" => count($filteredList), // Count of filtered items
            "list" => array_values($filteredList), // Re-index the filtered array
        ];

        // Return only 'nmPoli' in an array for comparison
        $names = array_column($responseData['list'], 'nmPoli'); // Extract 'nmPoli'

        return response()->json([
            "data" => $responseData,
            "names" => $names, // Include names for later comparison
        ]);
    }

    public function poli()
    {
        $token = $this->getAccessToken();

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $token
        ])->get(env('SATUSEHAT_BASE_URL') . '/fhir-r4/v1/Location', [
            "resourceType" => "Location",
            "identifier" => [
                [
                    "system" => "https://sys-ids.kemkes.go.id/location/" . env('org_id'),
                    "value" => '%'
                ]
            ],
        ]);

        // Handle the response
        if ($response->successful()) {
            $locations = $response->json()['entry'];

            // Filtering data to get the necessary information
            $filteredData = array_map(function ($location) {
                return [
                    'id' => $location['resource']['id'],
                    'name' => $location['resource']['name'],
                    'status' => $location['resource']['status'],
                ];
            }, $locations);

            // Collect names for comparison
            $names = array_column($filteredData, 'name'); // Extract names

            return response()->json([
                'data' => $filteredData,
                'names' => $names, // Include names for later comparison
            ], 200);
        } else {
            // Return error response
            return response()->json([
                'error' => $response->body(),
                'status' => $response->status(),
            ], $response->status());
        }
    }

    public function comparePolisAndPoli()
    {
        $attempts = 0; // Initialize the attempt counter
        $maxAttempts = 5; // Set a maximum number of attempts
        $statusCode = 0; // Initialize status code

        // Loop until we get a successful response or exceed max attempts
        do {
            $polisResponse = $this->polis();
            $poliResponse = $this->poli();

            // Extract 'list' from polis response and 'data' from poli response
            $polisList = json_decode($polisResponse->getContent(), true)['data']['list'];
            $poliList = json_decode($poliResponse->getContent(), true)['data'];

            // Prepare arrays to hold matched and unmatched data
            $matchedData = [];
            $unmatchedPolis = [];
            $unmatchedPoli = [];

            // Create an associative array for poli list for quick lookup by name
            $poliAssociative = [];
            foreach ($poliList as $poli) {
                $poliAssociative[$poli['name']] = $poli;
            }

            // Check for matches and gather all relevant data
            foreach ($polisList as $polis) {
                if (isset($poliAssociative[$polis['nmPoli']])) {
                    // If there's a match, combine data into a single structure
                    $combinedData = [
                        'bpjskdPoli' => $polis['kdPoli'],
                        'bpjsnmPoli' => $polis['nmPoli'],
                        'sthid' => $poliAssociative[$polis['nmPoli']]['id'],
                        'status' => $poliAssociative[$polis['nmPoli']]['status'],
                    ];

                    // Check if nama_poli already exists
                    $existingData = Poli::where('nama_poli', $combinedData['bpjsnmPoli'])->first();
                    if (!$existingData) {
                        // If it doesn't exist, save the new record
                        $datapoli = new Poli();
                        $datapoli->nama_poli = $combinedData['bpjsnmPoli'];
                        $datapoli->id_bpjs = $combinedData['bpjskdPoli'];
                        $datapoli->id_satusehat = $combinedData['sthid'];
                        $datapoli->status = $combinedData['status'];
                        $datapoli->save();
                    } else {
                        // Optionally, update the existing record
                        $existingData->id_bpjs = $combinedData['bpjskdPoli'];
                        $existingData->id_satusehat = $combinedData['sthid'];
                        $existingData->status = $combinedData['status'];
                        $existingData->save();
                    }

                    // Store the combined data for response
                    $matchedData[] = $combinedData;
                } else {
                    // If no match, store the unmatched polis data
                    $unmatchedPolis[] = $polis;
                }
            }

            // Identify unmatched poli entries
            foreach ($poliList as $poli) {
                if (!in_array($poli['name'], array_column($polisList, 'nmPoli'))) {
                    $unmatchedPoli[] = $poli;
                }
            }

            // Determine the status code
            $statusCode = $polisResponse->status(); // Assuming you want to check the response status for polis
            $attempts++;

        } while ($statusCode !== 200 && $statusCode !== 302 && $attempts < $maxAttempts);

        // Check if the loop ended because of too many attempts
        if ($attempts >= $maxAttempts) {
            return redirect()->route('doctor.poli')->with('Error', 'Gagal melakukan sinkronisasi setelah beberapa percobaan.');
        }

        // Prepare a success response
        return redirect()->route('doctor.poli')->with('Success', 'Poli berhasil di Singkron');
    }


    public function getPractitionerByNik( $jenisKartu )
    {
        // Get NIK from request or fallback to input
        if ($jenisKartu === null) {
            $jenisKartu = $jenisKartu;
        }

        // Check if NIK is provided
        if (empty($jenisKartu)) {
            return response()->json(['error' => 'NIK tidak boleh kosong'], 400);
        }

        // Get access token
        $token = $this->getAccessToken();

        if (!$token) {
            return response()->json(['error' => 'Unable to obtain access token'], 500);
        }

        // Make the API request to fetch patient by NIK
        $url = env('SATUSEHAT_BASE_URL').'/fhir-r4/v1/Practitioner?identifier=https%3A%2F%2Ffhir.kemkes.go.id%2Fid%2Fnik%7C' . $jenisKartu;

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $token
        ])->get($url);

        // Check for errors in the response
        if ($response->failed()) {
            return response()->json(['error' => 'Request failed', 'details' => $response->body()], 500);
        }

        // Return the API response as JSON

           // Return both the access token and the patient data
            return response()->json([
                'access_token' => $token,
                'patient_data' => $response->json()
            ]);
    }


    public function getPractitionerByNikall()
    {
        $BASE_URL = env('BPJS_PCARE_BASE_URL');
        $SERVICE_NAME = env('BPJS_PCARE_SERVICE_NAME');
        $feature = 'dokter';
        $params = '1';
        $params1 = '100';

        try {
            // Assuming $this->generateHeaders() returns an array of headers
            $headers = array_merge([
                'Content-Type' => 'application/json; charset=utf-8'
            ], $this->generateHeaders()['headers']);

            // Make the API request
            $response = Http::withHeaders($headers)
                ->get("{$BASE_URL}/{$SERVICE_NAME}/{$feature}/{$params}/{$params1}");

            // Decode the response body
            $responseBody = json_decode($response->body(), true);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 400);
        }

        // Fetch the encrypted response data
        $encryptedString = $responseBody['response'];

        // Decrypt the string using AES-256-CBC
        $key = $this->generateHeaders()['key_decrypt'];
        $encrypt_method = 'AES-256-CBC';
        $key_hash = hex2bin(hash('sha256', $key));  // Get key hash
        $iv = substr(hex2bin(hash('sha256', $key)), 0, 16);  // Get IV

        // Decrypt the base64-encoded encrypted string
        $decryptedString = openssl_decrypt(base64_decode($encryptedString), $encrypt_method, $key_hash, OPENSSL_RAW_DATA, $iv);

        $jsonString = $this->decompress($decryptedString);

        // Decompress the string
        $data = json_decode($jsonString, true);
        // // Filter the list to include only items where 'poliSakit' is true
        // $filteredList = array_filter($data['list'], function($item) {
        //     return isset($item['poliSakit']) && $item['poliSakit'] === true;
        // });

        // // Prepare the response data
        // $responseData = [
        //     "count" => count($filteredList), // Count of filtered items
        //     "list" => array_values($filteredList), // Re-index the filtered array
        // ];

        // // Return only 'nmPoli' in an array for comparison
        // $names = array_column($responseData['list'], 'nmPoli'); // Extract 'nmPoli'

        return response()->json([
            "data" => $data,
            // "names" => $names, // Include names for later comparison
        ]);
    }
}
