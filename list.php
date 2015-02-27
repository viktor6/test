 <html>
<head>
<meta charset="utf-8" />
    <title>Example</title>
</head>
<body>
</body>
 </html>
<?php
//Идентификатор приложения (Application_id), регистрация приложения https://ru.wargaming.net/developers/applications/
$appid = "demo";
//Тело скрипта
if(isset($_POST['nick']))
{
         $nick = $_POST['nick'];
         //Получение account_id (метод account/list)
         $urlID = "https://api.worldoftanks.ru/wot/account/list/?application_id=$appid&search=$nick&limit=1";
         $curl = curl_init();
         curl_setopt($curl, CURLOPT_URL, $urlID);
         curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
         $resultID = json_decode(curl_exec($curl), true);
         foreach($resultID['data'] as $key => $value) {
                 
                 /* Определяем account_id
                 Значение всех параметров можно изучить в документации к методу account/list
                 https://ru.wargaming.net/developers/api_reference/wot/account/list/     
                 */                        
        $id = $value['account_id'];
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
                                           $wins = $valueInfo['statistics']['all']['wins'];
                                           $win = round($valueInfo['statistics']['all']['wins']/$valueInfo['statistics']['all']['battles']*100,2);
                                           //$win = floor((time() - $valueInfo['statistics']['all']['wins']/$valueInfo['statistics']['all']['battles'])*(100));
                                            //curl_close($curl);
                                  // echo "<b>AccountID:</b> $id <br />
                                  //<b>Wins:</b> . $valueInfo['statistics']['all']['wins'] . <br />
								  //<b>Wins:</b> $frags";
								  echo "  <b>Nickname:</b> " . $valueInfo['nickname'] . "<br/>";
								  echo "  <b>global_rating:</b> " . $valueInfo['global_rating'] . "<br/>";
                                                                  echo "  <b>%:</b> $win <br/>";
 echo " <b>Побед : </b>" . round($valueInfo['statistics']['all']['wins']/$valueInfo['statistics']['all']['battles']*100,2) . "%<br/>";
                                                                  echo "  <b>clan:</b> " . $valueInfo['clan_id'] . "<br/>";
								  echo "  <b>update:</b> " . date('d.m.Y H:i', $valueInfo['updated_at']) . "<br/>";
         $clan = $valueInfo['clan_id'];
         }
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

											echo "  <b>Nickname:</b> " . $valueclan['name'] . "<br/>";
											echo "  <b>Nickname:</b> " . $valueclan['description_html'] . "<br/>";
											echo "  <b>Nickname:</b> " . $valueclan['members_count'] . "<br/>";
											echo "  <b>Nickname:</b> " . date('d.m.Y H:i', $valueclan['updated_at']) . "<br/>";
		 }
}
?>

<p><form method="post">Nick <input name="nick" type="text"><input type="submit" value="Check!"></form></p>
 

