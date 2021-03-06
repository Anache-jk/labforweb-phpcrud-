<?php
require_once 'connect.php';

$salt = "dfighd@i75.543gtfh/";
$file = $_FILES['filejson'];
$uploaddir= $_SERVER['DOCUMENT_ROOT']. '/impex/';
if(isset($_POST['import'])&&$_SERVER["REQUEST_METHOD"] == "POST"){
    $checkrows = 0;
    if($_FILES['filejson']['type']!='application/json'||!$_FILES['filejson']){
        $errors = 'Неверный тип файла или файл отсутствует';
    }else{
        //таблица создаётся, только если такой не существует
    $sql = "CREATE TABLE IF NOT EXISTS deadpeople_imported 
(id int(11) NOT NULL primary key AUTO_INCREMENT,
  imgsource varchar(45) DEFAULT 'imgnotfound.png',
  firstsecondthird_name text ,
  id_place int(11) ,
  date_and_time text ,
  num_audience int(11),
  guid VARCHAR(255)
)";
    $connection->query($sql);
    $new_name = $uploaddir . md5($_FILES['filejson']['tmp_name']);
    move_uploaded_file($_FILES['filejson']['tmp_name'], $new_name);
    $handle = fopen($new_name, 'r');
    $content = fread($handle, filesize($new_name));

    $newcontent = json_decode($content, true);
    fclose($handle);
        $guid = $connection->prepare("SELECT GUID FROM deadpeople_imported");
        $guid->execute();
        $guid = $guid->fetchALL(PDO::FETCH_ASSOC);
        $stmt = $connection->prepare("INSERT INTO `deadpeople_imported` (imgsource, firstsecondthird_name, id_place,date_and_time,num_audience, guid) VALUES (?,?,?,?,?,?)");
        $connection->beginTransaction();//открытие транзакции, в ходе которой можно произвести несколько вставок данных
        //проверяем на пустоту данных и совпадение guid с уже имеющимися в таблице
        foreach($newcontent as $data){
            $check = 0;
            for($i = 0;$i<count($guid);$i++){
                if(md5(htmlspecialchars($data['imgsource']).
                        htmlspecialchars($data['firstsecondthird_name']).
                    htmlspecialchars($data['id_place']).
                        htmlspecialchars($data['date_and_time']).
                    htmlspecialchars($data['num_audience']).$salt) == $guid[$i]["GUID"]||
                    !htmlspecialchars($data['imgsource'])||
                        !htmlspecialchars($data['firstsecondthird_name'])||
                        !htmlspecialchars($data['id_place'])||
                        !htmlspecialchars($data['date_and_time'])||
                        !htmlspecialchars($data['num_audience'])){
                    $check++;
                }
            }
//заполняем таблицу новыми записями
            if($check == 0){
            $stmt->execute(array(htmlspecialchars($data['imgsource']),
                htmlspecialchars($data['firstsecondthird_name']),
                htmlspecialchars($data['id_place']),
                htmlspecialchars($data['date_and_time']),
                htmlspecialchars($data['num_audience']),
                md5(htmlspecialchars($data['imgsource']).
                    htmlspecialchars($data['firstsecondthird_name']).
                    htmlspecialchars($data['id_place']).
                    htmlspecialchars($data['date_and_time']).
                    htmlspecialchars($data['num_audience']).$salt)));
                $checkrows++;
            }
        }
        $connection->commit();//завершаем транзакцию
        $importDB = count($guid) + $checkrows;//считаем количество всех строк до вставки + новые строки данных
        unlink($new_name);
    }
}