<?php
require_once __DIR__ . '/config.php';
class Connection
{
    public $_db;

    private static $instance = NULL;

    public function __construct()
    {
        try {
            $this->_db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . '', DB_USER, DB_PASS);
        } catch (PDOException $e) {
            return 'Error : ' . $e->getMessage();
        }
    }

    public static function  getConnection()
    {
        if (!isset(self::$instance)) {
            //$pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
            self::$instance = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . '', DB_USER, DB_PASS);
        }
        return self::$instance;
    }
}
