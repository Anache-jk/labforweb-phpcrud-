<?php
function preparingtext($textunprep){
    $textunprep = preg_replace("#\s?<footer(.*?)>(.*?)</footer>\s?#uism", "", $textunprep);//удаляю только подвал(так как на некоторых страницам мог его не заметить), потому что head по умолчанию уже везде исключён
    $textunprep = spaceformat($textunprep);
    $textunprep = deleteformat($textunprep);
    return $textunprep;
}

function spaceformat($textwspace){
  $searchspace = array("#\s+([\.,:\-]+)#","#([\.,:]+)(\S)#","#(кое|сколько|чей|кто|что|кому|какой|какому|по|в|во|где|всё|чуть|мало|зачем|откуда|почему|наконец|опять|так|точь|в|вот|просто)(\-)\s+#uism");//улучшенный массив масок
    $replacespace = array("$1","$1 $2","$1$2");//улучшенный массив замен
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
    $checktext = preg_match_all('#\s?<h[12][^>]*>(.*?)</h[12][^>]*>\s?#', $textwspace,$matches,PREG_SET_ORDER);
    if ($checktext) {
        $checkerh2 = false;
        if(strpos($matches[0][0], "h2")){
            $checkerh2 = true;
        }
        while($matches[$i][0]){
            if (strpos($matches[$i][0], "h1") && $matches[$i + 1][0]) {
                $numlist = $numlist . '<li class = "lilist">';
                if (!strpos($matches[$i + 1][0], "h1")) {
                    $numlist = $numlist . $matches[$i][1] . '<ol class="ollist">';
                } else {
                    $numlist = $numlist . $matches[$i][1] . '</li>';
                }
            } elseif (strpos($matches[$i][0], "h2") && $matches[$i + 1][0]) {
                $numlist = $numlist . '<li class = "lilist">';
                if (!strpos($matches[$i + 1][0], "h2")&&$checkerh2==false) {
                    $numlist = $numlist . $matches[$i][1] . '</li></ol></li>';
                }elseif(!strpos($matches[$i + 1][0], "h2")&&$checkerh2==true){
                    $numlist = $numlist . $matches[$i][1] . '</li></ol><ol class = "ollist">';
                    $checkerh2 == false;
                }
                else {
                    $numlist = $numlist . $matches[$i][1] . '</li>';
                }
            }
            elseif(!$matches[1][0]){
                $numlist = $numlist . '<li class = "lilist">'. $matches[0][1].'</li></ol>';}
            elseif(strpos($matches[$i][0], "h2") && !$matches[$i + 1][0] && $checkerh2 == false){
                $numlist = $numlist .'<li class = "lilist">'.$matches[$i][1].'</li></ol></li></ol>';
            }
            elseif(strpos($matches[$i][0], "h2") && !$matches[$i + 1][0] && $checkerh2 == true){
                $numlist = $numlist .'<li class = "lilist">'.$matches[$i][1].'</li></ol>';
            }
            elseif(strpos($matches[$i][0], "h1") && !$matches[$i + 1][0]){
                $numlist = $numlist .'<li class = "lilist">'.$matches[$i][1].'</li></ol>';
            }
            $i++;
        }
        return $numlist;
    } else {
        return 0;
    }
}

function cleanandmakelinktable($textwspace){
    $numthtd = preg_match_all('#(<table[^>]*>.*?)<(td|th)[^>]*?>(.*?)</(td|th)[^>]*?>#uism',$textwspace,$matches);
    $countsid = 0;
    for($j = 0;$j<$numthtd;$j++){
        $countsid++;
        $linklist .= '<li><a href = "#yakor'.$countsid.'">'.'Таблица '.$countsid.' : '.$matches[3][$j].'</a></li>';
        $textwspace = str_replace($matches[0][$j],$matches[1][$j].'<'.$matches[2][$j].' id = "yakor'.$countsid.'">'.$matches[3][$j].'</'.$matches[2][$j].'>',$textwspace);
    }
    $linklist = '<ul>'.$linklist.'</ul>';
    return [$linklist, $textwspace];
}
