<?php

namespace Source\Core;

use \PDO;
use \PDOException;

/**
 * Class Connect
 * @package Source\Database
 */
class Connect
{
    private const OPTIONS = [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ];

    private static PDO $instance;

    /**
     * @return PDO
     */
    public static function getInstance(): PDO
    {
        if (empty(self::$instance)) {
            try {

                self::$instance = new PDO(
                    "mysql:host=" . CONF_DB_HOST . ";dbname=" . CONF_DB_NAME . ";port=". CONF_DB_PORT . ";",
                    CONF_DB_USER,
                    CONF_DB_PASSWD,
                    self::OPTIONS
                );

            } catch (PDOException $exception) {

                die("<h1>Whooops! Erro ao conectar...</h1>");

            }
        }

        return self::$instance;
    }

    /**
     * Connect constructor.
     */
    final private function __construct()
    {
    }

    /**
     * Connect clone
     */
    final private function __clone()
    {
    }
}