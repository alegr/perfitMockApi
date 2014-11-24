<?php
// Document root
define('CONFIG_DOCUMENT_ROOT',__DIR__.'../');

function __autoload($classname) {
// die($classname);
	include 'modules/' . $classname . '.php';
};

