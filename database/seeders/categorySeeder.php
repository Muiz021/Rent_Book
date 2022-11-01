<?php

namespace Database\Seeders;

use App\Models\category;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        category::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            'comic' , 'novel', 'fantasy', 'fiction', 'mystery', 'horror',
            'romance', 'western'
        ];

        foreach ($data as $value) {
            category::insert([
                'name' => $value
            ]);
        }
    }
}
