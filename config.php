<?php

require_once 'helpers.php';

$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'oauth2';
$dsn = 'mysql:dbname=' . $dbname . ';host=' . $hostname;

$access_token_lifetime = 3600;
$refresh_token_lifetime = 1209600;

$clients_config = array();
$client_config['android']['id'] = 'android';
$client_config['android']['secret'] = randomSecret();
$client_config['android']['redirect_uri'] = 'http://localhost/test.php';
$client_config['ios']['id'] = 'ios';
$client_config['ios']['secret'] = randomSecret();
$client_config['ios']['redirect_uri'] = 'http://localhost/test.php';
$client_config['web']['id'] = 'web';
$client_config['web']['secret'] = randomSecret();
$client_config['web']['redirect_uri'] = 'http://localhost/test.php';