<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
try {
$connection = new PDO("mysql:host=localhost;dbname=funeraldb;charset=utf8", "root", '');
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
echo $e->getMessage();
}
if(!$connection){
    die('Error connect to database');
}
