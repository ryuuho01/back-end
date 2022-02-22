<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FavoritesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'user_id' => 22,
            'shop_id' => 1,
            'favorite' => 1,
        ];
        DB::table('favorites')->insert($param);
        $param = [
            'user_id' => 22,
            'shop_id' => 2,
            'favorite' => 1,
        ];
        DB::table('favorites')->insert($param);

    }
}
