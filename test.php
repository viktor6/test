<html>
<head>
<meta charset="utf-8" />
    <title>Example</title>
</head>
<body>
</html>


<?php

//*********************************************************        ewoks      ***********************************************************************************
$file=file_get_contents('http://api.worldoftanks.ru/wot/clan/info/?application_id=demo&fields=abbreviation,members.account_name,members.role&clan_id=73823');
$strk = str_replace("\"", "", $file);
$strv = str_replace("abbreviation:", "*", $strk);
$strr = str_replace("role:", "#", $strv);
$strn = str_replace(",account_name:", "$", $strr);
$strc = str_replace("recruiter", "verbovshik", $strn);
$strl = str_replace("vice_leader", "miniking", $strc);
$strs = str_replace("}}}}}", "}", $strl);
$obra = end(explode('*', $strs));
$obrb = explode(",", $obra);
$teg = $obrb[0];
$kol = count($obrb);
$mas = array('0'=> array('0'=>'NIK','1'=>'ZVANIE','2'=>'CLAN'));
for ($k = 1; $k < $kol; $k++)
  {
$b = end(explode('#', $obrb[$k]));
$c = explode("$", $b);
$d=substr($c[1], 0, strlen($c[1])-1);
$mas = $mas + array($k=>array('0'=>$d,'1'=>$c[0],'2'=>$teg));
  }
$v=$k;
//*********************************************************        ew0ks      ***********************************************************************************
$file=file_get_contents('http://api.worldoftanks.ru/wot/clan/info/?application_id=demo&fields=abbreviation,members.account_name,members.role&clan_id=74310');
$strk = str_replace("\"", "", $file);
$strv = str_replace("abbreviation:", "*", $strk);
$strr = str_replace("role:", "#", $strv);
$strn = str_replace(",account_name:", "$", $strr);
$strc = str_replace("recruiter", "verbovshik", $strn);
$strl = str_replace("vice_leader", "miniking", $strc);
$strs = str_replace("}}}}}", "}", $strl);
$obra = end(explode('*', $strs));
$obrb = explode(",", $obra);
$teg = $obrb[0];
$kol = count($obrb);
for ($k = 1; $k < $kol; $k++)
  {
$b = end(explode('#', $obrb[$k]));
$c = explode("$", $b);
$d=substr($c[1], 0, strlen($c[1])-1);
$mas = $mas + array($k+$v=>array('0'=>$d,'1'=>$c[0],'2'=>$teg));
  }
$v=$v+$k;
//*********************************************************        ewoki      ***********************************************************************************
$file=file_get_contents('http://api.worldoftanks.ru/wot/clan/info/?application_id=demo&fields=abbreviation,members.account_name,members.role&clan_id=85398');
$strk = str_replace("\"", "", $file);
$strv = str_replace("abbreviation:", "*", $strk);
$strr = str_replace("role:", "#", $strv);
$strn = str_replace(",account_name:", "$", $strr);
$strc = str_replace("recruiter", "verbovshik", $strn);
$strl = str_replace("vice_leader", "miniking", $strc);
$strs = str_replace("}}}}}", "}", $strl);
$obra = end(explode('*', $strs));
$obrb = explode(",", $obra);
$teg = $obrb[0];
$kol = count($obrb);
for ($k = 1; $k < $kol; $k++)
  {
$b = end(explode('#', $obrb[$k]));
$c = explode("$", $b);
$d=substr($c[1], 0, strlen($c[1])-1);
$mas = $mas + array($k+$v=>array('0'=>$d,'1'=>$c[0],'2'=>$teg));
  }
