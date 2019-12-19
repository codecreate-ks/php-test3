<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EcShopTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'item_id' => 1,
            'item_name' => '一眼カメラ',
            'price' => 250000,
        ];
        DB::table('stock')->insert($param);

        $param = [
            'item_id' => 2,
            'item_name' => 'シャンパン',
            'price' => 50000,
        ];
        DB::table('stock')->insert($param);

        $param = [
            'item_id' => 3,
            'item_name' => 'ビール',
            'price' => 1000,
        ];
        DB::table('stock')->insert($param);

        $param = [
            'item_id' => 4,
            'item_name' => 'フィルムカメラ',
            'price' => 50000,
        ];
        DB::table('stock')->insert($param);

        $param = [
            'item_id' => 5,
            'item_name' => 'イヤホン',
            'price' => 25000,
        ];
        DB::table('stock')->insert($param);

        $param = [
            'item_id' => 6,
            'item_name' => 'レンズ',
            'price' => 50000,
        ];
        DB::table('stock')->insert($param);

        $param = [
            'item_id' => 7,
            'item_name' => '時計',
            'price' => 1000,
        ];
        DB::table('stock')->insert($param);

        $param = [
            'item_id' => 8,
            'item_name' => '地球儀',
            'price' => 5000,
        ];
        DB::table('stock')->insert($param);

        $param = [
            'item_id' => 9,
            'item_name' => '腕時計',
            'price' => 8000,
        ];
        DB::table('stock')->insert($param);
    }
}
