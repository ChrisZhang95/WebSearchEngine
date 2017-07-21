<?php
	$type2=$_POST['type1'];
	if ($type2 == 'update'){
	
		$cable=$_POST['cable1'];
		$timeRem=$_POST['timeRem'];
		$timeElap=$_POST['timeElap'];
		$packetRem=$_POST['packetRem'];
		$frameRem=$_POST['frameRem'];
		$packetSent=$_POST['packetSent'];
		$frameSent=$_POST['frameSent'];
		$mindex=$_POST['index'];
		$index = (int)$mindex;
		require 'Monitor.php';
		session_start();
		$temp = $_SESSION[$cable];
		$t = unserialize($temp);
		
		if($index!=-1){
			$t[$index]->setTimeRem($timeRem);
			$t[$index]->setTimeElap($timeElap);
			$t[$index]->setPacketRem($packetRem);
			$t[$index]->setFrameRem($frameRem);
			$t[$index]->setPacketSent($packetSent);
			$t[$index]->setFrameSent($frameSent);
			$_SESSION[$cable] = serialize($t);
			// $temp = $_SESSION['monitor'];
			// $t = unserialize($cable);
		
			echo $cable."\n";
			echo $timeRem."\n";
			echo $timeElap."\n";
			echo $packetRem."\n";
			echo $frameRem."\n";
			echo $packetSent."\n";
			echo $frameSent."\n";
			}
	}
?>



