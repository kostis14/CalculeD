<?php

session_start();

if(isset($_SESSION['user_id']))
{
	unset($_SESSION['user_id']);
	$_SESSION['d'] = false;
}

header("Location: signup.php");
die;