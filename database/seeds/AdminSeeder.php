<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $checkAdmin = \App\Models\User::query()->where('email', "admin@admin.com")->first();
        if (!$checkAdmin) {
            $admin = new\App\Models\User();
            $admin->name = "Adnim";
            $admin->email = "admin@admin.com";
            $admin->username = "admin@admin.com";
            $admin->password = bcrypt('1234');
            $admin->role = 'admin';
            $admin->save();
        }

    }
}
