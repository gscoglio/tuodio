<?php
session_start();
set_time_limit(0);

// Debe estar autenticado
if(empty($_SESSION['twitter'])) {
	header('Location: twitter/connect.php');
}

// Debe tener hashtag en la url
if(empty($_GET['hashtag'])) {
	die('Sin hashtag=');
}

// Incluimos las librerias oAuth
require_once('twitter/twitteroauth/twitteroauth.php');
require_once('twitter/config.php');

// Array Token ya autenticado
$access_token = $_SESSION['access_token'];

// Conectamos a Twitter con TwiiterOAuth
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);

// Leemos el JSON de la API de Busqueda
$content = file_get_contents('http://search.twitter.com/search.json?rpp=100&q='.$_GET['hashtag']);

// Leemos el .txt de nuestro usuario, con todos los users que ya procesamos
$following = getCurrentUsers($_SESSION['twitter']);

// result empty
$result = '';

// Append del archivo de nuestro user
$fp = fopen($_SESSION['twitter'].'.txt', 'a+');

// JSON a ARRAY (2do parametro en true)
$content = json_decode($content, true);

$i = 0;
// Recorremos el Array
foreach($content['results'] as $item) {

	// c/user en Minuscula	
	$user = strtolower($item['from_user']);

	// Ya esta procesado?	
	if(!in_array($user, $following)) {
		
		$content2 = $connection->post('friendships/create', array('screen_name' => $item['from_user']));
		fwrite($fp,$user."\n");
		$result .= "add $user\n";
		$following[] = $user;

		$i++;
	
	} else {
		$result .= "ignored $user\n";
	}


	if($i==20) break;

}

// Imprimimos el Resultado
fclose($fp);
echo '<pre>' . $result;




// Funciones.-
function getCurrentUsers($twitter) {

	if (!file_exists("$twitter.txt")) return array();

	$fp = fopen("$twitter.txt",'r');

	$result = array();
	while(!feof($fp)) {
		$user = strtolower(str_replace("\n",'', fgets($fp)));
		$result[] = $user;
	}

	return $result;
}


?>
