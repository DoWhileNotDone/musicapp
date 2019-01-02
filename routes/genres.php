<?php

use MusicApp\Models\Genre;

$app->get("/genres", function ($request, $response, $arguments) {

    $genres = Genre::all();

    return $response->withStatus(200)
        ->withHeader("Content-Type", "application/json")
        ->write(json_encode($genres, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
});
