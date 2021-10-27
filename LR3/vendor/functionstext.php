<?php
function preparingtext($textunprep){
    $textunprep = preg_replace("#\s?<footer(.*?)>(.*?)</footer>\s?#uism", "", $textunprep);//удаляю только подвал(так как на некоторых страницам мог его не заметить), потому что head по умолчанию уже везде исключён
    $textunprep = spaceformat($textunprep);
    $textunprep = deleteformat($textunprep);
    return $textunprep;
}

function spaceformat($textwspace){
    //$searchspace = array("#(\s?<[^>]*>.*)\- +(.*</[^>]*>\s?)#uis", "#(\s?<[^>]*>.*)\s+:(.*</[^>]*>\s?)#uis", "#(\s?<[^>]*>.*) +\.(.*</[^>]*>\s?)#uis", "#(\s?<[^>]*>.*) +,(.*</[^>]*>\s?)#uis", "#(\s?<[^>]*>.*),(\S)(.*</[^>]*>\s?)#uism", "#(\s?<[^>]*>.*)\.(\S)(.*</[^>]*>\s?)#uis", "#(\s?<[^>]*>.*):(\S)(.*</[^>]*>\s?)#uis");//массив масок
  $searchspace = array("#\s+([\.|,|:|\-]+)#","#([\.|,|:]+)(\S)#","#([\-]+)\s+#");//улучшенный массив масок
    //$replacespace = array("$1-$2", "$1:$2", "$1.$2", "$1,$2", "$1, $2$3", "$1. $2$3", "$1: $2$3");//массив замен
    $replacespace = array("$1","$1 $2","$1");//улучшенный массив замен
    $textwspace = preg_replace($searchspace, $replacespace, $textwspace);
    return $textwspace;
}

function deleteformat($textwspace){
    $searchspace = array('#\s+class\s*=\s*"[^>]+?"#uism','#\s+style\s*=\s*"[^>]+?"#uism','#\s?<style[^>]*?>.*?<\/style>\s?#uism',
        '#(\s?<(strong|b|em|small|big|mark|del|ins|sub|sup|hr|font|blockquote|strike|u|tt|pre|span)[^>mg]*?>\s?)|(\s?</(strong|b|em|small|big|mark|del|ins|sub|sup|hr|font|blockquote|strike|u|tt|pre|span)>\s?)#uism');//массив масок
    $replacespace = array('','','','');//массив замен
    $textwspace = preg_replace($searchspace, $replacespace, $textwspace);
    return $textwspace;
}
function htext($textwspace)
{
    $i = 0;
    $numlist = '<ol class = "ollist">';
    $checktext = preg_match_all('#\s?<h[1-2].*?>.*?</h[1-2]>\s?#', $textwspace,$matches,PREG_SET_ORDER);
    if ($checktext) {
        $checkerh2 = false;
        if(strpos($matches[0][0], "h2")){
            $checkerh2 = true;
        }
        while($matches[$i][0]){
            if (strpos($matches[$i][0], "h1") && $matches[$i + 1][0]) {
                $numlist = $numlist . '<li class = "lilist">';
                if (!strpos($matches[$i + 1][0], "h1")) {
                    $numlist = $numlist . $matches[$i][0] . '<ol class="ollist">';
                } else {
                    $numlist = $numlist . $matches[$i][0] . '</li>';
                }
            } elseif (strpos($matches[$i][0], "h2") && $matches[$i + 1][0]) {
                $numlist = $numlist . '<li class = "lilist">';
                if (!strpos($matches[$i + 1][0], "h2")&&$checkerh2==false) {
                    $numlist = $numlist . $matches[$i][0] . '</li></ol></li>';
                }elseif(!strpos($matches[$i + 1][0], "h2")&&$checkerh2==true){
                    $numlist = $numlist . $matches[$i][0] . '</li></ol><ol class = "ollist">';
                    $checkerh2 == false;
                }
                else {
                    $numlist = $numlist . $matches[$i][0] . '</li>';
                }
            }
            elseif(!$matches[1][0]){
                $numlist = $numlist . '<li class = "lilist">'. $matches[0][0].'</li></ol>';}
            elseif(strpos($matches[$i][0], "h2") && !$matches[$i + 1][0] && $checkerh2 == false){
                $numlist = $numlist .'<li class = "lilist">'.$matches[$i][0].'</li></ol></li></ol>';
            }
            elseif(strpos($matches[$i][0], "h2") && !$matches[$i + 1][0] && $checkerh2 == true){
                $numlist = $numlist .'<li class = "lilist">'.$matches[$i][0].'</li></ol>';
            }
            elseif(strpos($matches[$i][0], "h1") && !$matches[$i + 1][0]){
                $numlist = $numlist .'<li class = "lilist">'.$matches[$i][0].'</li></ol>';
            }
            $i++;
        }
        return $numlist;
    } else {
        return 0;
    }
}

function cleanandmakelinktable($textwspace){
    $i = 0;
    $numtext = preg_match_all('#<table[^>]*>.*?<tr[^>]*?>\s?<(td|th)[^>]*?>.*?</(td|th)>\s?#uism',$textwspace,$matches,PREG_SET_ORDER);
    $rawtext = " ";
    if($numtext){
        while($i<=$numtext&&$matches[$i][0]){
            $rawtext = $rawtext. $matches[$i][0];
            $i++;
        }}
    preg_match_all("#\s?<(td|th)[^>]*?>(.*?)</(td|th)>\s?#uism", $rawtext, $arraythtd);
    $countsid = 0;
    for($j = 0;$j<count($arraythtd[0]);$j++){
        $countsid++;
        $linklist .= '<li><a href = "#yakor'.$countsid.'">'.'Таблица '.$countsid.' : '. $arraythtd[2][$j].'</a></li>';
        $textwspace = str_replace($arraythtd[0][$j],'<'.$arraythtd[1][$j].' id = "yakor'.$countsid.'">'.$arraythtd[2][$j].'</'.$arraythtd[1][$j].'>',$textwspace);
    }
    $linklist = '<ul>'.$linklist.'</ul>';
    return [$linklist, $textwspace];
}
