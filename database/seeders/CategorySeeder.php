<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('categories')->insert([
            'Name' => 'earing',
            'Qty' => 10
                ], [
            'Name' => 'ring',
            'Qty' => 13
                ], [
            'Name' => 'payal',
            'Qty' => 15
        ]);
    }

}
