<?php

namespace MusicApp\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model {

  protected $table = 'genre';

  public function albums()
  {
      return $this->hasMany('MusicApp\Models\Album');
  }

}
