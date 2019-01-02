<?php

use MusicApp\Models\Album;

$app->get("/albums", function ($request, $response, $arguments) {

    $albums = Album::all();

    return $response->withStatus(200)
        ->withHeader("Content-Type", "application/json")
        ->write(json_encode($albums, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
});

$app->post("/albums", function ($request, $response, $arguments) {

    $parsedBody = $request->getParsedBody();

    $album = new Album;

    $album->title = $parsedBody['title'];
    $album->release_date = $parsedBody['release_date'];
    $album->compilation = $parsedBody['compilation'];
    $album->genre_id = $parsedBody['genre_id'];
    $album->description = $parsedBody['description'];

    //Validate the request...
    $validation = $this->validator->validate($album->toArray(), $album->getRules());

    if($validation->fails()) {
      $this->logger->warning("Invalid POST data sent, not creating", $album->toArray());
      return $response->withStatus(400);
    }

    $album->save();

    $location = "albums/{$album->id}";

    return $response->withStatus(201)
        ->withHeader("Content-Type", "application/json")
        ->withHeader("Content-Location", $location)
        ->write(json_encode($album, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));

});

$app->get("/albums/{id:[0-9]+}", function ($request, $response, $arguments) {

    $album = Album::find($arguments['id']);

    if (!$album) {
      return $response->withStatus(404);
    }

    return $response->withStatus(200)
          ->withHeader("Content-Type", "application/json")
          ->write(json_encode($album, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
});

$app->get("/albums/{title}", function ($request, $response, $arguments) {

    $album = Album::where('title', $arguments['title'])->get();

    if (!$album) {
      return $response->withStatus(404);
    }

    return $response->withStatus(200)
          ->withHeader("Content-Type", "application/json")
          ->write(json_encode($album, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
});

$app->map(["PUT", "PATCH"], "/albums/{id}", function ($request, $response, $arguments) {

    $album = Album::find($arguments['id']);

    if (!$album) {
      return $response->withStatus(404);
    }
    $parsedBody = $request->getParsedBody();

    $album->title = $parsedBody['title'] ?? $album->title;
    $album->release_date = $parsedBody['release_date'] ?? $album->release_date;
    $album->compilation = $parsedBody['compilation'] ?? $album->compilation;
    $album->genre_id = $parsedBody['genre_id'] ?? $album->genre_id;
    $album->description = $parsedBody['description'] ?? $album->description;

    //Validate the request...
    $validation = $this->validator->validate($album->toArray(), $album->getRules());

    if($validation->fails()) {
      $this->logger->warning("Invalid PUT/PATCH data sent, not persisting", $album->toArray());
      return $response->withStatus(400);
    }

    $album->save();

    return $response->withStatus(200)
        ->withHeader("Content-Type", "application/json")
        ->write(json_encode($data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
});

$app->delete("/albums/{id}", function ($request, $response, $arguments) {

    $album = Album::find($arguments['id']);

    if (!$album) {
      return $response->withStatus(404);
    }

    $album->delete();

    return $response->withStatus(204);
});
