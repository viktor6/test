<?php
define('API_URL', 'http://api.worldoftanks.ru/');
define('API_VERSION', 'wot');
define('CLANINFO_METHOD', API_URL.API_VERSION.'/clan/info/');
define('APPLICATION_ID', 'demo');
define('CLAN_ID', '0');
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, CLANINFO_METHOD . "?application_id=" . APPLICATION_ID . "&clan_id=" . CLAN_ID);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 60);
$result = json_decode(curl_exec($ch), true);

if (curl_errno($ch))
{
    echo "CURL returned error: ".curl_error($ch)."\n";
    die();
}
curl_close($ch);
?>
<html>
<head>
<meta charset="utf-8" />
    <title>Example</title>
</head>
<body>
<?
if(empty($result['status']) || $result['status'] == 'error'){
    echo '<div style="background-color: #EDEDE8;">';
    foreach($result['error'] as $key => $value){
        echo "  <b>{$key}:</b> {$value}<br/>";
    }
    echo '</div>';
}else{

//Сопоставляем каждой роли в клане определенный вес. У кого вес больше - стоит выше в списке.
 function GetRoleWeight($role)
 {
    switch($role)
    {
             case  "diplomat": return 7;
            case  "junior_officer": return 4;
            case  "recruiter": return 8;
            case  "recruit": return 1;
            case  "private": return 3;
            case  "commander": return 9;
            case  "reservist": return 2;
            case  "treasurer": return 5;            
            case  "vice_leader": return 10;
            case  "personnel_officer": return 6;
            case  "leader": return 11;
            default: die("Неизвестная роль $role" );
     }  
 }
 function cmp($a, $b)
{    
    return GetRoleWeight($b["role"])>GetRoleWeight($a["role"]);
}

    	foreach($result['data'] as $clan) {

        echo '<div style="background-color: #EDEDE8;">';
	    echo "  <b>Clan:</b> " . $clan['abbreviation'] . "<br/>";
	echo "  ======================== <br/>"	 ;
	    usort($clan['members'], "cmp" );
		foreach($clan['members'] as $member_id => $member_data){
            echo "  <b>Nickname_id:</b> " . $member_data['account_id'] . "<br/>";
			echo "  <b>Nickname:</b> " . $member_data['account_name'] . "<br/>";

     

			echo "  <b>Звание:</b> " . $member_data['role_i18n'] . "<br/>";
			echo "  <b>В клане:</b> " . date('d.m.Y H:i', $member_data['created_at']) . "<br/>";
			echo "  <b>role2:</b> " . $member_data['role'] . "<br/>";
			echo "  ======================== <br/>"	 ;
        }
        echo '</div>';
    }
}
?>
</body>
</html>
