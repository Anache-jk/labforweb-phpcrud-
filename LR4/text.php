<?php
require_once 'vendor/logictext.php';
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="icon" href="/imgall/img/unnamed.ico" type="image/x-icon">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
        <link rel = "stylesheet" href = "cssfiles/textcss.css" type="text/css" >
        <title>Обработка текста</title>
    </head>
<body class = "position-relative">
    <div class = "d-flex container-xxl justify-content-center ">
        <form class="form d-flex justify-content-center flex-column" action="" method ="post">
            <label class="form d-flex flex-column text-center">ПОЛЕ ДЛЯ ФОРМАТИРОВАНИЯ ТЕКСТА</label>
            <textarea class = "textareastyle" name = "textcheck" ><?php if($_GET['preset'] == 1) {
                    echo $wikitext;
                } elseif ($_GET['preset'] == 2) {
                    echo $ukrainetext;
                }
                elseif ($_GET['preset'] == 3) {
                    echo $winnitext;
                }
                else{ echo $text;
                }?></textarea>
            <button type="submit" name = "submit" class="buttons">Отправить текст на форматирование</button>
        </form>
    </div>
<div class = "d-flex container-fluid justify-content-center flex-row">
     <?php
    if($text==""){
        echo '<h1>Введите что-нибудь!</h1>';
    }
elseif($contentfromtext||$linklist||$text2) {
    echo '<table><tr><th><h1 class = "text-center">Отформатированный текст</h1></th> <th><h1 class = "text-center">Сырой текст</h1></th></tr>
                    <tr><td>' . $contentfromtext . '</td><td></td></tr>
                    <tr><td>' . $linklist . '</td><td></td></tr>
                    <tr><td>' . $text2 . '</td><td>'. $text . '</td></tr> </table>';

} else{
    '<h1>Произошла ошибка чтения текста!</h1>';
}?>
</div>

<?php include('footerscript.php');?>
