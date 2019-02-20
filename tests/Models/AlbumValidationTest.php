<?php

namespace MusicApp\Test\Models;

use PHPUnit\Framework\TestCase;
use Rakit\Validation\Validator;
use MusicApp\Models\Album;

class AlbumValidationTest extends TestCase
{

    protected $validator;

    protected function setUp()
    {
        $this->validator = new Validator;
    }

    public function testValidData()
    {
        $album = new Album();
        $album->title = "This is a valid title";
        $album->release_date = "2018-01-31";

        $validation = $this->validator->validate($album->toArray(), $album->getRules());

        $this->assertTrue($validation->passes());

        $album->title = "This is a also a valid title";

        $validation = $this->validator->validate($album->toArray(), $album->getRules());

        $this->assertTrue($validation->passes());

        //TODO: As this only checks format, not the validity of the date, this passes
        //      A custom rule is likely required
        $album->release_date = "2018-02-31";

        $validation = $this->validator->validate($album->toArray(), $album->getRules());

        $this->assertTrue($validation->passes());

    }

    public function testInvalidData()
    {
        $album = new Album();
        $album->title = "";
        $album->release_date = "2018-01-31";

        $validation = $this->validator->validate($album->toArray(), $album->getRules());
        $this->assertTrue($validation->fails());

        $titleError = $validation->errors()->first('title');
        $this->assertNotNull($titleError);
        $this->assertEquals($titleError, "The Title is required");

        $album->title = "filler";
        $album->release_date = "XYZ";

        $validation = $this->validator->validate($album->toArray(), $album->getRules());
        $this->assertTrue($validation->fails());

        $releaseDateError = $validation->errors()->first('release_date');
        $this->assertNotNull($releaseDateError);
        $this->assertEquals($releaseDateError, "The Release date is not valid date format");

        $album->release_date = "13-12-1999";

        $validation = $this->validator->validate($album->toArray(), $album->getRules());
        $this->assertTrue($validation->fails());

        $releaseDateError = $validation->errors()->first('release_date');
        $this->assertNotNull($releaseDateError);
        $this->assertEquals($releaseDateError, "The Release date is not valid date format");

    }

}
