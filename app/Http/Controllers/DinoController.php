<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class DinoController extends Controller
{
    public function showEra($era)
    {
        $urls = [
            'triassic' => 'https://dhikav0.github.io/dino-API/triassic/triassic_dino.json',
            'jurassic' => 'https://dhikav0.github.io/dino-API/jurassic/jurassic_dino.json',
            'cretaceous' => 'https://dhikav0.github.io/dino-API/cretaceous/cretaceous_dino.json',
        ];

        if (!array_key_exists($era, $urls)) {
            abort(404);
        }

         $response = Http::withoutVerifying()->get($urls[$era]);

    $dinos = $response->successful() ? $response->json() : [];

    return view('era', [
        'era' => ucfirst($era),
        'dinos' => $dinos
    ]);
    }
}
