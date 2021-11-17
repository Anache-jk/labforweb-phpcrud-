<?php
require_once 'logicexport.php';

header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header("Content-Disposition: attachment; filename=deadpeople_exported.json");
header('Content-Transfer-Encoding: binary');
header('Connection: Keep-Alive');
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Pragma: public');
header('Content-Length: ' . filesize('C:/OpenServer/domains/LR5/impex/deadpeople_exported.json'));
readfile('C:/OpenServer/domains/LR5/impex/deadpeople_exported.json');