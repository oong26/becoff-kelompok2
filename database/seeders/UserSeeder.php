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
        $newOwner = new User;
        $newOwner->name = 'Owner';
        $newOwner->email = 'owner@mail.com';
        $newOwner->password = \Hash::make('12345678');
        $newOwner->role = 'Owner';
        $newOwner->save();
        
        $newPegawai = new User;
        $newPegawai->name = 'Pegawai';
        $newPegawai->email = 'pegawai@mail.com';
        $newPegawai->password = \Hash::make('12345678');
        $newPegawai->role = 'Pegawai';
        $newPegawai->save();

        $newCustomer = new User;
        $newCustomer->name = 'Customer 1';
        $newCustomer->email = 'customer@mail.com';
        $newCustomer->password = \Hash::make('12345678');
        $newCustomer->role = 'Customer';
        $newCustomer->save();
    }
}
