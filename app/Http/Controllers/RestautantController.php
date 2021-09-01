<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RestautantController extends Controller
{
    public function show(Request $request)
    {
        $response = Http::get('https://maps.googleapis.com/maps/api/place/textsearch/json',[
            'query' => 'Bangsue',
            'opennow'=>true,
            'type'=>"restaurant",
            'key' => env('KEY_GMAP'),
        ]);
        $collection = $response->json();
        return view('list',['restautant' => $collection['results']]);
    }

    public function newLocation(Request $request){
        $inputSearch = $request->input('inputSearch');

        $response = Http::get('https://maps.googleapis.com/maps/api/place/textsearch/json',[
            'query' => $inputSearch,
            'opennow'=>true,
            'type'=>"restaurant",
            'key' => env('KEY_GMAP'),
        ]);
        $collection = $response->json();
        return view('list',['restautant' => $collection['results']]);
    }

}
