<?php

namespace TrayLabs\Pastelaria;

use TrayLabs\Pastelaria\Models\Pastel;
use TrayLabs\Pastelaria\TemplateEngines\View;

class Pastelaria
{
    /**
     * Inicia o sistema de pastelaria
     *
     * @return void
     */
    public function iniciarAplicacao()
    {
        $model   = new Pastel;

        $pasteis = $model->allPasteis();

        echo View::getTwig()->render('pasteis/index.html', [
            'pasteis' => $pasteis,
        ]);
    }
}