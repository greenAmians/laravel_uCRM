<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            [
                'name' => 'カット',
                'memo' => 'シャンプー/ブロー込・ロング料金なし・amicoオリジナルの小顔カット',
                'price' => 4700,
            ],
            [
                'name' => 'フルカラー',
                'memo' => 'シャンプー/ブロー込・ロング料金なし・amicoオリジナルのカラー',
                'price' => 7300,
    
            ],
            [
                'name' => 'コスメパーマ',
                'memo' => 'シャンプー/ブロー込・ロング料金なし・amicoオリジナルのケアパーマ',
                'price' => 9500,
            ],

        ]);

    }
}
