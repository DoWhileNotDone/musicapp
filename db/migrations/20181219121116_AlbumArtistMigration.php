<?php


use Phinx\Migration\AbstractMigration;

class AlbumArtistMigration extends AbstractMigration
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
     *    renameTable
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
        $albumartist = $this->table("albumartist");
        $albumartist
            ->addColumn("album_id", "integer")
            ->addColumn("artist_id", "integer")
            ->addForeignKey('album_id', 'album', 'id', ['delete'=> 'CASCADE', 'update'=> 'NO_ACTION'])
            ->addForeignKey('artist_id', 'artist', 'id', ['delete'=> 'CASCADE', 'update'=> 'NO_ACTION'])
            ->addIndex(["id"], ["unique" => true, "name" => "albumartist_index"]);
        $albumartist->create();
    }
}
