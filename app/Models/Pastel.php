<?php

namespace TrayLabs\Pastelaria\Models;

use TrayLabs\Pastelaria\Entities\Pastel as PastelEntity;
use TrayLabs\Pastelaria\Traits\Hydrator;

class Pastel extends AbstractModel
{
    use Hydrator;

    /**
     * @var string
     */
    protected $entity = PastelEntity::class;

    /**
     * @var array
     */
    protected $constructorArgs = [
        'nome',
        'recheio',
        'valor',
    ];

    /**
     * { @inheritdoc }
     */
    public function getTableName()
    {

        return 'pasteis';
    }

    /**
     * Método all em objetos
     *
     * @param array $fields
     * @return \TrayLabs\Pastelaria\Entities\Pastel[]
     */
    public function allPasteis($fields = ['*'])
    {
        $rows    = $this->all($fields);
        $pasteis = $this->hydrateAll($rows);

        return $pasteis;
    }
}