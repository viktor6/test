<?php
define('URL','http://localhost/WGDPPAuth.php');//адрес по которому доступен данный скрипт
define('APPLICATION_ID','42f70f94f175efd8c5a9a6075afaee88');//application_id приложения
if(empty($_GET['status'])){//генерируем ссылку и перенаправяем пользователя
    $context = stream_context_create(
        array('http' =>
            array(
                'method'  => 'POST',
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                'content' => http_build_query(
                    array(
                        'nofollow' => 1,
                        'expires_at' => 300,
                        'redirect_uri' => URL,
                        'application_id' => APPLICATION_ID
                    )
                )
            )
        )
    );
    $data=json_decode(@file_get_contents('https://api.worldoftanks.ru/wot/auth/login/', false, $context),true);
    if($data['status']=='ok'){
        header ('Location: '.$data['data']['location']);
        exit();
    }else{
        exit('Не удалось получить ссылку для перенаправления.');
    }
}elseif(isset($_GET['status']) && isset($_GET['access_token']) && isset($_GET['nickname']) && isset($_GET['account_id']) && isset($_GET['expires_at'])){//если пользователь попал на страницу с параметрами, которые устанавливает метод auth/login
    if($_GET['status']!="ok"){
        $error_code=500;
        if(preg_match('/^[0-9]+$/u', $_GET['code'])){
            $error_code=$_GET['code'];
        }
        exit("Ошибка авторизации. Код ошибки: $error_code");
    }elseif($_GET[expires_at]<time()){
        exit("Ошибка авторизации. Срок действия access_token истек.");
    }else{
        $context = stream_context_create(
            array('http' =>
                array(
                    'method'  => 'POST',
                    'header'  => 'Content-type: application/x-www-form-urlencoded',
                    'content' => http_build_query(
                        array(
                            'expires_at' => 14*24*60*60,
                            'access_token' => $_GET['access_token'],
                            'application_id' => APPLICATION_ID
                        )
                    )
                )
            )
        );
        $data=json_decode(@file_get_contents('https://api.worldoftanks.ru/wot/auth/prolongate/', false, $context),true);//подтверждаем правдивость полученных параметров
        if($data['status']=="ok"){
            $access_token=$data[data][access_token];
            $expires_at=$data[data][expires_at];
            $account_id=$data[data][account_id];
            //здесь вам нужно установить пользователю куки, записать его токен в БД, сделать все то, что сочтете нужным.
            //exit('Это пользователь с id <b>'.$account_id.'</b><br />Токен <b>'.$access_token.'</b>, он подтвержден и действует до <b>'.date("d.m.Y H:i:s",$expires_at).'</b>');
        
		///////////Тело скрипта

                 //Получение общей статистики по боям (метод account/info)
                 $urlStat = "https://api.worldoftanks.ru/wot/account/info/?application_id=" . APPLICATION_ID . "&account_id=$id";
                 $curl = curl_init();
         curl_setopt($curl, CURLOPT_URL, $urlStat);
		 curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
         curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                $resultStat = json_decode(curl_exec($curl), true);
                 foreach($resultStat['data'] as $key => $valueInfo){
                                            /* Определяем общее количество побед
                                            Значение всех параметров можно изучить в документации к методу account/info
                                            https://ru.wargaming.net/developers/api_reference/wot/account/info/            
                                            */
								
			echo "  <b>Account id:</b> " . $valueInfo['account_id'] . "<br/>";
            echo "  <b>Nickname:</b> " . $valueInfo['nickname'] . "<br/>";
			echo "  <b>Кредиты :</b> " . $valueInfo['private']['credits'] . "<br/>";
			echo "  <b>Максимальный урон за бой :</b> " . $valueInfo['statistics']['max_damage'] . "<br/>";
        }
		/////////////////////
		
		}else{
            exit('access_token не подтвержден');
        }
    }
}else{
    $error_code=500;
    if(preg_match('/^[0-9]+$/u', $_GET['code'])){
        $error_code=$_GET['code'];
    }
    exit("Произошла ошибка. Код ошибки: $error_code");
}
?>
 <html>
<head>
<meta charset="utf-8" />
    <title>Example</title>
</head>
<body>
</body>
 </html>
