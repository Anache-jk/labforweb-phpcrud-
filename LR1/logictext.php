<?php
error_reporting(E_ERROR | E_PARSE);
require_once 'functionstext.php';
$text = $_POST['textcheck'];
$path1 = 'wikirinhi.html';
$path2 = 'winnipuf.html';
$path3 = 'ukarainedialog.html';
$wikitext = file_get_contents($path1);
$winnitext = file_get_contents($path2);
$ukrainetext = file_get_contents($path3);

if(isset($_POST['submit'])) {
        $text2 = $text;
        $text2 = preparingtext($text2);
        $contentfromtext = htext($text2);
        [$linklist, $text2] = cleanandmakelinktable($text2);
}
