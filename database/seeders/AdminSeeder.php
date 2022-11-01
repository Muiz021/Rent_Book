<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use League\CommonMark\Extension\Table\Table;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        User::truncate();
        Schema::enableForeignKeyConstraints();

        DB::table('users')->insert([
            'username' => 'admin',
            'password' => Hash::make('admin'),
            'slug' =>  'admin',
            'address' => '-',
            'status' => 'active',
            'role_id' => '1'
        ]);
    }
}
