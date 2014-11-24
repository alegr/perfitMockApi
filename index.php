<?php

error_reporting(E_ERROR);

require_once __DIR__ . '/config/autoload.php';

require_once __DIR__ . '/config/routes.php';

// Get Url
$url = Request::url();

// Get Method
$method = Request::method();

// Check if the user is logged in
if (($url !== '/user/login') && (!is_file(__DIR__.'/static/session/'.Request::token()))) {
    Response::error(401, 'Invalid Credentials');
    die(Response::output());
}


// Obtain account
$account = Request::account();

// Strip account from url
if ($account != 'user')
    $url = str_replace('/'.$account, '', $url);

// Retrieve static content
$action = Router::getAction($url);

// echo '<pre>';var_dump($action);die('a');

// Obtain file content
$res = file_get_contents(__DIR__.'/static'.$action[0]);
$res = json_decode($res);

// var_dump($res);
// die('a');
if ($res !== false) {
    Response::data($res);
}

// Return the response in the right format
echo Response::output($res);
