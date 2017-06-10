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
    // Si l'id de l'auteur est le meme que celui de l'utilisateur qui demande accés au chanel.
    return (int) $user->id === (int) $userId;
});
