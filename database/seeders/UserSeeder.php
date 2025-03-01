<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**
         * Super Admin
         */
        User::create([
            'name'              => 'Administrator',
            'email'             => 'admin@karyajatimakmur.com',
            'email_verified_at' => now(),
            'password'          => bcrypt(123),
            'phone'             => '021-0000000',
            'address'           => 'Jakarta, Indonesia',
        ])->assignRole('admin');

        /**
         * Technician
         */
        User::create([
            'name'              => 'Teknisi A',
            'email'             => 'teknisia@karyajatimakmur.com',
            'email_verified_at' => now(),
            'password'          => bcrypt(123),
            'phone'             => '089912345643',
            'address'           => 'Jakarta, Indonesia',
        ])->assignRole('technician');

        /**
         * Customers
         */
        User::create([
            'name'              => 'Budi Jaya Santoso',
            'email'             => 'budijaya@gmail.com',
            'email_verified_at' => now(),
            'password'          => bcrypt(123),
            'phone'             => '0812668356792',
            'address'           => 'Jakarta, Indonesia',
        ])->assignRole('customer');
    }
}
