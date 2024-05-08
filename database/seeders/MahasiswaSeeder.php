<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class Jurusan
{
    public $data;

    public function __construct()
    {
        $this->data = ['Teknik Informatika', 'Sistem Informasi', 'Teknik Komputer', 'Teknologi Informasi', 'Pendidikan Teknologi Informasi'];
    }

    public function get()
    {
        return $this->data[array_rand($this->data)];
    }
}

class MahasiswaSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $jurusan = new Jurusan();
        
        for ($i=1; $i < 100; $i++) { 
            DB::table('mahasiswa')->insert([
                'nama' => $faker->name,
                'alamat' => $faker->address,
                'prodi' => $jurusan->get(),
                'ipk' => $faker->randomFloat(2,0,4)
            ]);
        }
    }
}