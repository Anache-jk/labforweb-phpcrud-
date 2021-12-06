<?php
require_once 'connect.php';
if($_SESSION['check']==1){
  header('Content-type: image/jpeg');// с htaccess так и не разобрался, поэтому решил создавать путь к картинке и вписывать в документ(в зависимости от доступа)
  imagejpeg(imagecreatefromjpeg('../imgall/deadimg/'. $_GET['img']));//прописали путь до картинки и передали её в гет запрос на странице с фильтром
}else{
    header('Location: ../autorization.php');//если доступа нет, вернули на регистрацию
}


