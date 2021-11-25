<?php
require_once 'connect.php';
require_once 'worker.php';
$exporturl ='http://localhost/LR5/vendor/worker.php';
$uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/impex/';
$url = $_SERVER['DOCUMENT_ROOT'] .'/impex/deadpeople_exported.json';
if(isset($_POST['export'])&&$_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "select * from `deadpeople`";
    $data = $connection->prepare($sql);
    $data->execute();
    $data = $data->fetchALL(PDO::FETCH_ASSOC);
    $exportDB = json_encode($data, JSON_UNESCAPED_UNICODE);
    if(!$exportDB){
        $errors = "Таблица не существует или произошла ошибка чтения и кодирования данных из БД";
    }
    if(!file_exists($url)){
        $fd = fopen($url, 'x');
        fwrite($fd, $exportDB);
        fclose($fd);}

    $file = $url;
    $mime = mime_content_type($file);
    $info = pathinfo($file);
    $name = $info['deadpeople_exported.json'];
    $output = new CURLFile($file, $mime, $name);
    $data = array("file"=>$output, "data"=>'{"title":"Test"}');

    $request = curl_init();
    curl_setopt($request, CURLOPT_URL, $exporturl);
    curl_setopt($request, CURLOPT_POST,1);
    curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($request, CURLOPT_POSTFIELDS, $data);
    $response = curl_exec($request);
    curl_close ($request);
}

