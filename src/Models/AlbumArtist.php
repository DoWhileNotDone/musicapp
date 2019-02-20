<?php

namespace MusicApp\Models;

use Illuminate\Database\Eloquent\Model;

class AlbumArtist extends Model {

  protected $table = 'albumartist';
  public $timestamps = false;
  /**
   * Get the album
   */
  public function album()
  {
      return $this->belongsTo('MusicApp\Models\Album');
  }

  /**
   * Get the artist
   */
  public function artist()
  {
      return $this->belongsTo('MusicApp\Models\Artist');
  }

}
