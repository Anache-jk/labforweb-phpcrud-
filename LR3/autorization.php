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

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</body>
</html>


