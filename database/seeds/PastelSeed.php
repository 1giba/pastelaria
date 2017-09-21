<?php

use Phinx\Seed\AbstractSeed;

class PastelSeed extends AbstractSeed
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
        $data =  [
            [
                'nome'    => 'Pastel de Flango',
                'recheio' => 'Flango',
                'valor'   => 4.90,
            ],

            [
                'nome'    => 'Pastel de Flango Catupily',
                'recheio' => 'Flango e Catupily',
                'valor'   => 5.30,
            ],
            [
                'nome'    => 'Pastel de Camalao',
                'recheio' => 'Camalao',
                'valor'   => 6.50,
            ],
        ];

        $pasteis = $this->table('pasteis');
        $pasteis->insert($data)
              ->save();
    }
}
