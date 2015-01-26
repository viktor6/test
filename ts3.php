<?php 

    $myhost = 'localhost';
    $myuser = 'test';
    $mypassw = '123456789';
    $mybd = 'teamspeak';
    $link = mysqli_connect($myhost,$myuser,$mypassw,$mybd)
            or die("Ошибка  : " . mysqli_connect_error()); 
  

    $sql = 'SELECT * FROM `clients`';
    $sql_region_ip = mysqli_query($link, $sql);
     

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
<link rel="stylesheet" type="text/css" href="http://ban.cs.plusnet.ks.ua/include/amxbans.css" />
<script type="text/javascript" language="JavaScript" src=http://cs.plusnet.ks.ua/namereg/layer.js"></script>
<style type="text/css">
        html, body{
            height:100%; /* Задаём 100% высоту для html и body */
            position:relative; /* Если этого не задать, в Опере почему-то футер не прижимается сразу,
			прижимается только после ресайза окна, какой-то странный глюк*/
        }
        #container{
            min-height:100%; /* Задаем минимальную высоту 100% */
            _height:100%; /* Задаем высоту 100% в ИЕ6 с помощью хака */
        }
        #main{
            padding-bottom:31px; /* Задаём нижний отступ, равный высоте футера, можно задать и больше, 
                                    но главное, чтобы не было меньше, иначе футер налезет на контент*/	
        }
        #footer{
            height:41px; /* высота футера */
            margin-top:-50px; /* отрицательный маргин, равный высоте футера */
            position:relative; /* Чтобы футер "всплыл" из под дива #container, если этого не сделать,
                                то ссылки в футере не кликабельны и нельзя выделить текст*/
        }
				h1 {
			font-family: arial;
			font-size: 16px;
			font-style: normal;
			font-weight: bold;
			margin: 0px;
			color: Black
		}
</style>
</HEAD>

<body>
<div id='container'>
<table border='0' cellpadding='0' cellspacing='0' width=100%>
     <tr>
          <td background='http://cs.plusnet.ks.ua/namereg/images/header-bg.png' align='left'><p align='center'><a href='/namereg'><img src='http://cs.plusnet.ks.ua/namereg/images/header-logo.jpg' border='0'></a></td>
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
		<h1>Список Клиентов</h1>
		</div>
	</div>



<?php

echo "<table cellspacing='1' align='center' width='600' class='listtable'>
<tr>
<td width='3%' class='listtable_top'></td>
<td width='40%' class='listtable_top'><font color='#FFFFFF' size='2'><b>Имя</b></font></td>
<td width='25%' class='listtable_top'><font color='#FFFFFF' size='2'><b>Входов</b></font></td>
<td width='30%' class='listtable_top'><font color='#FFFFFF' size='2'><b>IP</b></font></td>
<td width='10%' class='listtable_top'><font color='#FFFFFF' size='2'><b>Время</b></font></td>
</tr>";

while ($row = mysqli_fetch_assoc($sql_region_ip)) {

echo "<tr>
    	
	<td class='listtable_1' border='0' align='left'><font color='#8b0000'><b>".$row['client_nickname']."</b></font></td>
        <td class='listtable_1' border='0' align='left'><font color='#8b0000'><b>".$row['client_totalconnections']."</b></font></td>
	<td class='listtable_1' border='0' align='left'><font color='#8b0000'><b>".$row['client_lastip']."</b></font></td>
	<td class='listtable_1' border='0' align='left'>".date('d.m.Y' ,$row['client_lastconnected'])."</td>
	</tr>";
	
echo "</table><br><br>";

}

?>
<br><br><br><br><br>
</div>
<div id='footer'>
<table width='100%' height='41' cellspacing='0' cellpadding='0' valign='middle'>
     <tr>
          <td class='footer' width='10%'>

          </td>
          <td class='footer' width='80%' align='center'>Регистрация ников игроков =Plusnet= C-S 1.6 Servers</td>
          <td class='footer' width='10%' align='right'><a href='mailto:leopard@planar.bz'><img src="../images/leopard.png" border="0"></a></td>
     </tr>
</table>
</div>
</BODY>
</HTML>

