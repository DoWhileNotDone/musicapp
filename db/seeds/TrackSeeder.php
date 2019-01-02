<?php


use Phinx\Seed\AbstractSeed;

class TrackSeeder extends AbstractSeed
{

    public function getDependencies()
    {
        return [
            'AlbumSeeder'
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

        $albums = [];

        // returns PDOStatement
        $stmt = $this->query("SELECT id FROM album WHERE title ='Garden of Delete'");
        // returns the result as an array
        $rows = $stmt->fetchAll();
        $albums['god'] = $rows[0]['id'];

        $data = [
            [
                "name" => "Intro",
                "position" => 1,
                "duration" => "0:27",
                "album_id" => $albums['god'],
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s"),
            ],
            [
                "name" => "Ezra",
                "position" => 2,
                "duration" => "4:26",
                "album_id" => $albums['god'],
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s"),
            ],
            [
                "name" => "ECCOJAMC1",
                "position" => 3,
                "duration" => "0:32",
                "album_id" => $albums['god'],
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s"),
            ],
        ];

        $track = $this->table("track");
        $track
            ->insert($data)
            ->save();

    }
}
