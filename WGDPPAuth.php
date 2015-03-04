<?php
define('URL','http://localhost/WGDPPAuth.php');//����� �� �������� �������� ������ ������
define('APPLICATION_ID','42f70f94f175efd8c5a9a6075afaee88');//application_id ����������
if(empty($_GET['status'])){//���������� ������ � ������������� ������������
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
        exit('�� ������� �������� ������ ��� ���������������.');
    }
}elseif(isset($_GET['status']) && isset($_GET['access_token']) && isset($_GET['nickname']) && isset($_GET['account_id']) && isset($_GET['expires_at'])){//���� ������������ ����� �� �������� � �����������, ������� ������������� ����� auth/login
    if($_GET['status']!="ok"){
        $error_code=500;
        if(preg_match('/^[0-9]+$/u', $_GET['code'])){
            $error_code=$_GET['code'];
        }
        exit("������ �����������. ��� ������: $error_code");
    }elseif($_GET[expires_at]<time()){
        exit("������ �����������. ���� �������� access_token �����.");
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
        $data=json_decode(@file_get_contents('https://api.worldoftanks.ru/wot/auth/prolongate/', false, $context),true);//������������ ����������� ���������� ����������
        if($data['status']=="ok"){
            $access_token=$data[data][access_token];
            $expires_at=$data[data][expires_at];
            $account_id=$data[data][account_id];
            //����� ��� ����� ���������� ������������ ����, �������� ��� ����� � ��, ������� ��� ��, ��� ������� ������.
            //exit('��� ������������ � id <b>'.$account_id.'</b><br />����� <b>'.$access_token.'</b>, �� ����������� � ��������� �� <b>'.date("d.m.Y H:i:s",$expires_at).'</b>');
        
		///////////���� �������

                 //��������� ����� ���������� �� ���� (����� account/info)
                 $urlStat = "https://api.worldoftanks.ru/wot/account/info/?application_id=" . APPLICATION_ID . "&account_id=$id";
                 $curl = curl_init();
         curl_setopt($curl, CURLOPT_URL, $urlStat);
		 curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
         curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                $resultStat = json_decode(curl_exec($curl), true);
                 foreach($resultStat['data'] as $key => $valueInfo){
                                            /* ���������� ����� ���������� �����
                                            �������� ���� ���������� ����� ������� � ������������ � ������ account/info
                                            https://ru.wargaming.net/developers/api_reference/wot/account/info/            
                                            */
								
			echo "  <b>Account id:</b> " . $valueInfo['account_id'] . "<br/>";
            echo "  <b>Nickname:</b> " . $valueInfo['nickname'] . "<br/>";
			echo "  <b>������� :</b> " . $valueInfo['private']['credits'] . "<br/>";
			echo "  <b>������������ ���� �� ��� :</b> " . $valueInfo['statistics']['max_damage'] . "<br/>";
        }
		/////////////////////
		
		}else{
            exit('access_token �� �����������');
        }
    }
}else{
    $error_code=500;
    if(preg_match('/^[0-9]+$/u', $_GET['code'])){
        $error_code=$_GET['code'];
    }
    exit("��������� ������. ��� ������: $error_code");
}
?>
