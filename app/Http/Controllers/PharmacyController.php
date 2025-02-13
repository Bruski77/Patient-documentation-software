<?php

namespace App\Http\Controllers;

class PharmacyController extends Controller
{
    public function create() {
        return view('pharmacy', [
            'lgas' => config('lgas.lagos')
        ]);
    }

    public function store() {

    }
}
