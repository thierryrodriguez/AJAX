<?php

class Conexion extends PDO{
    private const USER = "root";
    private const PASS = "";
    private const DB = "ajax";
    private const PORT = "3306";
    private const HOST = "localhost" . ":" . self::PORT;
    private const DSN = "mysql:host=" . self::HOST . ";dbname=" . self::DB . ";charset=utf8";

    public function __construct()
    {
        try {
            if (isset($_SESSION['user_db'])) {
                parent::__construct(self::DSN, $_SESSION['user_db'], $_SESSION['pass_db']);
            }else {
                parent::__construct(self::DSN, self::USER, self::PASS);
            }
        } catch (PDOException $e) {
            throw new Exception('Ha surgido un error y no se puede conectar a la base de datos. Detalle: ' .$e->getMessage());
        }
    } 
}