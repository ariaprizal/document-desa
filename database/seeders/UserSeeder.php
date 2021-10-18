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
                // RW 007
                [
                    'name' => 'Ronald Fresdy',
                    'nik' => '123457',
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
                    'alamat' => 'Dusun Haurkuning  rt/rw 002/007 Jawab Barat',
                    'password' => bcrypt('user'),
                    'is_admin' => '3',
                    'tlp' => '6285793543051',
                    'dusun' => 'haurkuning',
                    'rw' => '007',
                ],

                // RT 002
                [
                    'name' => 'Saeful Firmasnyah',
                    'nik' => '3211237',
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
                    'alamat' => 'Dusun Haurkuning  rt/rw 002/007 Jawab Barat',
                    'password' => bcrypt('user'),
                    'is_admin' => '2',
                    'tlp' => '6285793543051',
                    'dusun' => 'haurkuning',
                    'rw' => '007',
                ],
                // Warga RT 002
                [
                    'name' => 'Ali Fiqri',
                    'nik' => '3211231',
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
                    'alamat' => 'Dusun Haurkuning  rt/rw 002/007 Jawab Barat',
                    'password' => bcrypt('user'),
                    'is_admin' => '0',
                    'tlp' => '6285793543051',
                    'dusun' => 'haurkuning',
                    'rw' => '007',
                ],





                // RT 003
                [
                    'name' => 'Rohmat Nurmasnyah',
                    'nik' => '321112697',
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
                    'alamat' => 'Dusun Haurkuning  rt/rw 003/007 Jawab Barat',
                    'password' => bcrypt('user'),
                    'is_admin' => '2',
                    'tlp' => '6285793543051',
                    'dusun' => 'haurkuning',
                    'rw' => '007',
                ],
                // Warga RT 003
                [
                    'name' => 'Adi Sutisna',
                    'nik' => '3211126971',
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
                    'alamat' => 'Dusun Haurkuning  rt/rw 003/007 Jawab Barat',
                    'password' => bcrypt('user'),
                    'is_admin' => '0',
                    'tlp' => '6285793543051',
                    'dusun' => 'haurkuning',
                    'rw' => '007',
                ],



                // RW 008
                [
                    'name' => 'Fazri Kusumah',
                    'nik' => '123458',
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
                    'alamat' => 'Dusun Singkup  rt/rw 002/008 Jawab Barat',
                    'password' => bcrypt('user'),
                    'is_admin' => '3',
                    'tlp' => '6285793543051',
                    'dusun' => 'singkup',
                    'rw' => '008',
                ],

                // RT 002
                [
                    'name' => 'Ravi Mukti',
                    'nik' => '3211238',
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
                    'alamat' => 'Dusun Singkup  rt/rw 002/008 Jawab Barat',
                    'password' => bcrypt('user'),
                    'is_admin' => '2',
                    'tlp' => '6285793543051',
                    'dusun' => 'singkup',
                    'rw' => '008',
                ],
                // Warga RT 002
                [
                    'name' => 'Reksi Maulana',
                    'nik' => '3211232',
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
                    'alamat' => 'Dusun Haurkuning  rt/rw 002/007 Jawab Barat',
                    'password' => bcrypt('user'),
                    'is_admin' => '0',
                    'tlp' => '6285793543051',
                    'dusun' => 'haurkuning',
                    'rw' => '007',
                ],





                // RT 003
                [
                    'name' => 'Reza Pratama',
                    'nik' => '3211126973',
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
                    'alamat' => 'Dusun Singkup  rt/rw 003/008 Jawab Barat',
                    'password' => bcrypt('user'),
                    'is_admin' => '2',
                    'tlp' => '6285793543051',
                    'dusun' => 'singkup',
                    'rw' => '008',
                ],
                // Warga RT 003
                [
                    'name' => 'Aldi Septiana',
                    'nik' => '3211126972',
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
                    'alamat' => 'Dusun Singkup  rt/rw 003/008 Jawab Barat',
                    'password' => bcrypt('user'),
                    'is_admin' => '0',
                    'tlp' => '6285793543051',
                    'dusun' => 'singkup',
                    'rw' => '008',
                ],



                // Admin

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
                    'alamat' => 'Dusun Haurkuning  rt/rw 002/007 Jawab Barat',
                    'password' => bcrypt('user'),
                    'is_admin' => '1',
                    'tlp' => '6285793543051',
                    'dusun' => 'haurkuning',
                    'rw' => '007',
                ],

            ];
        foreach ($users as $key => $value) {
            User::create($value);
        }
    }
}
