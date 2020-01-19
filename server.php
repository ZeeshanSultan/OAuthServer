<?php

require_once 'config.php';

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once 'oauth2-server-php/src/OAuth2/Autoloader.php';
OAuth2\Autoloader::register();
$storage = new OAuth2\Storage\Pdo(array('dsn' => $dsn, 'username' => $username, 'password' => $password));
$config = array('access_lifetime' => $access_token_lifetime, 'refresh_token_lifetime' => $refresh_token_lifetime);
$server = new OAuth2\Server($storage, $config);
$server->addGrantType(new OAuth2\GrantType\AuthorizationCode($storage));