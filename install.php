<?php

require_once 'config.php';

$conn = new mysqli($hostname, $username, $password, $dbname);
$query = '';
$sqlScript = file('schema.sql');
foreach ($sqlScript as $line) {
	$startWith = substr(trim($line), 0, 2);
	$endWith = substr(trim($line), -1, 1);
	if (empty($line) || $startWith == '--' || $startWith == '/*' || $startWith == '//') {
		continue;
	}
	$query = $query . $line;
	if ($endWith == ';') {
		mysqli_query($conn, $query) or die('Problem in executing the SQL query <b>' . $query . '</b>');
		$query = '';
	}
}

foreach($client_config as $name=>$client){
	mysqli_query($conn, "INSERT INTO oauth_clients (client_id, client_secret, redirect_uri) VALUES ($client['id'], $client['pass'] , $client['redirect_url']");
}