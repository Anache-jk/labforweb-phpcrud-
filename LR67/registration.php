<?php
require_once 'vendor/signup.php';
?>

<body>
<? include('header.php');?>
<div class = "d-flex container-xxl justify-content-center p-4 ">
    <form action="" method = "post" class="form">

        <label class = "labels">Ваше ФИО</label>
        <input class = "forminputs" name = "fioname" type = "text" placeholder="Введите ФИО полностью" value="<? echo $fioname?>">
        <?php if($arrayerrors['errfio']){
            echo ' <div class = "err">'.$arrayerrors['errfio'] . '</div>';}
        ?>
        <label class = "labels">Ваша группа крови</label>
        <input type="number" name = "groupblood" placeholder="" step="1" min="1" max="4" value="<? echo $groupblood ?>">
        <?php if($arrayerrors['errblood']){
            echo ' <div class = "err">'.$arrayerrors['errblood'] . '</div>';}
        ?>
        <label class = "labels">Ваш резус фактор</label>
        <input class = "forminputs" name = "rhfactor" type = "text" placeholder="Введите резус фактор" value="<? echo $rhfactor ?>">
        <?php if($arrayerrors['errRH']){
        echo ' <div class = "err">'.$arrayerrors['errRH'].'</div>';}
        ?>
        <label class = "labels">Ваш логин(email)</label>
        <input class = "forminputs" name = "login" type="email" placeholder="Введите логин" value="<? echo $login?>">
        <?php if($arrayerrors['errlogin']){
            echo ' <div class = "err">'.$arrayerrors['errlogin'] . '</div>';}
        ?>
        <label class = "labels">Придумайте пароль</label>
        <input class = "forminputs"  name = "password" type = "password" placeholder="Введите пароль(A-Z, a-z, 1-9, >6)" value="<? echo $password?>">
        <?php if($arrayerrors['errpassword']){
            echo ' <div class = "err">'.$arrayerrors['errpassword'] . '</div>';}
        ?>
        <label class = "labels">Подтвердите пароль</label>
        <input class = "forminputs" name = "confirmpassword" type = "password" placeholder="Введите пароль ещё раз" value="<? echo $confirmpassword?>">
        <?php if($arrayerrors['errpassword']){
            echo ' <div class = "err">'.$arrayerrors['errpassword'] . '</div>';}
        ?>
        <button type="submit" name="register" class = "buttons" >Зарегистрироваться</button>
        <div>
            Если у вас уже есть аккаунт - <a href="autorization.php">войдите!</a>
        </div>
    </form>
</div>
<? include('footerscript.php');?>




