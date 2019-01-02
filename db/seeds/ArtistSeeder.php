<?php


use Phinx\Seed\AbstractSeed;

class ArtistSeeder extends AbstractSeed
{
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

        $one_description = <<<ONE_DESC
Daniel Lopatin (born July 25, 1982), best known by the recording alias Oneohtrix Point Never (also styled 0PN), is a Brooklyn-based American composer, producer and singer-songwriter of experimental electronic music.[2][5] He began releasing synthesizer-based recordings under the moniker in the mid-2000s, receiving initial acclaim for the 2009 compilation Rifts. He explored varied styles on subsequent albums such as the sample-heavy Replica (2011) and the MIDI-based R Plus Seven (2013), and signed to British electronic label Warp in 2013.
ONE_DESC;

        $def_description = <<<DEF_DESC
Deftones is an American alternative metal band from Sacramento, California. It was formed in 1988 by Chino Moreno (lead vocals, rhythm guitar), Stephen Carpenter (lead guitar), Abe Cunningham (drums) and Dominic Garcia (bass). During their first five years, the band's lineup changed several times, but stabilized in 1993 when Cunningham rejoined after his departure in 1990; by this time, Chi Cheng was bassist.
DEF_DESC;

        $xcx_description = <<<XCX_DESC
Charlotte Emma Aitchison (born 2 August 1992), known professionally as Charli XCX, is an English singer, songwriter, music video director and record executive. Born in Cambridge and raised in Start Hill, Essex, she began posting songs on MySpace in 2008, which led to her discovery by a promoter who invited her to perform at warehouse raves and parties. In 2010 she signed a recording contract with Asylum Records, releasing a series of singles and mixtapes throughout 2011 and 2012.
XCX_DESC;

        $data = [
            [
              "name" => "Oneohtrix Point Never",
              "description" => $one_description,
              "created_at" => date("Y-m-d H:i:s"),
              "updated_at" => date("Y-m-d H:i:s"),
            ],
            [
              "name" => "Deftones",
              "description" => $def_description,
              "created_at" => date("Y-m-d H:i:s"),
              "updated_at" => date("Y-m-d H:i:s"),
            ],
            [
              "name" => "Charli XCX",
              "description" => $xcx_description,
              "created_at" => date("Y-m-d H:i:s"),
              "updated_at" => date("Y-m-d H:i:s"),
            ],

        ];

        $artist = $this->table("artist");
        $artist
            ->insert($data)
            ->save();
    }
}
