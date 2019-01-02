<?php


use Phinx\Migration\AbstractMigration;

class TrackMigration extends AbstractMigration
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
        $track = $this->table("track");
        $track
            ->addColumn("name", "string", ["limit" => 255, "null" => false])
            ->addColumn("position", "integer", ["null" => false])
            ->addColumn("duration", "string", ["limit" => 10, "null" => false])
            ->addColumn("album_id", "integer")
            ->addForeignKey('album_id', 'album', 'id', ['delete'=> 'NO_ACTION', 'update'=> 'NO_ACTION'])
            ->addTimestamps()
            ->addIndex(["id"], ["unique" => true, "name" => "track_index"]);
        $track->create();
    }
}
