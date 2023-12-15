<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class newsController extends Controller
{

public function get_data(Request $request)
{
    // Make a request to get the XML response
    $response = Http::get('https://tech.hindustantimes.com/rss/tech');
    // Check if the request was successful
    if ($response->successful()) {
        // Convert XML to JSON
        $xml = simplexml_load_string($response->body(), 'SimpleXMLElement', LIBXML_NOCDATA);
        $json = json_encode($xml);
        $data = json_decode($json, true);
        $data = $data['channel']['item'];



        // echo "<pre>";
        // print_r($data);
        // die;

        // Now $data is an associative array containing the converted JSON data
        // You can use $data as neede
        return view('table',['data'=>$data]);

        
    } else {
        // Handle the case when the request was not successful
        echo 'Error: ' . $response->status();
    }
}

//<!-- @foreach($student as $e) -->
}
