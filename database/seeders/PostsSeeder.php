<?php

namespace Database\Seeders;

use App\Models\post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->truncate();
        $json=File::get('database/datasets/posts.json');
        $data=json_decode($json);

        foreach ($data as $obj){
            post::create(array(
            'id'=>$obj->id,
             'userId'=>$obj->userId,
             'title'=>$obj->title,
             'body'=>$obj->body,
            ));

        }
    }
}
