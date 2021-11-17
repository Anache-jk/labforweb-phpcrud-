<?php
require_once 'connect.php';

if(isset($_POST['export'])){
    $sql = "select * from `deadpeople`";
    $data = $connection->prepare($sql);
    $data->execute();
    $data = $data->fetchALL(PDO::FETCH_ASSOC);
    $exportDB = json_encode($data,JSON_UNESCAPED_UNICODE);
    $url='C:/OpenServer/domains/LR5/impex/deadpeople_exported.json';
    if(!file_exists($url)){
file_put_contents($url,$exportDB,LOCK_EX);}
}
