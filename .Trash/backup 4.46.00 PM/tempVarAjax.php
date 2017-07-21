<?php
	$cable=$_POST['cable1'];
	require 'Monitor.php';
	session_start();
	$temp = $_SESSION[$cable];
	$t = unserialize($temp);

	$mindex = $_POST['index'];
	$index = (int)$mindex;
	if($index!=-1){
			echo $t[$index]->getTimeRem().",";
			echo $t[$index]->getTimeElap().",";
			echo $t[$index]->getPacketRem().",";
			echo $t[$index]->getFrameRem().",";
			echo $t[$index]->getPacketSent().",";
			echo $t[$index]->getFrameSent();
	}
?>