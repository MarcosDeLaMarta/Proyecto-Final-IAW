<?php

class Database {

    public static function connect()
    {
        $host = 'mariadb';
        $dbname ='comic_cloud';
        $username ='root';
        $password ='changepassword';

        try {
            $dsn = 'mysql:host=' . $host . ';dbname=' . $dbname . ';charset=UTF8';
            $dbh = new PDO($dsn, $username, $password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $dbh;
        } catch (PDOException $e) {
            throw new Exception('Error de conexión a la base de datos: ' . $e->getMessage());
        }
    }
}
