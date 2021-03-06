<?php
class CrudDeadpeople{
    private $connect;

public function __construct(){
        
    }
function getconnectdb($db){
        $this->connect = $db;
}

public function showData(){
        $query = "select deadpeople.id, deadpeople.imgsource, deadpeople.firstsecondthird_name,deadpeople.date_and_time,deadpeople.num_audience, places.name
        from deadpeople
        inner join places on deadpeople.id_place = places.id 
        order by deadpeople.id";
$q = $this->connect->prepare($query);
$q->execute();
if(!$q){
        return "ОШИБКА ЧТЕНИЯ ЗАПИСЕЙ!";
}
$r = $q->fetchALL(PDO::FETCH_NUM);
if($r){
return $r;}
else{
    return "Данные в таблице не найдены";
}
}

public function getById($id){
    $query = "select deadpeople.id, deadpeople.imgsource, deadpeople.firstsecondthird_name,deadpeople.date_and_time,deadpeople.num_audience, places.name,places.id
        from deadpeople
        inner join places on deadpeople.id_place = places.id 
        where deadpeople.id = :id";
$q = $this->connect->prepare($query);
$q->execute(array(':id'=>$id));
$data = $q->fetchALL(PDO::FETCH_NUM);
if($data){
return $data;}
else{
    return "Произошла ошибка чтения по id";}
}

public function update($id,$nameimg,$fio,$place,$date,$audience,$file){
$checkid = $this->getById($id);
if($checkid == "Произошла ошибка чтения по id"){
   return "ID было изменено, обновление записи не произошло";
}
$sql = "UPDATE deadpeople SET imgsource=:srcimg, firstsecondthird_name=:fio, id_place=:place, date_and_time=:dates, num_audience=:audience where deadpeople.id = $id";
$q = $this->connect->prepare($sql);
 if(file_exists($_SERVER['DOCUMENT_ROOT']. "/imgall/deadimg/" . $nameimg){
    unlink($_SERVER['DOCUMENT_ROOT']. "/imgall/deadimg/" . $nameimg);}
else{
    return "Название картинки было изменено, ошибка удаления";
    }
$srcimg = $this->uploadfile($file);
$q->execute(array(':srcimg'=>$srcimg,':fio'=>$fio, ':place'=>$place,':dates'=>$date, ':audience'=>$audience));
    if($q){
        header('location: ../viewtable.php');}
    else{
        return 'Произошла ошибка обращения к базе данных';
}


public function insert($fio,$place,$date,$audience,$file)
{

    $sql = "INSERT INTO deadpeople SET imgsource=:srcimg, firstsecondthird_name=:fio, id_place=:place, date_and_time=:dates, num_audience=:audience";
    $q = $this->connect->prepare($sql);
    $srcimg = $this->uploadfile($file);
    $q->execute(array(':srcimg' => $srcimg, ':fio' => $fio, ':place' => $place, ':dates' => $date, ':audience' => $audience));
    if ($q) {
        header('location: ../viewtable.php');
    } else {
        return "Произошла ошибка обращения к базе данных";
    }
}


public function delete($id, $nameimg){
$sql="DELETE FROM deadpeople WHERE id=:id";
$q = $this->connect->prepare($sql);
$q->execute(array(':id'=>$id));
if(file_exists($_SERVER['DOCUMENT_ROOT']. "/imgall/deadimg/" . $nameimg){
    unlink($_SERVER['DOCUMENT_ROOT']. "/imgall/deadimg/" . $nameimg);}
else{
    return "Название картинки было изменено, ошибка удаления";
    }
if($q){
header('location: ../viewtable.php');}
else{
   return "Произошла ошибка удаления из базы данных";
}
}
public function checkfile($file){
        if($file['name'] == '')
            return 'Выберете картинку';
        if($file['size'] == 0)
            return 'Картинка очень большая или отсутсвует';
        $getMime = explode('.', $file['name']);
        $mime = strtolower(end($getMime));
        $types = array('jpg', 'png', 'gif', 'bmp', 'jpeg');
        if(!in_array($mime, $types))
            return 'Недопустимый тип файла';

        return 'ок';
}

public function uploadfile($file){
        $name = mt_rand(0, 10000) . $file['name'];
        copy($file['tmp_name'], 'imgall/deadimg/' . $name);
        return $name;
}
public function getplaces(){
    $sql = "select * from places";
    $places = $this->connect->prepare($sql);
    $places->execute();
    $row = $places->fetchALL(PDO::FETCH_ASSOC);
    if($row){
   return $row;}
    else{
        return "Таблица с местами погребения пуста!";
    }
}
}
