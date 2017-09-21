<?php

namespace TrayLabs\Pastelaria\TemplateEngines;

use Twig_Loader_Filesystem;
use Twig_Environment;

class View
{
    /**
     * @var \Twig_Environment
     */
    protected static $twig;

    /**
     * Não deixar instanciar a classe de View
     *
     * @return void
     */
    private function __construct()
    {
    }

    /**
     * Recupera a instância do twig
     *
     * @return \Twig_Environment
     */
    public function getTwig()
    {
        if (! self::$twig) {
            $resourcePath = __DIR__ . '/../../resources/';

            $loader = new Twig_Loader_Filesystem($resourcePath . 'views');
            self::$twig = new Twig_Environment($loader, [
                'cache' => $resourcePath . 'cache',
            ]);
        }

        return self::$twig;
    }
}