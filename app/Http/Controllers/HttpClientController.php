<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HttpClientController extends Controller
{
    public function  readpost()
    {
        // $response = Http::get('https://jsonplaceholder.typicode.com/posts');
        // dd($response->body());

        $client = new \GuzzleHttp\Client(
            [
                'defaults' => [
                    'exceptions' => false
                ]
            ]
        );
        // $res = $client->request('GET', 'https://jsonplaceholder.typicode.com/posts');
        $res = $client->request('GET', 'http://localhost:8000/api/readpost');
        // echo $res->getStatusCode();
        // echo "<pre>";
        // print_r(json_decode($res->getBody()->getContents()));


        return response()->json(
            json_decode($res->getBody()->getContents()),
            200);

    }
}
