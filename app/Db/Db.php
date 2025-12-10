<?php

namespace App\Db;

/** PDO importation */
use PDO;
use PDOException;

class Db {

  /** Connexion informations */
    private static $instance;

    private const DBHOST = 'localhost';
    private const DBUSER = 'root';
    private const DBPASS = '';
    private const DBNAME = 'touche-pas-au-klaxon';

    public static function getInstance(): PDO
    {
        if (self::$instance === null) {

            $_dsn = 'mysql:dbname=' . self::DBNAME . ';host=' . self::DBHOST;

            try {
                self::$instance = new PDO(
                    $_dsn,
                    self::DBUSER,
                    self::DBPASS,
                    [
                        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                    ]
                );

            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

        return self::$instance;
    }
}
