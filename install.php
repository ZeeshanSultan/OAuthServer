<?php

require_once 'config.php';

$conn = new mysqli($hostname, $username, $password, $dbname);

if ($conn->connect_errno) {
	printf("Connect failed: %s\n", $conn->connect_error);
	die();
}

$handle = fopen("schema.sql", "r");
while (($query = fgets($handle)) !== false) {
	mysqli_query($conn, $query) or die('Problem in executing the SQL query <b>' . $query . '</b>');
}
fclose($handle);

foreach ($client_config as $name => $client) {
	$query = "INSERT INTO oauth_clients (client_id, client_secret, redirect_uri) VALUES ('" . $client['id'] . "', '" . $client['secret'] . "' , '" . $client['redirect_uri'] . "');";
	mysqli_query($conn, $query) or die('Problem in executing the SQL query <b>' . $query . '</b>');
}

$query = "select client_id, client_secret from oauth_clients where 1";
$result = mysqli_query($conn, $query);
$table = "<div align='center'> Installation Successful. Share below credentials with integrator<br /><br /> <table border='1'><tbody><tr><th>Client Id</th><th>Client Secret</th></tr>";
while ($row = $result->fetch_assoc()) {
	$table .= "<tr><td>" . $row['client_id'] . "</td><td>" . $row['client_secret'] . "</td></tr>";
}
$table .= "</tbody></table></div>";
echo $table;