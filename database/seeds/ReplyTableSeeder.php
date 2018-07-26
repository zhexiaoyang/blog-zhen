<?php

use Illuminate\Database\Seeder;
use App\Models\Reply;
use App\Models\User;
use App\Models\Topic;

class ReplyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 所有话题 ID 数组，如：[1,2,3,4]
        $article_ids = \App\Models\Article::all()->pluck('id')->toArray();

        // 获取 Faker 实例
        $faker = app(Faker\Generator::class);

        $replys = factory(\App\Models\Reply::class)
            ->times(1000)
            ->make()
            ->each(function ($reply, $index)
            use ($article_ids, $faker)
            {
                // 文章 ID，同上
                $reply->article_id = $faker->randomElement($article_ids);
            });

        // 将数据集合转换为数组，并插入到数据库中
        Reply::insert($replys->toArray());
    }
}
