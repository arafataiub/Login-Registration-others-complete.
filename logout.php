<?php

	session_start();
	
    header("location: login.php");
    setcookie('user',$_SESSION['name'],time()-3600);
	setcookie('admin',$_SESSION['name'],time()-3600);
	session_destroy();
	
?>