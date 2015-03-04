 <html>
<head>
<meta charset="utf-8" />
    <title>Example</title>
</head>
<body>
</body>
 </html>
<?php
if(isset($_POST['nick'])){
	$nick = $_POST['nick'];
	$appid = "demo";
	
	$urlID = "https://api.worldoftanks.ru/wot/account/list/?application_id=$appid&search=$nick&limit=1";
         $curl = curl_init();
         curl_setopt($curl, CURLOPT_URL, $urlID);
		 curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
         curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	$resultID = json_decode(curl_exec($curl), true);
	
	if(empty($resultID['status']) || $resultID['status'] == 'error'){
		foreach($resultID['error'] as $key => $value){
			echo "<b>{$key}:</b> {$value}<br/>";
		}
	}elseif(!$resultID['count']){
		echo "<b>Account not found<br/>";
	}else{
	foreach($resultID['data'] as $key => $value) {
                
                 /* Определяем account_id
                 Значение всех параметров можно изучить в документации к методу account/list
                 https://ru.wargaming.net/developers/api_reference/wot/account/list/     
                 */                        
        $id = $value['account_id'];
		 //echo "  <b>Account id:</b> " . $id . " <br/>";
         }
		 //Получение общей статистики по боям (метод account/info)
                 $urlStat = "https://api.worldoftanks.ru/wot/account/info/?application_id=$appid&account_id=$id";
                 curl_setopt($curl, CURLOPT_URL, $urlStat);
        $resultStat = json_decode(curl_exec($curl), true);
                 foreach($resultStat['data'] as $key => $valueInfo){
                                            /* Определяем общее количество побед
                                            Значение всех параметров можно изучить в документации к методу account/info
                                            https://ru.wargaming.net/developers/api_reference/wot/account/info/            
                                            */
								$win = round($valueInfo['statistics']['all']['wins']/$valueInfo['statistics']['all']['battles']*100,2);
								
								//временная переменная кол-ва боев
  $battles = $valueInfo['statistics']['all']['battles'];
  
								//временный массив входных данных - общей статистики игрока
  $effmas = array();
  //заполнение массива:
  //DAMAGE - "Нанесено повреждений за бой"
  $effmas['DAMAGE'] = $valueInfo['statistics']['all']['damage_dealt'] / $battles;
  //TIER - "ср. уровень проведенных боев"
  $effmas['TIER'] = $battles;
  //FRAGS - "ср.уничтожено за бой"
  $effmas['FRAGS'] = $valueInfo['statistics']['all']['frags'] / $battles;
  //SPOT - "ср. за бой Обнаружено противников"
  $effmas['SPOT'] = $valueInfo['statistics']['all']['spotted'] / $battles;
  //CAP - "ср. за бой Очков захвата базы"
  $effmas['CAP'] = $valueInfo['statistics']['all']['capture_points'] / $battles;
  //DEF - "ср. за бой Очков защиты базы"
  $effmas['DEF'] = $valueInfo['statistics']['all']['dropped_capture_points'] / $battles;
  
  //рассчет РЭ
  //$EFF = $effmas['DAMAGE']*(10/($effmas['TIER']+2))*(0.23+2*$effmas['TIER']/100) + $effmas['FRAGS']*250 + $effmas['SPOT']*150 + (log($effmas['CAP']+1)/log(1.732))*150 + $effmas['DEF']*150;
  $EFF=$effmas['DAMAGE'] * (10 / ($effmas['TIER'] + 2)) * (0.23 + 2*$effmas['TIER'] / 100) +$effmas['FRAGS'] * 250 +$effmas['SPOT'] * 150 +log($effmas['CAP'] + 1)/log(1.732) * 150 +$effmas['DEF'] * 150;
  
  
			echo "  <b>Account id:</b> " . $valueInfo['account_id'] . "<br/>";
            echo "  <b>Nickname:</b> " . $valueInfo['nickname'] . "<br/>";
			echo "  <b>Рейтинг WG :</b> " . $valueInfo['global_rating'] . "<br/>";
			echo "  <b>Рейтинг EFF :</b>  $EFF <br/>";
			echo "  <b>Побед : </b> $win %<br/>";
			echo "  <b>Язык:</b> " . $valueInfo['client_language'] . "<br/>";
            echo "  <b>Дата регистрации:</b> "
                 . date('d.m.Y H:i', $valueInfo['created_at']) . "<br/>";
			echo "  <b>Время последнего боя:</b> "
                 . date('d.m.Y H:i' ,$valueInfo['last_battle_time']).  "<br/>";
			echo "  <b>Время окончания последней игровой сессии:</b> "
                 . date('d.m.Y H:i' ,$valueInfo['logout_at']). "<br/>";	 
			echo "  <b>Личный рейтинг:</b> "
            	 . $valueInfo['global_rating'] . "<br/>";
			echo "  <b>Дата обновления информации об игроке:</b> "
            	 . date('d.m.Y H:i' ,$valueInfo['updated_at']). "<br/>";		 
            echo "  <b>Суммарный опыт:</b> " . $valueInfo['statistics']['all']['xp'] . "<br/>";
            echo "  <b>Средний опыт за бой:</b> "
                 . $valueInfo['statistics']['all']['battle_avg_xp'] . "<br/>";
            echo "  <b>Максимальный опыт за бой:</b> "
                 . $valueInfo['statistics']['max_xp'] . "<br/>";
			echo "  <b>Проведено боёв в клане:</b> "
                 . $valueInfo['statistics']['clan']['battles'] . "<br/>";	 
			echo "  <b>Проведено боёв в роте:</b> "
                 . $valueInfo['statistics']['company']['battles'] . "<br/>";
			echo "  <b>Проведено боёв:</b> "
                 . $valueInfo['statistics']['all']['battles'] . "<br/>";
								  
         $clan = $valueInfo['clan_id'];
		 //var_dump($valueInfo['clan_id']);
		 if(null == $valueInfo['clan_id']){
		 
		 echo "<b>Не состоит в клане<br/>";
	}else{
                 //Получение общей статистики по боям (метод account/info)
                 $urlclan = "https://api.worldoftanks.ru/wot/clan/info/?application_id=$appid&clan_id=$clan";
                 curl_setopt($curl, CURLOPT_URL, $urlclan);
        $resultclan = json_decode(curl_exec($curl), true);
		
                 foreach($resultclan['data'] as $key => $valueclan){
                                            /* Определяем общее количество побед
                                            Значение всех параметров можно изучить в документации к методу account/info
                                            https://ru.wargaming.net/developers/api_reference/wot/account/info/            
                                            */
                                           //$wins = $valueclan['statistics']['all']['wins'];
                                            curl_close($curl);

											echo "  <b>Название клана:</b> " . $valueclan['name'] . "<br/>";
											echo "  <b>Тег клана:</b> " . $valueclan['abbreviation'] . "<br/>";
											echo "  <b>Идентификатор клана:</b> " . $valueclan['clan_id'] . "<br/>";
											echo "  <b>Количество участников клана:</b> " . $valueclan['members_count'] . "<br/>";
											echo "  <b>Время обновления информации о клане:</b> " . date('d.m.Y H:i', $valueclan['updated_at']) . "<br/>";
											echo "  <b>Дата создания клана: </b> " . date('d.m.Y H:i', $valueclan['created_at']) . "<br/>";
											echo "  <b>Дата вступления в клан: </b> " . date('d.m.Y H:i', $valueclan['members'][$id]['created_at']) . "<br/>";
											echo "  <b>Должность игрока в клане: </b> " . $valueclan['members'][$id]['role_i18n'] . "<br/>";
											//var_dump($valueclan['members'][$id]['created_at']);
											echo "   <img src=" . $valueclan['emblems']['large'] . " /><br/>";
											echo "   " . $valueclan['description_html'] . "<br/>";
		 }
		 
	}
}
}
}
?>
 
<p><form method="post">Nick <input name="nick" type="text"><input type="submit" value="Check!"></form></p>
