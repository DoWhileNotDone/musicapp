<?php


use Phinx\Migration\AbstractMigration;

class TrackArtistMigration extends AbstractMigration
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
        $trackartist = $this->table("trackartist");
        $trackartist
            ->addColumn("track_id", "integer")
            ->addColumn("artist_id", "integer")
            ->addForeignKey('track_id', 'track', 'id', ['delete'=> 'CASCADE', 'update'=> 'NO_ACTION'])
            ->addForeignKey('artist_id', 'artist', 'id', ['delete'=> 'CASCADE', 'update'=> 'NO_ACTION'])
            ->addIndex(["id"], ["unique" => true, "name" => "trackartist_index"]);
        $trackartist->create();
    }
}
