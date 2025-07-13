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

        if (!isset($urls[$era])) {
            abort(404);
        }

        $response = Http::withoutVerifying()->get($urls[$era]);
        $jsonData = $response->json();

        $key = $era . '_dinosaurs';
        $dinos = $jsonData[$key] ?? [];

        return view('era', [
            'era' => ucfirst($era),
            'dinos' => $dinos
        ]);
    }
}
