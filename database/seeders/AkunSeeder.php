<?php

namespace Database\Seeders;

use App\Models\Barang;
use App\Models\Role;
use App\Models\Saldo;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bank = Role::create(["name" => "Bank"]);
        $canteen = Role::create(["name" => "Canteen"]);
        $student = Role::create(["name" => "Student"]);

        
        User::create([
            "name" => "udin",
            "email" => "udin@gmail.com",
            "password" => Hash::make("udin"),
            "role_id" => $bank->id
        ]);

        User::create([
            "name" => "beta",
            "email" => "beta@gmail.com",
            "password" => Hash::make("beta"),
            "role_id" => $canteen->id
        ]);

        $samba = User::create([
            "name" => "samba",
            "email" => "samba@gmail.com",
            "password" => Hash::make("samba"),
            "role_id" => $student->id
        ]);

        $pucuk = Barang::create([
            "name" => "Teh Pucuk",
            "image" => "pucuk.jpg",
            "price" => 3500,
            "stock" => 10,
            "desc" => "Minuman teh"
        ]);

        Saldo::create([
            "user_id" => $samba->id,
            "saldo" => 300000
        ]);

        //Isi Saldo
        Transaksi::create([
            "user_id" => $samba->id,
            "barang_id" => null,
            "jumlah" => 500000,
            "invoice_id" => "SAL_001",
            "type" => 1,
            "status" => 3
        ]);
    }
}
