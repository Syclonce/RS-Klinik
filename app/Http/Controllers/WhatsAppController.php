<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WhatsAppController extends Controller
{
    public function sendMessage(Request $request)
    {
        $request->validate([
            'phone' => 'required|string',
            'message' => 'required|string',
        ]);

        // Make an API call to the Node.js service
        $response = $this->sendToNodeService($request->phone, $request->message);

        return response()->json($response);
    }

    private function sendToNodeService($phone, $message)
    {
        $url = 'http://localhost:3000/send-message'; // Change this to your Node.js service URL

        $client = new \GuzzleHttp\Client();
        $response = $client->post($url, [
            'json' => [
                'phone' => $phone,
                'message' => $message,
            ]
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }
}
