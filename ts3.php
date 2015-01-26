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
//var_dump($sql);
//while ($row = mysqli_fetch_assoc($sql_region_ip)) {


//echo "<tr><td>".$row['name']."</td><td>".$row['last_time_login']."</td><td>".$row['last_ip_login']."</td><td>".$row['last_server']."</td><td>".$row['timestamp']."</td><td>".($row['last_time_login'] ? '<font color="#0000FF"><b>Активен</b></font>' : '<font color="#FF0000"><b>Не активен</b></font>')."</td></tr>";
//echo "<tr><td>".$row['name']."</td><td>".($row['client_lastconnected'] ? '<font color="#0000FF"><b>Активен</b></font>' : '<font color="#FF0000"><b>Не активен</b></font>')."</td><td>".date('d M Y в H ч. i мин. s сек.' ,$row['timestamp'])."</td><td><form name=\"delete\" method=\"post\" action=\"index3.php\"></td></tr>";
//echo "<tr><td>".$row['client_nickname']."</td><td>".$row['client_totalconnections']."</td><td>".$row['client_lastip']."</td><td>".date('d M Y в H ч. i мин. s сек.' ,$row['client_lastconnected'])."</td></tr>";
echo "<table cellspacing='1' align='center' width='600' class='listtable'>
<tr>
<td width='3%' class='listtable_top'></td>
<td width='40%' class='listtable_top'><font color='#FFFFFF' size='2'><b>Имя</b></font></td>
<td width='25%' class='listtable_top'><font color='#FFFFFF' size='2'><b>IP</b></font></td>
<td width='30%' class='listtable_top'><font color='#FFFFFF' size='2'><b>Вход</b></font></td>
<td width='10%' class='listtable_top'><font color='#FFFFFF' size='2'><b>Дата</b></font></td>
<td width='10%' class='listtable_top'><font color='#FFFFFF' size='2'><b>Время</b></font></td>
</tr>";

while ($row = mysqli_fetch_assoc($sql_region_ip)) {

echo "<tr>
    	
	<td class='listtable_1' border='0' align='left'><font color='#8b0000'><b>".$row['client_nickname']."</b></font></td>
	<td class='listtable_1' border='0' align='left'><font color='#8b0000'><b>".$row['client_lastip']."</b></font></td>
	<td class='listtable_1' border='0' align='left'>".date('d.m.Y' ,$row['client_lastconnected'])."</td>
	<td class='listtable_1' border='0' align='left'>".date('H:i:s' ,$row['client_lastconnected'])."</td>
	</tr>";
	//$i=1-$i;
	//var_dump($row[id]);
//die;
//}
echo "</table><br><br>";

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
