<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users =
            [
                [
                    'name' => 'Ari Aprizal',
                    'nik' => '321123',
                    'nkk' => '123321',
                    'tempat_lahir' => 'Sumedang',
                    'tgl_lahir' => '02-06-1995',
                    'jenis_kelamin' => 'Laki-Laki',
                    'agama' => 'Islam',
                    'pendidikan' => 'SMA/Sederajat',
                    'pekerjaan' => 'Buruh',
                    'status' => 'Belum/Tidak Menikah',
                    'nama_ibu' => 'Ai Supratin',
                    'nama_ayah' => 'Sutisna',
                    'alamat' => 'Dusun Haurkuning  rt/rt 002/007 Jawab Barat',
                    'password' => bcrypt('user'),
                    'is_admin' => '1',
                    'tlp' => '6285793543051',
                ],
                [
                    'name' => 'Adi Sutisna',
                    'nik' => '421123',
                    'nkk' => '223321',
                    'tempat_lahir' => 'Sumedang',
                    'tgl_lahir' => '02-06-1995',
                    'jenis_kelamin' => 'Laki-Laki',
                    'agama' => 'Islam',
                    'pendidikan' => 'SMA/Sederajat',
                    'pekerjaan' => 'Buruh',
                    'status' => 'Belum/Tidak Menikah',
                    'nama_ibu' => 'Ai Supratin',
                    'nama_ayah' => 'Sutisna',
                    'alamat' => 'Dusun Haurkuning  rt/rt 002/007 Jawab Barat',
                    'password' => null,
                    'is_admin' => '0',
                    'tlp' => '6285793543051',
                ],
                [
                    'name' => 'Ali Fiqri',
                    'nik' => '12345',
                    'nkk' => '223321',
                    'tempat_lahir' => 'Sumedang',
                    'tgl_lahir' => '02-06-1995',
                    'jenis_kelamin' => 'Laki-Laki',
                    'agama' => 'Islam',
                    'pendidikan' => 'SD/Sederajat',
                    'pekerjaan' => 'Buruh',
                    'status' => 'Belum/Tidak Menikah',
                    'nama_ibu' => 'Ai Supratin',
                    'nama_ayah' => 'Sutisna',
                    'alamat' => 'Dusun Haurkuning  rt/rt 002/007 Jawab Barat',
                    'password' => null,
                    'is_admin' => '0',
                    'tlp' => '6285793543051',
                ]
            ];
        foreach ($users as $key => $value) {
            User::create($value);
        }
    }
}
