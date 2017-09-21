<?php

namespace TrayLabs\Pastelaria\Traits;

use ReflectionClass;

trait Hydrator
{
    /**
     * Hidratar objetos
     *
     * @param array $rows
     * @return array
     */
    public function hydrateAll($rows)
    {
        if (! property_exists($this, 'entity')
            || ! property_exists($this, 'constructorArgs')) {
            return [];
        }

        $results = [];
        foreach ($rows as $index => $row) {
            $reflexo = new ReflectionClass($this->entity);

            $args = [];
            foreach ($this->constructorArgs as $arg) {
                $args[] = $row[$arg];
            }

            $results[$index] = $reflexo->newInstanceArgs($args);
        }

        return $results;
    }
}