<?php
	require 'Monitor.php';
	session_start();
	$monitors = $_SESSION['monitor'];
	$t = unserialize($monitors);
	$string = "";
	for($i = 0; $i < sizeof($t); $i++){
			echo $t[$i]->getName().",";
	}
	//echo $string;


?>