$v=$v+$k;
//*********************************************************        ew0ki      ***********************************************************************************
$file=file_get_contents('http://api.worldoftanks.ru/wot/clan/info/?application_id=demo&fields=abbreviation,members.account_name,members.role&clan_id=117207');
$strk = str_replace("\"", "", $file);
$strv = str_replace("abbreviation:", "*", $strk);
$strr = str_replace("role:", "#", $strv);
$strn = str_replace(",account_name:", "$", $strr);
$strc = str_replace("recruiter", "verbovshik", $strn);
$strl = str_replace("vice_leader", "miniking", $strc);
$strs = str_replace("}}}}}", "}", $strl);
$obra = end(explode('*', $strs));
$obrb = explode(",", $obra);
$teg = $obrb[0];
$kol = count($obrb);
for ($k = 1; $k < $kol; $k++)
  {
$b = end(explode('#', $obrb[$k]));
$c = explode("$", $b);
$d=substr($c[1], 0, strlen($c[1])-1);
$mas = $mas + array($k+$v=>array('0'=>$d,'1'=>$c[0],'2'=>$teg));
  }
$v=$v+$k;
//*********************************************************        ewoky      ***********************************************************************************
/* $file=file_get_contents('http://api.worldoftanks.ru/wot/clan/info/?application_id=demo&fields=abbreviation,members.account_name,members.role&clan_id=115101');
$strk = str_replace("\"", "", $file);
$strv = str_replace("abbreviation:", "*", $strk);
$strr = str_replace("role:", "#", $strv);
$strn = str_replace(",account_name:", "$", $strr);
$strc = str_replace("recruiter", "verbovshik", $strn);
$strl = str_replace("vice_leader", "miniking", $strc);
$strs = str_replace("}}}}}", "}", $strl);
$obra = end(explode('*', $strs));
$obrb = explode(",", $obra);
$teg = $obrb[0];
$kol = count($obrb);
for ($k = 1; $k < $kol; $k++)
  {
$b = end(explode('#', $obrb[$k]));
$c = explode("$", $b);
$d=substr($c[1], 0, strlen($c[1])-1);
$mas = $mas + array($k+$v=>array('0'=>$d,'1'=>$c[0],'2'=>$teg));
  }
$v=$v+$k; */
//*********************************************************        ew0ky      ***********************************************************************************
$file=file_get_contents('http://api.worldoftanks.ru/wot/clan/info/?application_id=demo&fields=abbreviation,members.account_name,members.role&clan_id=107757');
$strk = str_replace("\"", "", $file);
$strv = str_replace("abbreviation:", "*", $strk);
$strr = str_replace("role:", "#", $strv);
$strn = str_replace(",account_name:", "$", $strr);
$strc = str_replace("recruiter", "verbovshik", $strn);
$strl = str_replace("vice_leader", "miniking", $strc);
$strs = str_replace("}}}}}", "}", $strl);
$obra = end(explode('*', $strs));
$obrb = explode(",", $obra);
$teg = $obrb[0];
$kol = count($obrb);
for ($k = 1; $k < $kol; $k++)
  {
$b = end(explode('#', $obrb[$k]));
$c = explode("$", $b);
$d=substr($c[1], 0, strlen($c[1])-1);
$mas = $mas + array($k+$v=>array('0'=>$d,'1'=>$c[0],'2'=>$teg));
  }
$v=$v+$k;
//*********************************************************        ewok5      ***********************************************************************************
$file=file_get_contents('http://api.worldoftanks.ru/wot/clan/info/?application_id=demo&fields=abbreviation,members.account_name,members.role&clan_id=182537');
$strk = str_replace("\"", "", $file);
$strv = str_replace("abbreviation:", "*", $strk);
$strr = str_replace("role:", "#", $strv);
$strn = str_replace(",account_name:", "$", $strr);
$strc = str_replace("recruiter", "verbovshik", $strn);
$strl = str_replace("vice_leader", "miniking", $strc);
$strs = str_replace("}}}}}", "}", $strl);
$obra = end(explode('*', $strs));
$obrb = explode(",", $obra);
$teg = $obrb[0];
$kol = count($obrb);
for ($k = 1; $k < $kol; $k++)
  {
$b = end(explode('#', $obrb[$k]));
$c = explode("$", $b);
$d=substr($c[1], 0, strlen($c[1])-1);
$mas = $mas + array($k+$v=>array('0'=>$d,'1'=>$c[0],'2'=>$teg));
  }
