<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        // mengambil data mahasiswa ke view index
        $mahasiswa = DB::table('mahasiswa')->get();

        // mengirim data mahasiswa ke view index
        return view('student.index',['mahasiswa' => $mahasiswa]);
    }

    public function add(){
        return view('student.add');
    }

    public function addsave(Request $req){

        // insert data ke table mahasiswa
        DB::table('mahasiswa')->insert([
            'nama' => $req->nama,
            'alamat' => $req->alamat,
            'notelp' => $req->notelp,
            'ipk' => $req->ipk
        ]);
        // alihkan halaman ke halaman mahasiswa
        return redirect('/student');
    }

    public function edit($nim){
        // mengambil data mahasiswa berdasarkan nim yang dipilih
        $mahasiswa = DB::table('mahasiswa')->where('nim',$nim)->get();

        // mengirim data mahasiswa yang didapat ke view edit.blade.php
        return view('student.edit',['mahasiswa' => $mahasiswa]);
    }
}
