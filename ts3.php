<?php 

    $myhost = 'localhost';
    $myuser = 'test';
    $mypassw = '123456789';
    $mybd = 'teamspeak';
    $link = mysqli_connect($myhost,$myuser,$mypassw,$mybd)
            or die("Ошибка  : " . mysqli_connect_error()); 
  

    $sql = 'SELECT * FROM `clients`';
    $sql_region_ip = mysqli_query($link, $sql);
     //while($line = mysqli_fetch_assoc($q))
var_dump($sql);
while ($row = mysqli_fetch_assoc($sql_region_ip)) {


//echo "<tr><td>".$row['name']."</td><td>".$row['last_time_login']."</td><td>".$row['last_ip_login']."</td><td>".$row['last_server']."</td><td>".$row['timestamp']."</td><td>".($row['last_time_login'] ? '<font color="#0000FF"><b>Активен</b></font>' : '<font color="#FF0000"><b>Не активен</b></font>')."</td></tr>";
echo "<tr><td>".$row['name']."</td><td>".($row['client_lastconnected'] ? '<font color="#0000FF"><b>Активен</b></font>' : '<font color="#FF0000"><b>Не активен</b></font>')."</td><td>".date('d M Y в H ч. i мин. s сек.' ,$row['timestamp'])."</td><td><form name=\"delete\" method=\"post\" action=\"index3.php\"></td></tr>";
}

//var_dump($sql_region_ip); 
//$color[0]='#e0e0e0';
//$color[1]='#eeeeee';
//$i=0;





?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Терминал :: CS - регистрация ника</title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
