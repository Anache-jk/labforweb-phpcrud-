<?php
require_once 'connect.php';
$salt = "dfighd@i75.543gtfh/";
$login = $_POST['login'];
$login = htmlspecialchars($login);
$password = $_POST['password'];
$password = htmlspecialchars($password);
$password = md5($salt . $password);
$passerr = "";
$usererr = "";
if(isset($_POST['loginin'])) {
    $time = time();
    $stmt = $connection->prepare("SELECT * FROM users WHERE login=:login and password=:password");
    $stmt->execute([
        'login' => $login,
        'password' => $password,
    ]);
    $logcheck = $connection->prepare("SELECT * FROM users WHERE login=:login");
    $logcheck->execute([
        'login' => $login,
    ]);
    $passcheck = $connection->prepare("SELECT * FROM users WHERE password=:password");
    $passcheck->execute([
        'password' => $password,
    ]);
    $logcheckcount =  $logcheck->fetchColumn();
    $passcheckcount = $passcheck->fetchColumn();
    $check = $stmt->fetchColumn();

    if($logcheckcount>0 && $password != md5($salt) && $check==0){
        $passerr = "Неверный пароль";
        $_SESSION['errors']++;
    }
    if($password == md5($salt) && $logcheckcount>0){
        $passerr = "Введите пароль";
    }
    if($logcheckcount==0){
        $usererr = 'Пользователь не найден';
    }
    if($_SESSION['errors']>=3){
        $_SESSION['time'] = $time + 3600;
        $usererr = 'Слишком большое количество попыток входа, попробуйте войти через час';
    }

    if ($check > 0) {
        header('location: ../index.php');
        $_SESSION['check'] = 1; //контроль того, что мы вошли
        $_SESSION['login'] = $login;
    }
}
if(isset($_POST['exit'])){
    unset($_SESSION['check']);
    unset($_SESSION['login']);
    unset($_SESSION['msg']);
    session_destroy();
    header('location: ../autorization.php');
}