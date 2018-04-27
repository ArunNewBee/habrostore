<?php
session_start();
			$_SESSION = array();

	setcookie("id", '', strtotime( '-5 days' ), '/');
    setcookie("manager", '', strtotime( '-5 days' ), '/');
	setcookie("password", '', strtotime( '-5 days' ), '/');
	
session_destroy();
header("Location:index.php");
?>