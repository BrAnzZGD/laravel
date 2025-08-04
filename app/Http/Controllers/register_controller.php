<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class register_controller extends Controller
{
    public function showForm()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email|unique:regis,email',
            'phone' => 'required|string|max:50',
            'business' => 'required|string|max:100',
            'address' => 'required|string',
        ]);

        // Simpan ke database
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

   public function showData()
{
    $data = DB::table('regis')->get();

    return view('table', compact('data')); // Pastikan file blade-nya "table.blade.php"
}


public function edit($id)
{
    try {
        $data = DB::table('regis')->where('id', $id)->first();

        if (!$data) {
            abort(404, 'Data tidak ditemukan');
        }

        $allData = DB::table('regis')->get();
        return view('edit', compact('data', 'allData'));

    } catch (ModelNotFoundException $e) {
        abort(404);
    }
}



    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email|unique:regis,email,' . $id,
            'phone' => 'required|string|max:50',
            'business' => 'required|string|max:100',
            'address' => 'required|string',
        ]);

        DB::table('regis')->where('id', $id)->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'telepon' => $validated['phone'],
            'name_bisnis' => $validated['business'],
            'address' => $validated['address'],
            'updated_at' => now(),
        ]);

        return redirect()->route('register.data')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        DB::table('regis')->where('id', $id)->delete();
        return redirect()->route('register.data')->with('success', 'Data berhasil dihapus.');
    }
}
