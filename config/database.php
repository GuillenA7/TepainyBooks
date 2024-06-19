<?php

/**
 * Clase para conexión a base de datos
 * Autor: Adrian Guillen
 * Web: https://github.com/GuillenA7
 */

class Database
{
    private $hostname = "localhost";
    private $database = "tepainybooks";
    private $username = "root";
    private $password = "";
    private $charset = "utf8";

    public function conectar()
    {
        try {
            $conexion = "mysql:host=" . $this->hostname . ";dbname=" . $this->database . ";charset=" . $this->charset;
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];

            $pdo = new PDO($conexion, $this->username, $this->password, $options);

            return $pdo;
        } catch (PDOException $e) {
            echo 'Error conexion: ' . $e->getMessage();
            exit;
        }
    }
}
