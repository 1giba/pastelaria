<?php

namespace Tray\Pastelaria\Datasource;

use PDO;
use PDOException;
use Exception;

class Conexao
{
    /**
     * @var \PDO
     */
    protected static $pdo;

    /**
     * Método construtor
     *
     * @return void
     */
    public function __construct()
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
            $configs = include(__DIR__ . '/../../configs/database');

            try {
                self::$pdo = new PDO($configs['dsn'], $configs['username'], $configs['password']);
            } catch (PDOException $error) {
                throw new Exception($error->getMessage());
            }
        }

        return self::$pdo;
    }
}