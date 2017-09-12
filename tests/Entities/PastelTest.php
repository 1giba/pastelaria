<?php

use TrayLabs\Pastelaria\Entities\Pastel;

class PastelTest extends PHPUnit_Framework_TestCase
{
    public function testGetNomeShouldBeSuccess()
    {
        $pastel = new Pastel('Pastel de Flango', 'flango', 4.50);
        $this->assertEquals('Pastel de Flango', $pastel->getNome());
    }

    public function testGetRecheioShouldBeSuccess()
    {
        $pastel = new Pastel('Pastel de Flango', 'flango', 4.50);
        $this->assertEquals('flango', $pastel->getRecheio());
    }
}