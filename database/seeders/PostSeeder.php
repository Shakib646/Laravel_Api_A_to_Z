<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Database\Factories\Helpers\FactoryHelper;
use Database\Seeders\Traits\DisableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    use TruncateTable, DisableForeignKeys;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();
        $this->truncate('posts');
        // Post::factory(10)->state([
        //     'title' => 'Untitle',
        // ])->create();

        $posts = Post::factory(100)->create();

        $posts->each(function (Post $post) {
            // $product->suboptions()->sync($request->suboptions, false);
            $post->users()->sync([FactoryHelper::getRandomModelId(User::class)]);
        });


        $this->enableForeignKeys();
    }
}
