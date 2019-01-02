<?php


use Phinx\Seed\AbstractSeed;

class GenreSeeder extends AbstractSeed
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

        $pop_description = <<<POP_DESC
Pop music is a genre of popular music that originated in its modern form in the United States and United Kingdom during the mid-1950s. The terms "popular music" and "pop music" are often used interchangeably, although the former describes all music that is popular and includes many diverse styles. "Pop" and "rock" were roughly synonymous terms until the late 1960s, when they became increasingly differentiated from each other.
POP_DESC;

        $alt_description = <<<ALT_DESC
Alternative metal (also known as alt-metal) is a rock music fusion genre that infuses heavy metal with influences from alternative rock and other genres not normally associated with metal. Alternative metal bands are often characterized by heavily downtuned, mid-paced guitar riffs, a mixture of accessible melodic vocals and harsh vocals and sometimes unconventional sounds within other heavy metal styles. The term has been in use since the 1980s, although it came into prominence in the 1990s.
ALT_DESC;

        $ele_description = <<<ELE_DESC
Electronic music is music that employs electronic musical instruments, digital instruments and circuitry-based music technology.
ELE_DESC;

        $data = [
            [
              "name" => "Pop",
              "description" => $pop_description,
              "created_at" => date("Y-m-d H:i:s"),
              "updated_at" => date("Y-m-d H:i:s"),
            ],
            [
              "name" => "Alternative Metal",
              "description" => $alt_description,
              "created_at" => date("Y-m-d H:i:s"),
              "updated_at" => date("Y-m-d H:i:s"),
            ],
            [
              "name" => "Electronic",
              "description" => $ele_description,
              "created_at" => date("Y-m-d H:i:s"),
              "updated_at" => date("Y-m-d H:i:s"),
            ],

        ];

        $genre = $this->table("genre");
        $genre
            ->insert($data)
            ->save();

    }
}
