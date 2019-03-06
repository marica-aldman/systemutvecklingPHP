<?php

function connect_admin() {
    /* Establish a connection to the database */
     $host = 'localhost';
     $db   = 'classicmodels';
     $user = 'root';
     $pass = '';
     $charset = 'utf8mb4';

     $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

     try {
          $pdo = new PDO($dsn, $user, $pass);
     } catch (\PDOException $e) {
          throw new \PDOException($e->getMessage(), (int)$e->getCode());
     }

     return $pdo;
}

?>