<?php

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('potin-deleted.{userId}', function ($user, $userId) {
    // @todo
    // Si le post correspondant au postId est le meme que celui du user courant => true

    // $post = \App\Post::findOrFail($postId);
    // return (int) $user->id === (int) $post->user_id;

    return true; 
});
