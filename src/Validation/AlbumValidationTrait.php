<?php

namespace MusicApp\Validation;

trait AlbumValidationTrait {

  private $rules = [
      'title' => 'required|max:255',
      'release_date' => 'date'
  ];

  public function getRules() : array
  {
     return $this->rules;
  }

}
