<?php


use Phinx\Migration\AbstractMigration;

class AlbumMigration extends AbstractMigration
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
        $album = $this->table("album");
        $album
            ->addColumn("title", "string", ["limit" => 255, "null" => false])
            ->addColumn("release_date", "date")
            ->addColumn("compilation", "boolean", ["default" => false])
            ->addColumn("description", "text")
            ->addColumn("genre_id", "integer")
            ->addForeignKey('genre_id', 'genre', 'id', ['delete'=> 'SET_NULL', 'update'=> 'NO_ACTION'])
            ->addTimestamps()
            ->addIndex(["id"], ["unique" => true, "name" => "album_index"]);
        $album->create();
    }
}
