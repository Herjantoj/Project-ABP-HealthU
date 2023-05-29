<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Models\User;

class Tugas12Controller extends Controller
{
    public function indexUser()
    {
        //Mengambil Semua Data Mahasiswa
        $user = User::all();

        // Menampilkan Data User
        return ResponseFormatter::success([
            'message' => 'Success Get Data User',
            'data' => $user
        ], 'Data berhasil diambil');
    }
}
