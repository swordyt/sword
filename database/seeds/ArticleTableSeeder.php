<?php

use Illuminate\Database\Seeder;
use App\Article;
class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
			DB::table('articles')->delete();
			for($i=0;$i<10;$i++){
				Article::create([
				'title'=>'文章00'.$i,
				'slug'=>'概述00'.$i,
				'body'=>'文章00'.$i,
				'user_id'=>15,
			]);
		}
    }
}
