<?php 

require 'environment.php';

$config = array();

if (ENVIRONMENT == "development") {
	define("BASE_URL","http://projetoy.pc/classificados_mvc/");
	$config['dbname'] = "projeto_classificados";
	$config['host'] = "localhost";
	$config['dbuser'] = "root";
	$config['dbpass'] = "";
}else{
	define("BASE_URL", "http://www.sitedahospedagem.com");
	$config['dbname'] = "";
	$config['host'] = "";
	$config['dbuser'] = "";
	$config['dbpass'] = "";
}

global $db;

try {
	$db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'], $config['dbuser'], $config['dbpass']);

} catch (PDOException $e) {
	echo "Erro".$e->getMessage();
}