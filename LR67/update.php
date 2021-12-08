<?php
require_once 'vendor/logicviewtable.php';
$humanid = htmlspecialchars($_GET['id']);
$data = $obj->getById($humanid);
?>
<? include('header.php');?>
    <div class = "d-flex container-xxl justify-content-center p-4 ">
        <form enctype="multipart/form-data" action="" method = "post" class="form">
            <input type="hidden" name="humanid" value="<? echo $data[0][0] ?>">
            <input type="hidden" name="nameimg" value="<? echo $data[0][1] ?>">
            <label class = "labels">ФИО усопшего</label>
            <input class = "forminputs" name = "FIO" type = "text" placeholder="Введите ФИО полностью" value="<? if(!$deadhuman['FIO']){echo $data[0][2];}else{echo $deadhuman['FIO'];} ?>">
            <?php if($arrayerrors['errfio']){
                echo ' <div class = "err">'.$arrayerrors['errfio'] . '</div>';}
            ?>
            <label class = "labels">Фотография могилы</label>
            <input type="file" name = "imgpog">
            <?php if($arrayerrors['errimg']){
                echo ' <div class = "err">'.$arrayerrors['errimg']. '</div>';}
            ?>
            <label class = "p-4 text-center">Выберете тип могилы</label>
            <select name="nameofplace" class="form-control">
                <option value="<?php if(!$deadhuman['nameofplace']){echo $data[0][6];}else{echo $deadhuman['nameofplace'];}?>" selected><?php if($deadhuman['nameofplace']){echo $row[$deadhuman['nameofplace']-1]['name'];}else{ echo $data[0][5];} ?></option>
                <?php
                foreach($row as $placed){
                if(!$deadhuman['nameofplace']){
                    if($placed['id']!=$data[0][6]){
                   echo '<option value = "'.$placed['id'].'">'. $placed['name'].'</option>';}}
                else{
                    if($placed['id']!=$row[$deadhuman['nameofplace']-1]['id']){
                    echo '<option value = "'.$placed['id'].'">'.$placed['name'].'</option>';
                }
                } }?>
            </select>
            <?php if($arrayerrors['errplace']){
                echo ' <div class = "err">'.$arrayerrors['errplace']. '</div>';}
            ?>
            <label class = "labels">Дата и время захоронения</label>
            <input class = "forminputs" name = "dateburial" type="text" value="<?php if(!$deadhuman['dateburial']){echo $data[0][3];}else{echo $deadhuman['dateburial'];}?>">
            <?php if($arrayerrors['errdate']){
                echo ' <div class = "err">'.$arrayerrors['errdate']. '</div>';}
            ?>
            <label class = "labels">Число присутствовавших</label>
            <input type="number" name = "numaudience" step="1" min="0" value="<?php  if(!$deadhuman['numaudience']){echo $data[0][4];}else{echo $deadhuman['numaudience'];}?>">
            <?php if($arrayerrors['numaudience']){
                echo ' <div class = "err">'.$arrayerrors['numaudience']. '</div>';}
            ?>
            <div class = "d-flex flex-row p-2">
                <a href="viewtable.php" class="m-5">Уйти к умершим</a>
                <button type="submit" name="editing" class = "buttons m-5" >Обновить покойничка</button>
            </div>
        </form>
    </div>
<?php include('footerscript.php');?>
