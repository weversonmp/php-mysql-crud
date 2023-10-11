<?php

$host = 'my_host';
$dbName = 'my_db';
$dbUser = 'my_user';
$dbPassword = 'my_password';

try {
    $PDO = new PDO('mysql:host=' . $host . ';dbname=' . $dbName, $dbUser, $dbPassword);
} catch (PDOException $e) {
    echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();
}

// $banco->query("set names 'utf8'");
// $banco->query("set character_set_connection=utf8");
// $banco->query("set character_set_client=utf8");
// $banco->query("set character_set_results=utf8");

$query = $PDO->query("SELECT * FROM programadores");
$rows = $query->fetchAll();
 
print_r($rows);