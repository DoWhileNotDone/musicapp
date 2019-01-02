<?php

use Phinx\Seed\AbstractSeed;

class TrackArtistSeeder extends AbstractSeed
{

    public function getDependencies()
    {
        return [
            'TrackSeeder',
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

        $tracks = [];
        // returns PDOStatement
        $stmt = $this->query("SELECT id FROM track WHERE name ='Intro'");
        // returns the result as an array
        $rows = $stmt->fetchAll();
        $tracks['god_one'] = $rows[0]['id'];

        $data = [
            [
                "track_id" => $tracks['god_one'],
                "artist_id" => $artists['one'],
            ],
        ];

        $trackartist = $this->table("trackartist");
        $trackartist
            ->insert($data)
            ->save();

    }
}
