<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use LZCompressor\LZString;

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

    public function getPatientByNik( $nik )
    {
        // Get NIK from request or fallback to input
        if ($nik === null) {
            $nik = $nik;
        }

        // Check if NIK is provided
        if (empty($nik)) {
            return response()->json(['error' => 'NIK tidak boleh kosong'], 400);
        }

        // Get access token
        $token = $this->getAccessToken();

        if (!$token) {
            return response()->json(['error' => 'Unable to obtain access token'], 500);
        }

        // Make the API request to fetch patient by NIK
        $url = env('SATUSEHAT_BASE_URL').'/fhir-r4/v1/Patient?identifier=https%3A%2F%2Ffhir.kemkes.go.id%2Fid%2Fnik%7C' . $nik;

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

    public function jenisKartu($jenisKartu)
        {
            $BASE_URL = env('BPJS_PCARE_BASE_URL');
            $SERVICE_NAME = env('BPJS_PCARE_SERVICE_NAME');
            $feature = 'peserta';
            $params = 'nik';

            try {
                // Assuming $this->generateHeaders() returns an array of headers
                $headers = array_merge([
                    'Content-Type' => 'application/json; charset=utf-8'
                ],$headers = $this->generateHeaders()['headers']);

                $response = Http::withHeaders($headers)
                    ->get("{$BASE_URL}/{$SERVICE_NAME}/{$feature}/{$params}/{$jenisKartu}");

                $responseBody =  json_decode($response->body(), true);
            } catch (\Exception $e) {
                $responseBody = $e->getMessage();
            }


            $string = $responseBody['response'];  // Ambil nilai dari kunci 'response'
            $key = $this->generateHeaders()['key_decrypt'];

            $encrypt_method = 'AES-256-CBC';

            // hash
            $key_hash = hex2bin(hash('sha256', $key));

            // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
            $iv = substr(hex2bin(hash('sha256', $key)), 0, 16);

            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key_hash, OPENSSL_RAW_DATA, $iv);


            $jsonString = $this->decompress($output);
            $data = json_decode($jsonString, true);
            $jsonStrings = $this->getPatientByNik($jenisKartu);

            $combinedData = [
                'data' => $data,
                'additionalData' => $jsonStrings,
            ];

            return response()->json($combinedData);
        }

        public function decompress($output)
        {
            return \LZCompressor\LZString::decompressFromEncodedURIComponent($output);
        }

}