$v=$v+$k;
//*********************************************************        ewokc      ***********************************************************************************
$file=file_get_contents('http://api.worldoftanks.ru/wot/clan/info/?application_id=demo&fields=abbreviation,members.account_name,members.role&clan_id=122268');
$strk = str_replace("\"", "", $file);
$strv = str_replace("abbreviation:", "*", $strk);
$strr = str_replace("role:", "#", $strv);
$strn = str_replace(",account_name:", "$", $strr);
$strc = str_replace("recruiter", "verbovshik", $strn);
$strl = str_replace("vice_leader", "miniking", $strc);
$strs = str_replace("}}}}}", "}", $strl);
$obra = end(explode('*', $strs));
$obrb = explode(",", $obra);
$teg = $obrb[0];
$kol = count($obrb);
for ($k = 1; $k < $kol; $k++)
  {
$b = end(explode('#', $obrb[$k]));
$c = explode("$", $b);
$d=substr($c[1], 0, strlen($c[1])-1);
$mas = $mas + array($k+$v=>array('0'=>$d,'1'=>$c[0],'2'=>$teg));
  }
$v=$v+$k;


$link = mysql_connect('localhost', 'test', '123456789') //Данные для подключения к базе форума
    or die('Не удалось соединиться: ' . mysql_error());
mysql_select_db('xenforo') or die('Не удалось выбрать базу данных');
//Обнуляем поля Звание и Племя
$zv="";
$pl="";

mysql_free_result($resultdate);
//Делаем запрос Ников и ID
$query = 'SELECT username, secondary_group_ids, user_group_id, user_id FROM xf_user';
$result = mysql_query($query) or die('Запрос не удался: ' . mysql_error());
//Цикл по всей выборке
while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
//    $u=0;
    $q=0;
    $qdov = 0;
    $mnik = "";
    $mzva = "";
    $mple = "";
    $nple = "";
    $nzva = "";
    foreach ($line as $col_value) {
//Помещаем в переменные значения полей
        if ($q == 0) {
        $qnik = $col_value;
        }
        if ($q == 1) {
        $qsgr = $col_value;
        }
        if ($q == 2) {
        $qgr = $col_value;
                if ($qgr == '13') { //Доверенные
                    $qdov = 1;
                }
                if ($qgr == '5') { //Ушедшие в другие леса (вышедшие)
                    $qdov = 1;
                }
        }
        if ($q == 3) {
        $qid = $col_value;
        }
        $q++;
      }  
//Сравнение полученных данных с массивом актуальных игроков
    for ($mi = 0; $mi < $v; $mi++) {
        if ($qnik == $mas[$mi][0]) {
            $mnik = $mas[$mi][0];
            $mzva = $mas[$mi][1];
            $mple = $mas[$mi][2];          
        }
  
    }
//Меняем названия на ID групп
//Племена
switch ($mple) {
case "EWOKS":
    $nple = 6;
    break;
case "EW0KS":
    $nple = 7;
    break;
case "EWOKI":
    $nple = 8;
    break;
case "EW0KY":
   $nple = 9;
    break;
case "EWOK5":
    $nple = 12;
    break;
case "EWOKC":
   $nple = 13;
    break;  
//default:
//    $nple = 2;
}
//Звания
switch ($mzva) {
case "reservist":
    $nzva = 10;
    break;
case "recruit":
    $nzva = 11;
    break;
case "private":
    $nzva = 17;
    break;
case "junior_officer":
   $nzva = 27;
    break;
case "diplomat":
    $nzva = 21;
    break;
case "verbovshik":
   $nzva = 19;
    break;  
case "treasurer":
    $nzva = 28;
    break;
case "commander":
    $nzva = 20;
    break;
case "personnel_officer":
   $nzva = 35;
    break;
case "miniking":
    $nzva = 33;
    break;  
case "leader":
    $nzva = 8;
    break;      
}  
//Создаем массив дополнительных групп
$msgr = explode(",", $qsgr); //Массив дополнительных групп
//создаем массив званий
$uzva = array("34", "16", "17", "27", "21", "19", "28", "20", "35", "33", "8"); //Массив званий
//Получаем текущее звание и строку дополнительных групп без звания
$dsgr = ""; //Строка дополнительных групп
$tzva = ""; //Текущее звание на форуме



