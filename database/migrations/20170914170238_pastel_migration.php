<?php

use Phinx\Migration\AbstractMigration;

class PastelMigration extends AbstractMigration
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
        $table = $this->table('pasteis');
        $table->addColumn('nome', 'string', [
                'limit' => 80,
            ])
            ->addColumn('recheio', 'string')
            ->addColumn('valor', 'decimal', [
                'precision' => 12,
                'scale'     => 2,
            ])
            ->create();
    }
}
