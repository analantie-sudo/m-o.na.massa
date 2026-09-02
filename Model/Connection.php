<?php

require_once __DIR__ . '/../Config/configuration.php';

class Connection
{
    public static function getConnection()
    {
        try {
            $connection = new PDO(
                "mysql:host=" . DB_HOST .
                ";port=" . DB_PORT .
                ";dbname=" . DB_NAME,
                DB_USER,
                DB_PASSWORD
            );

            $connection->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );

            $connection->exec("SET NAMES utf8mb4");

            return $connection;

        } catch (PDOException $e) {
            die("Erro na conexão com o banco de dados: " . $e->getMessage());
        }
    }
}
