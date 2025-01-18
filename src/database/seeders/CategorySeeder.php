<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorys = ['商品のお届けについて', '商品の交換について', '商品トラブル', 'ショップへのお問い合わせ', 'その他'];

        foreach ($categorys as $category) {
            DB::table('categories')->insert([
                'content' => $category,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}