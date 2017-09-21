<?php

namespace TrayLabs\Pastelaria\Datasource;

use PDO;
use PDOException;
use Exception;
use Symfony\Component\Yaml\Yaml;

class Conexao
{
    /**
     * @var \PDO
     */
    protected static $pdo;

    /**
     * Não deixar instanciar a classe de Conexao
     *
     * @return void
     */
    private function __construct()
    {
    }

    /**
     * Captura a instância da conexao
     *
     * @return \PDO
     * @throw \PDOException
     */
    public static function getPdo()
    {
        if (! self::$pdo) {

            $yaml = Yaml::parse(file_get_contents(__DIR__ . '/../../phinx.yml'));
            $env  = $yaml['environments']['default_database'];
            $configs = $yaml['environments'][$env];

            try {
                self::$pdo = new PDO(sprintf('%s:host=%s;dbname=%s;port=%s',
                    $configs['adapter'],
                    $configs['host'],
                    $configs['name'],
                    $configs['port']
                ), $configs['user'], $configs['pass']);
            } catch (PDOException $error) {
                throw new Exception($error->getMessage());
            }
        }

        return self::$pdo;
    }
}