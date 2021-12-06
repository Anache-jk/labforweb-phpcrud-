<?php
require_once 'crudclass.php';
$obj = new Crud();
$deadhuman['FIO'] = htmlspecialchars($_POST['FIO']);
$deadhuman['nameofplace'] = htmlspecialchars($_POST['nameofplace']);
$deadhuman['dateburial'] = htmlspecialchars($_POST['dateburial']);
$deadhuman['numaudience'] = htmlspecialchars($_POST['numaudience']);
$erroscheck=0;

if(isset($_POST['creating'])||(isset($_POST['editing']))) {
    if (preg_match("@[A-Za-zА-Яа-я]@u", $deadhuman['dateburial']) || $deadhuman['dateburial'] == "") {
        $arrayerrors['errdate'] = 'Дата содержит символы или пуста';
        $erroscheck++;
    }
    if ($deadhuman['FIO'] == "" || !preg_match("/[а-яА-Яa-zA-Z ]+/", $deadhuman['FIO'])) {
        $arrayerrors['errfio'] = 'ФИО содержит цифры или пусто';
        $erroscheck++;
    }
    if ($deadhuman['nameofplace'] == "") {
        $arrayerrors['errplace'] = 'Заполните место захоронения';
        $erroscheck++;
    }
    if ($deadhuman['numaudience'] == "" && $deadhuman['numaudience'] != 0) {
        $arrayerrors['numaudience'] = 'Введите количество присутствовавших';
        $erroscheck++;
    }
    $checkimg = $obj->checkfile($_FILES['imgpog']);
    echo $checkimg;
    if ($checkimg != "ок") {
        $arrayerrors['errimg'] = $checkimg;
        $erroscheck++;
    }

    if ((isset($_POST['creating'])) && $erroscheck == 0) {
        $obj->insertR($deadhuman['FIO'], $deadhuman['nameofplace'], $deadhuman['dateburial'], $deadhuman['numaudience'], $_FILES['imgpog']);
    }
    if ((isset($_POST['editing'])) && $erroscheck == 0) {
        $idhuman = htmlspecialchars((int)$_POST['humanid']);
        $nameimg = htmlspecialchars($_POST['nameimg']);
        if($idhuman && $nameimg){
        $obj->updateR($idhuman, $nameimg, $deadhuman['FIO'], $deadhuman['nameofplace'], $deadhuman['dateburial'], $deadhuman['numaudience'], $_FILES['imgpog']);}
        else{
            echo "Некорректное имя картинки или id";
            header("Location: viewtable.php");
    }
}
if(isset($_POST['deleting'])){
    $id = htmlspecialchars($_POST['idhuman']);
    $nameim = htmlspecialchars($_POST['imgname']);
    $obj->deleteR($id,$nameim);
}
