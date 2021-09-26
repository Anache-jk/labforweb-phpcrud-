<?php
$connect = mysqli_connect('127.0.0.1','root', '', 'funeraldb');
error_reporting(E_ERROR | E_PARSE);
if(!$connect){
    echo 'EROOOOOOOOOOOOOOOOOOOOR';
}
$query = "select deadpeople.imgsource, deadpeople.firstsecondthird_name,deadpeople.date_and_time,deadpeople.num_audience, place.name
        from deadpeople
        inner join place on deadpeople.id_earth = place.id ";
global $people;
$people = mysqli_query($connect,$query);
$people = mysqli_fetch_all($people);

$nameofplace = $_GET['nameofplace'];
$secondname = $_GET['secondname'];
$audience = (int)$_GET['num_audience'];
$clearfilters = $_GET['clearfilter'];
$nameofplace = mysqli_real_escape_string( $connect,  $nameofplace);
$secondname = mysqli_real_escape_string( $connect,  $secondname);
$clearfilters = mysqli_real_escape_string( $connect,  $clearfilters);
$flag = false;

if(!$clearfilters) {
    if (count($_GET) > 0) {
        $query .= " WHERE ";
        if ($nameofplace) {
            $query .= "deadpeople.id_earth = " . $nameofplace;
            $people = mysqli_query($connect, $query);
            $people = mysqli_fetch_all($people);
            $flag = true;
        }
        if ($secondname) {
            if ($flag) {
                $query .= " AND deadpeople.firstsecondthird_name LIKE '%" . $secondname . "%'";
                $people = mysqli_query($connect, $query);
                $people = mysqli_fetch_all($people);
            } else {
                $query .= "deadpeople.firstsecondthird_name LIKE '%" . $secondname . "%'";
                $people = mysqli_query($connect, $query);
                $people = mysqli_fetch_all($people);
                $flag = true;
            }
        }
        if ($audience) {
            if ($flag) {
                $query .= " AND deadpeople.num_audience = " . $audience;
                $people = mysqli_query($connect, $query);
                $people = mysqli_fetch_all($people);
            } else {
                $query .= "deadpeople.num_audience = " . $audience;
                $people = mysqli_query($connect, $query);
                $people = mysqli_fetch_all($people);
                $flag = true;
            }
        }
    }
}




