<?php
try {

    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'dsucic1';
    $db = new PDO("mysql:host={$dbHost};dbname={$dbName};charset=utf8", $dbUsername, $dbPassword);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $ex) {
    die($ex->getMessage());
}
