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
$passerror = 0;
if(isset($_POST['loginin'])) {
    $time = time();
    $stmt = $connection->prepare("SELECT * FROM `users` WHERE login LIKE '%${login}%'");
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if($result>0){
    if($result['password'] != $password && $password != md5($salt)){
        $passerr = "Неверный пароль";
        $_SESSION['errors']++;
    }

    if($password == md5($salt)){
        $passerr = "Введите пароль";
    }
    if ($result['password']==$password && $result['login']==$login) {
        header('location: ../index.php');
        $_SESSION['check'] = 1; //контроль того, что мы вошли
        $_SESSION['login'] = $login;
    }
}
    else{
        $usererr = 'Пользователь не найден';
}
    if($_SESSION['reg'] == 1){
    $_SESSION['errors']= 0;
    $_SESSION['reg'] =0;
    }
    if($_SESSION['errors']>=3){
        $_SESSION['time'] = $time + 3600;
        $passerror = 1;
        $usererr = 'Слишком большое количество попыток входа, попробуйте войти через час';
    }  
    if($_SESSION['time'] == time() && $passerror==1){
        $_SESSION['errors'] = 0;
        $passerror = 0;
    }
}
if(isset($_POST['exit'])){
    session_destroy();
    header('location: ../autorization.php');
}