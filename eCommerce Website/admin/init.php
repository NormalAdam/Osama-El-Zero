<?php
	session_start();
	$temp	= "includes/temp/";
	$css	= "layout/css/";
	$js		= "layout/js/";
	$lang 	= "includes/lang/";
	$func 	= "includes/func/";


	// importaint includes file
	include "connect.php";
	include $lang . "english.php";
	include $func . 'function.php';
	

	//inclode root temp app;
	include $temp . "header.php";


	//Exceptions include
	if(!(basename($_SERVER['PHP_SELF'])=='index.php'))
	include $temp . "nav.php";

	
	