for ($o = 0; $o < count($msgr); $o++) {
    for ($y=0; $y <= count($uzva); $y++) {
        if ($msgr[$o] ==  $uzva[$y])   {
            $tzva = $msgr[$o];
        }
    }
  
         if ($msgr[$o] <>  $tzva)  {
            $dsgr = $msgr[$o].",".$dsgr;
        }
      

  
}
//Убираем Двойные и последнюю запятые
$kzap_perv = "kill,".$dsgr;
$kzap_vtor = str_replace(",,", ",", $kzap_perv);
$kzap_tret = str_replace("kill,", "", $kzap_vtor);
$kzap_chet = substr($kzap_tret, 0, strlen($kzap_tret)-1);
$dsgr = $kzap_chet;

if ($tzva <> "") {
$rsgr = $tzva.','.$dsgr;
}
Else {
$rsgr = $dsgr;
}
if ($nzva <> "") {
if ($dsgr <> "") {
$tsgr = $nzva.','.$dsgr;
} else {
$tsgr = $nzva;
}
}
Else {
$tsgr = $dsgr;
}

//Звание и группа

//отсеиваем группы по $dov == 1
    if ($qdov == 0) {
        if ($qgr <> 2) {
            if ($mple == "") {
                //Если племя пустое, то ставим ушедшие в другие леса, убираем должность  
                $querydate = "UPDATE xf_user SET user_group_id='5', secondary_group_ids='' WHERE user_id='$qid'";
                $resultdate = mysql_query($querydate) or die('Запрос не удался: ' . mysql_error());      
                echo 'Nik - '.$qnik.' NikWOT - '.$mnik.' Осн.гр - '.$qgr.' Племя - '.$nple.' Звание wot - '.$nzva.' Звание фор'.$tzva.' Ушедшие...';
                echo '</br>';
            }
            elseif ($qgr <> $nple) {
                //Если основная группа <> племени, то - меняем основную группу  
                $querydate = "UPDATE xf_user SET user_group_id='$nple' WHERE user_id='$qid'";
                $resultdate = mysql_query($querydate) or die('Запрос не удался: ' . mysql_error());          
                echo 'Nik - '.$qnik.' NikWOT - '.$mnik.' Осн.гр - '.$qgr.' Племя - '.$nple.' Звание wot - '.$nzva.' Звание фор'.$tzva.' Меняем осн гр...';
                echo '</br>';              
            }
            if ($tzva <> $nzva) {
                //Если доп группа <> званию = меняем звание
                $querydate = "UPDATE xf_user SET secondary_group_ids='$tsgr' WHERE user_id='$qid'";
                $resultdate = mysql_query($querydate) or die('Запрос не удался: ' . mysql_error());          
                echo 'Nik - '.$qnik.' NikWOT - '.$mnik.' Осн.гр - '.$qgr.' Племя - '.$nple.' Звание wot - '.$nzva.' Звание фор - '.$tzva.' Рез доп гр - '.$tsgr.' Меняем звание...';
                echo '</br>';              
            }
        }
        else {
            if ($mple <> "") {
                $querydate = "UPDATE xf_user SET user_group_id='$nple', secondary_group_ids='$tsgr' WHERE user_id='$qid'";
                $resultdate = mysql_query($querydate) or die('Запрос не удался: ' . mysql_error());  
                echo 'Nik - '.$qnik.' NikWOT - '.$mnik.' Осн.гр - '.$qgr.' Племя - '.$nple.' Звание wot - '.$nzva.' Звание фор - '.$tzva.' Рез доп гр - '.$tsgr.' НАзначаем пл и зв...';
                echo '</br>';              
            }
        }
    }
}

echo '########################################################################################################################################';
    echo '<br />';
for ($i = 0; $i < $v; $i++)
  { echo $i;
    for ($j=0; $j <3; $j++)
    {
       echo ' | '.$mas[$i][$j];
    }
    echo '<br />';
  }

mysql_free_result($result);

// Закрываем соединение
mysql_close($link);
//echo 'Соединение отключено';

?>