<?php
try {
    $connection = new PDO("mysql:host=localhost;dbname=funeraldb;charset=utf8", "root", '');
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo $e->getMessage();
}
$query = "select deadpeople.imgsource, deadpeople.firstsecondthird_name,deadpeople.date_and_time,deadpeople.num_audience, places.name
        from deadpeople
        inner join places on deadpeople.id_place = places.id ";
global $people, $places;

$nameofplace = "";
$secondname = 0;
 $audience = 0;
$binds = [];
$nameofplace = (int)$_GET['nameofplace'];
$nameofplace = htmlspecialchars($nameofplace);
$secondname = $_GET['secondname'];
$secondname = htmlspecialchars($secondname);
$audience = (int)$_GET['num_audience'];
$audience = htmlspecialchars($audience);
$flag = false;

if(!key_exists('clearfilter', $_GET)){
    if (count($_GET)>0 && ($secondname !=""||$nameofplace!=0||$audience!=0)) {
        $query .= " WHERE ";
        if ($nameofplace) {
            $query .= "deadpeople.id_place = :nameofplace";
            $binds['nameofplace'] = $nameofplace;
            $flag = true;
        }
        if ($secondname) {
            if ($flag) {
                $query .= " AND deadpeople.firstsecondthird_name LIKE %:secondname%";
               $binds['secondname'] = $secondname;
            } else {
                $query .= "deadpeople.firstsecondthird_name LIKE %:secondname%";
                $binds['secondname'] = $secondname;
                $flag = true;
            }
        }
        if ($audience) {
            if ($flag) {
                $query .= " AND deadpeople.num_audience = :audience";
                $binds['audience'] = $audience;
            } else {
                $query .= "deadpeople.num_audience = :audience";
                $binds['audience'] = $audience;
                $flag = true;
            }
        }
    }
}
$sql = "select * from places";
$places = $connection->query($sql);
$people = $connection->prepare($query);
$people->execute($binds);









