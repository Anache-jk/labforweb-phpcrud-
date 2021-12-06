<?php
error_reporting(E_ERROR | E_PARSE);
require_once 'vendor/signin.php';
?>

<? include('header.php');?>
<div class = "d-flex container-xxl justify-content-center">
<form class="form" action="" method ="post">
    <label class = "labels">Ваш логин(email)</label>
    <input name = "login" class = "forminputs" type="email" value = "<? echo $login?>">
    <?php
    if($passerror ==0){
   echo '<label class = "labels">Ваш пароль</label>
    <input name = "password" class = "forminputs" type = "password" >';
    }

    if($passerr && $passerror==0){
        echo ' <div class = "err">'.$passerr . '</div>';}
    ?>
    <button name = "loginin" type = "submit" class = "buttons" >Войти</button>
    <div>
        Если у вас не создан аккаунт - <a href="registration.php">зарегистрируйтесь!</a>
    </div>

    <?php if($usererr){
        echo ' <div class = "err">'.$usererr.'</div>';}
    ?>
</form>
</div>

<? include('footerscript.php');?>


