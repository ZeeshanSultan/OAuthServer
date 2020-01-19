<?php

require_once 'server.php';

$request = OAuth2\Request::createFromGlobals();
$response = new OAuth2\Response();

// Insert login business logic here and set is_authorized to true or false accordingly.

$is_authorized = True;

// validate the authorize request
if (!$server->validateAuthorizeRequest($request, $response)) {
	$response->send();
	die;
}

if ($is_authorized === True) {
	$server->handleAuthorizeRequest($request, $response, $is_authorized);
	$code = substr($response->getHttpHeader('Location'), strpos($response->getHttpHeader('Location'), 'code=') + 5, 40);
	$response->send();
}