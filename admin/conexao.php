<?php

    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'hotel';

    $pdo = new PDO("mysql:host=$host;dbname=$database",$user,$password);
    $query = $pdo->query("SELECT SYSDATE() 'SYSDATE'");
    $registro = $query->fetch();
    echo $registro["SYSDATE"];

    ini_set('display_errors',true);
    error_reporting(E_ALL);

    echo $database;

?>