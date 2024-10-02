<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\{Http, DB, Log};
use App\Models\Post;

class FetchPost extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fetch-post';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch posts from the specified API';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {
            $posts = Http::get('https://jsonplaceholder.typicode.com/posts')->json();

            DB::transaction(function () use ($posts) {
                $newPosts = [];

                foreach ($posts as $value) {
                    if (count($newPosts) == 10) break;

                    $value['title'] = ucfirst($value['title']);
                    $value['body'] = ucfirst($value['body']);
                    $value['user_id'] = $value['userId'];
                    $value['created_at'] = now();

                    unset($value['userId']);

                    $isExist = Post::where('title', $value['title'])->exists();

                    if (!$isExist) {
                        $newPosts[] = $value; // pass the value to the array if it's a new post
                    }
                }

                // Insert new posts
                DB::table('posts')->insert($newPosts);

                $this->info('Fetched ' . count($newPosts) . ' new posts');
            });
        } catch (\Throwable $th) {
            Log::error('Error fetching posts: ' . $th->getMessage());
            $this->error($th->getMessage());
        }
    }
}
