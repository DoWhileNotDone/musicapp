<?php

namespace MusicApp\Models;

use Illuminate\Database\Eloquent\Model;

class Track extends Model {

  protected $table = 'track';

  /**
   * Get the genre record associated with the album.
   */
  public function album()
  {
      return $this->belongsTo('MusicApp\Models\Album');
  }

  /**
   * The artists that belong to the track.
   */
  public function artists()
  {
    return $this->belongsToMany('MusicApp\Models\Artist', 'trackartist');
  }


}
