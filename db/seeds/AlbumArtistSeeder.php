<?php


use Phinx\Seed\AbstractSeed;

class AlbumArtistSeeder extends AbstractSeed
{

    public function getDependencies()
    {
        return [
            'AlbumSeeder',
            'ArtistSeeder',
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

        $artists = [];

        // returns PDOStatement
        $stmt = $this->query("SELECT id FROM artist WHERE name ='Oneohtrix Point Never'");
        // returns the result as an array
        $rows = $stmt->fetchAll();
        $artists['one'] = $rows[0]['id'];

        $albums = [];
        // returns PDOStatement
        $stmt = $this->query("SELECT id FROM album WHERE title ='Garden of Delete'");
        // returns the result as an array
        $rows = $stmt->fetchAll();
        $albums['god'] = $rows[0]['id'];

        $data = [
            [
                "album_id" => $albums['god'],
                "artist_id" => $artists['one'],
            ],
        ];

        $albumartist = $this->table("albumartist");
        $albumartist
            ->insert($data)
            ->save();

    }
}
