<?php

namespace MusicApp\Models;

use Illuminate\Database\Eloquent\Model;

class TrackArtist extends Model {

  protected $table = 'trackartist';
  public $timestamps = false;
  /**
   * Get the album
   */
  public function artist()
  {
      return $this->belongsTo('MusicApp\Models\Artist');
  }

  /**
   * Get the track
   */
  public function track()
  {
      return $this->belongsTo('MusicApp\Models\Track');
  }

}
