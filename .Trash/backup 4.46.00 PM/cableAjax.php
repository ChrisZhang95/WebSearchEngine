<?php
	$cable2 = $_POST['cable1'];
	require "Cable.php";
	session_start();
	$cable = new Cable(1024*1024*1024*8, $cable2, 'CAT6E', 'RJ45');
	$temp = $_SESSION['cables'];
    $index = $cable2[5];
	$t = unserialize($temp);
    $num = count($t);
    array_push($t, $cable);
   	//var_dump($t);
    $_SESSION['cables'] = serialize($t);
?>