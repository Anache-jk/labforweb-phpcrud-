<?php
require_once 'vendor/logicviewtable.php';
$idhuman = htmlspecialchars($_GET['id']);
$data = $obj->getById($idhuman);
?>
<? include('header.php');?>
<div class = "d-flex container-xxl justify-content-center p-4 flex-column border border-info">
    <h1 class="text-center">Информация по мертвеце</h1>
<?php
foreach($data as $row):?>
    <div class="m-4 d-flex flex-row p-2 align-items-center justify-content-center"><h3>Фотография покойничка - </h3><img src="imgall/deadimg/<?php echo $row[1]?>" class = "imgcheck"></div>
    <div class="m-4 d-flex flex-row p-2 justify-content-center"><h3>ФИО покойничка(ов): </h3><h3><?=$row[2]?></h3></div>
    <div class="m-4 d-flex flex-row  p-2 justify-content-center" ><h3>Тип места захоронения: </h3><h3><?=$row[5]?></h3></div>
    <div class="m-4 d-flex flex-row  p-2 justify-content-center"><h3>Дата и время погребения: </h3><h3><?=$row[3]?></h3></div>
    <div class="m-4 d-flex flex-row  p-2 justify-content-center" ><h3>Количество присутствовавших на погребении: </h3><h3><?=$row[4]?></h3></div>
<?php endforeach;?>
    <a href="viewtable.php" class="m-5 text-center"><button type="button" class = "buttons m-5" >Уйти к умершим</button></a>
</div>
<? include('footerscript.php');?>
