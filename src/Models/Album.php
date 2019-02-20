<?php

namespace MusicApp\Models;

use Illuminate\Database\Eloquent\Model;
use MusicApp\Validation\AlbumValidationTrait;

class Album extends Model {

  use AlbumValidationTrait;

  protected $table = 'album';

  /**
   * Get the genre associated with the album.
   */
  public function genre()
  {
      return $this->belongsTo('MusicApp\Models\Genre');
  }

  /**
   * Get the tracks associated with the album.
   */
  public function tracks()
  {
      return $this->hasMany('MusicApp\Models\Track');
  }

  /**
   * The artists that belong to the album.
   */
  public function artists()
  {
    return $this->belongsToMany('MusicApp\Models\Artist', 'albumartist');
  }

}
