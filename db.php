<?php

$host = 'localhost';
$db = 'my_db';
$user = 'root';
$pass = '';
$charset = 'utf8'; //  not nessesary, only there are problems

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // up exceptions for errors
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // get assoc's array for default
];

$pdo = new PDO($dsn, $user, $pass, $options);

var_dump($pdo);