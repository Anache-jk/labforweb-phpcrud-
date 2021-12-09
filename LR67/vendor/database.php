<?php

class database
{

    function connect(){
        try{
            $db = new PDO("mysql:host=localhost;dbname=funeraldb;charset=utf8", "root", '');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);}
        catch(PDOException $e){
            return $e->getMessage();
        }
        return $db;
    }

}
