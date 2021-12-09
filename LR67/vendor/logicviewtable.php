<?php
require_once 'crudclass.php';

$obj = new CrudDeadpeople();
$row = $obj->getplaces();
$conn = new database();
$obj->getconnectdb($conn->connect());
$deadhuman['FIO'] = htmlspecialchars($_POST['FIO']);
$deadhuman['nameofplace'] = htmlspecialchars($_POST['nameofplace']);
$deadhuman['dateburial'] = htmlspecialchars($_POST['dateburial']);
$deadhuman['numaudience'] = htmlspecialchars($_POST['numaudience']);
$deadhuman['img'] = htmlspecialchars($_FILES['imgpog']['name']);
if(isset($_POST['creating'])||(isset($_POST['editing']))) {
    $erroscheck=0;
    if (!preg_match("@[0-3][0-9].[01][0-9].[0-2][0-9][0-9][[0-9] [0-2][0-9]:[0-6][0-9]@u", $deadhuman['dateburial']) || $deadhuman['dateburial'] == ""
        || preg_match("@(3[2-9].[01][0-9].[0-2][0-9][0-9][[0-9])|([0-3][0-9].1[3-9].[0-2][0-9][0-9][0-9])|([0-3][0-9].[01][0-9].2[1-9][0-9][0-9])|([0-3][0-9].[01][0-9].20[3-9][0-9])|([0-3][0-9].[01][0-9].202[2-9]) (2[4-9]:[0-6][0-9])|([0-2][0-9]:6[0-9])@u", $deadhuman['dateburial'])) {
        $arrayerrors['errdate'] = 'Дата содержит некорректную информацию или пуста';
        $erroscheck++;
    }
    if ($deadhuman['FIO'] == "" || !preg_match("@^[а-яёА-ЯЁa-zA-Z ]+$@ui", $deadhuman['FIO'])) {
        $arrayerrors['errfio'] = 'ФИО содержит цифры, символы или пусто';
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
    if ($checkimg != "ок") {
        $arrayerrors['errimg'] = $checkimg;
        $erroscheck++;
    }

    if ((isset($_POST['creating'])) && $erroscheck == 0) {
        $obj->insert($deadhuman['FIO'], $deadhuman['nameofplace'], $deadhuman['dateburial'], $deadhuman['numaudience'], $_FILES['imgpog']);
    }
    if ((isset($_POST['editing'])) && $erroscheck == 0) {
        $idhuman = htmlspecialchars($_POST['humanid']);
        $nameimg = htmlspecialchars($_POST['nameimg']);
        $obj->update($idhuman, $nameimg, $deadhuman['FIO'], $deadhuman['nameofplace'], $deadhuman['dateburial'], $deadhuman['numaudience'], $_FILES['imgpog']);
    }
}
if(isset($_POST['deleting'])){
    $id = htmlspecialchars($_POST['idhuman']);
    $nameim = htmlspecialchars($_POST['imgname']);
    $obj->delete($id,$nameim);
}
