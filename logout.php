<?php

session_start();

if(isset($_SESSION['username']))
{
	unset($_SESSION['username']);
    setcookie('usercookie','',time()-86400);
    setcookie('passwordcookie','',time()-86400);
}
header("Location: register.php");
die;