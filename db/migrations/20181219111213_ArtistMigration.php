<?php


use Phinx\Migration\AbstractMigration;

class ArtistMigration extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTables
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $artist = $this->table("artist");
        $artist
            ->addColumn("name", "string", ["limit" => 255, "null" => false])
            ->addColumn("description", "text")
            ->addTimestamps()
            ->addIndex(["id"], ["unique" => true, "name" => "artist_index"]);
        $artist->create();
    }
}
