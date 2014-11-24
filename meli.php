<?php
session_start();
error_reporting(E_ERROR | E_PARSE);

include('lib/meli/MercadoLivre/meli.php');

print_r($_POST);
print_r($_GET);

/************ Config ***********/
$callback = 'http://perfit.mangolabs.com.ar/meli.php';

// Get Meli Instance
$meli = new Meli('1442982409057048', 'g1g6SpZ0ijyKB0lxoBefXOums8BiMiPK', $_SESSION['access_token'], $_SESSION['refresh_token']);

// No session or code, click to access
if(!$_GET['code'] && !$_SESSION['access_token']) {
	// Get redirect url for auth
	die('<a href="'.$meli->getAuthUrl($callback).'">Login to MercadoLibre</a>');
}

// Code obtained, authorize user
if ($_GET['code'] && !($_SESSION['access_token'])) {

	$user = $meli->authorize($_GET['code'], $callback);

	$_SESSION['access_token'] = $user['body']->access_token;
	$_SESSION['expires_in'] = time() + $user['body']->expires_in;
	$_SESSION['refresh_token'] = $user['body']->refresh_token;
}

// Session expired, refresh token
if( $_SESSION['access_token'] && ($_SESSION['expires_in'] < time()) ) {
	try {
		$refresh = $meli->refreshAccessToken();

		$_SESSION['access_token'] = $refresh['body']->access_token;
		$_SESSION['expires_in'] = time() + $refresh['body']->expires_in;
		$_SESSION['refresh_token'] = $refresh['body']->refresh_token;
	} catch (Exception $e) {
		die("Exception: ".$e->getMessage(). "\n");
	}
}
