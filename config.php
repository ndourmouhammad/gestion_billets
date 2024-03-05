<?php
try {
    define('dsn', 'mysql:host=localhost;dbname=db_billet;charset=utf8');
    define('user', 'root');
    define('password', '');
    $connection = new PDO(dsn, user, password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $connection;
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}