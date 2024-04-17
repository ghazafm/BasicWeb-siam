<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index()
    {
    	// mengambil data dari table mahasiswa
    	$mahasiswa = DB::table('mahasiswa')->get();
 
    	// mengirim data mahasiswa ke view index
    	return view('student.index',['mahasiswa' => $mahasiswa]);
 
    }

	public function add() 
	{
		return view('student.add');
	}

	public function addsave(Request $req)
	{
		// insert data ke table mahasiswa
		DB::table('mahasiswa')->insert([
			'nama' => $req->nama,
			'alamat' => $req->alamat,
			'prodi' => $req->prodi,
			'ipk' => $req->ipk
		]);
		// alihkan halaman ke halaman mahassiwa
		return redirect('/student');
	}

	public function edit($nim)
	{
		// mengambil data mahasiwa berdasarkan nim yang dipilih
		$mahasiswa = DB::table('mahasiswa')->where('nim',$nim)->get();
		// mengirim data mahasiwa yang didapat ke view edit.blade.php
		return view('student.edit',['mahasiswa' => $mahasiswa]);
	}

	public function editsave(Request $req)
	{
		// update data mahasiswa
		DB::table('mahasiswa')->where('nim',$req->nim)->update([
			'nama' => $req->nama,
			'alamat' => $req->alamat,
			'prodi' => $req->prodi,
			'ipk' => $req->ipk
		]);
		// alihkan halaman data mahasiswa 
		return redirect('/student');
	}

	public function delete($nim)
	{
		DB::table('mahasiswa')->where('nim', $nim)->delete();

		return redirect('student');
	}
}
