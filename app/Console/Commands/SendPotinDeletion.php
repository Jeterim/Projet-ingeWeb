<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendPotinDeletion extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'potin:deleted {message}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a PotinWasDeleted Event.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // Just randomly grab the first user for now.
        // $user= \App\User::first();
        // $post = \App\Post::create([
        //     'user_id' =>
        // ]);
        $user = \App\User::first();
        $post = \App\Post::first();
        $message = $this->argument('message');

        event(new \App\Events\PotinWasDeleted($post, $user, $message));
    }
}
