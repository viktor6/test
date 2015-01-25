<?php 

$myhost = 'localhost';
    $myuser = 'test';
    $mypassw = '123456789';
    $mybd = 'teamspeak';
    $link = mysqli_connect($myhost,$myuser,$mypassw,$mybd)
            or die("Ошибка  : " . mysqli_connect_error()); 
  $sql = "SELECT * FROM `clients` LIMIT 0, 30 ";
    $q = mysqli_query($link, $sql);
     while($line = mysqli_fetch_assoc($q))
$color[0]='#e0e0e0';
$color[1]='#eeeeee';
$i=0;

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Регистрация ника =Plusnet=</title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="" />
<meta name="Description" content="" />
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="cache-control" content="no-cache" />

</HEAD>

<body>
<div id='container'>
<table border='0' cellpadding='0' cellspacing='0' width=100%>
     <tr>
          <td background='../images/header-bg.png' align='left'><p align='center'><a href='/namereg'><img src='../images/header-logo.jpg' border='0'></a></td>
     </tr>
</table>
<div id='header-menu'>
<ul>
     <li class="first"><a href="/"style="text-decoration:;">На главную</a></li>

     <li><a href="/forum/index.php?s=&showtopic=978"style="text-decoration;">Обсудить на форуме</a></li>
     <li><a href="http://stats.cs.datasvit.ks.ua/">Статистика игроков</a></li>
    <li><a href="http://ban.cs.datasvit.ks.ua">Бан лист</a></li>
	
</ul>
</div>

<br><br><center>
<div id="page-title">
		<div class="inner">
		<h1>Удаление зарегестрированных ников</h1>
		</div>
	</div>



<?php
echo "<table cellspacing='1' align='center' width='600' class='listtable'>
<tr>
<td width='3%' class='listtable_top'></td>
<td width='40%' class='listtable_top'><font color='#FFFFFF' size='2'><b>Имя</b></font></td>
<td width='25%' class='listtable_top'><font color='#FFFFFF' size='2'><b>IP</b></font></td>
<td width='30%' class='listtable_top'><font color='#FFFFFF' size='2'><b>Вход</b></font></td>
<td width='10%' class='listtable_top'><font color='#FFFFFF' size='2'><b>Дата</b></font></td>
<td width='10%' class='listtable_top'><font color='#FFFFFF' size='2'><b>Время</b></font></td>
</tr><form name='delete' method='post' action='../admin/index.php'>";

while ($log = mysql_fetch_assoc($sql_logs)) {

echo "<tr  bgcolor='$color[$i]'>
    	<td class='listtable_1' border='0' bgcolor='$color[$i]' align='left'><input type='checkbox' name='log[]' value='$log[name]'></td>
		<td class='listtable_1' border='0' bgcolor='$color[$i]' align='left'><font color='#8b0000'><b>".$log['name']."</b></font></td>
		<td class='listtable_1' border='0' bgcolor='$color[$i]' align='left'>".$log['last_ip_login']."</td>
		<td class='listtable_1' border='0' bgcolor='$color[$i]' align='left'>".$log['last_server']."</td>
		<td class='listtable_1' border='0' bgcolor='$color[$i]' align='left'>".$log['last_map']."</td>
		<td class='listtable_1' border='0' bgcolor='$color[$i]' align='left'>".date('d.m.Y' ,$log['timestamp'])."</td>
		<td class='listtable_1' border='0' bgcolor='$color[$i]' align='left'>".date('H:i:s' ,$log['timestamp'])."</td>
	</tr>";
	$i=1-$i;
}
echo "</table><br><input type='submit' value='Удалить выбранные'></form><br>";
