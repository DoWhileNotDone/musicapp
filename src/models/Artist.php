<?php

namespace MusicApp\Models;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model {

  protected $table = 'artist';

  /**
   * The albums that belong to the artist.
   */
  public function albums()
  {
    return $this->belongsToMany('MusicApp\Models\Album', 'albumartist');
  }

  /**
   * The tracks that belong to the artist.
   */
  public function tracks()
  {
    return $this->belongsToMany('MusicApp\Models\Track', 'trackartist');
  }

}
