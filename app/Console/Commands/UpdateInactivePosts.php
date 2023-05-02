<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Post;

class UpdateInactivePosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $inactivePosts = Post::where('status', 'Active')
        ->where('last_updated', '<', now()->subMinutes(45))
        ->get();

    foreach ($inactivePosts as $post) {
        $post->status = 'Inactive';
        $post->save();
    }
        return Command::SUCCESS;
    }
}
