<?php


use Phinx\Seed\AbstractSeed;

class AlbumSeeder extends AbstractSeed
{

    public function getDependencies()
    {
        return [
            'GenreSeeder'
        ];
    }

    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {

        $god_description = <<<GOD_DESC
Garden of Delete is the seventh studio album by American electronic musician Oneohtrix Point Never, released on November 13, 2015 by Warp Records.
GOD_DESC;

        $genres = [];

        // returns PDOStatement
        $stmt = $this->query("SELECT id FROM genre WHERE name ='Electronic'");
        // returns the result as an array
        $rows = $stmt->fetchAll();
        $genres['electronic'] = $rows[0]['id'];

        $data = [
            [
                "title" => "Garden of Delete",
                "release_date" => "2015-11-13",
                "compilation" => 0,
                "description" => $god_description,
                "genre_id" => $genres['electronic'],
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s"),
            ],
        ];

        $album = $this->table("album");
        $album
            ->insert($data)
            ->save();

    }
}
