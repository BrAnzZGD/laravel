<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class register_controller extends Controller
{
    public function showForm(){
        return view('register');
    }
    public function store(Request $request){
        //validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email|unique:regis,email',
            'phone' => 'required|string|max:50',
            'business' => 'required|string|max:100',
            'address' => 'required|string',
        ]);
        //simpan kedatabase
        DB::table('regis')->insert([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'telepon' => $validated['phone'],
            'name_bisnis' => $validated['business'],
            'address' => $validated['address'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->back()->with('success', 'Registrasi berhasil!');
    }
}