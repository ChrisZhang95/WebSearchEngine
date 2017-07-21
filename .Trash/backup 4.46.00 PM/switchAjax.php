<?php
	$type = $_POST['type1'];
	//echo " hi";
	if($type == 'addSw'){
		$switch2 = $_POST['switch1'];
		//echo $switch2;
		require 'Switch.php';
		session_start();
		$switch = new Sw($switch2);
		$temp = $_SESSION['switchs'];
	    $index = $switch2[6];
		$t = unserialize($temp);
	    $num = count($t);
	    array_push($t, $switch);
	   	var_dump($t);
	    $_SESSION['switchs'] = serialize($t);
	}
	else if($type == 'addCable'){
		//echo"I am here";
		$switch2 = $_POST['switch1'];
		$cable2=$_POST['cable1'];
		require 'Switch.php';
		session_start();
		$temp = $_SESSION['switchs'];
	    $index = $switch2[6];
	    $num = $cable2[5];
	    //echo $index;
		$t = unserialize($temp);
		$cableName = 'cable'.$num;
		$t[$index - 1]->setArray($cableName);
		$_SESSION['switchs'] = serialize($t);
	}
	else if($type == 'deleteCable1'){
		//echo"I am in deleteCable1";
		$switch2 = $_POST['switch1'];
		$cable2=$_POST['cable1'];
		require 'Switch.php';
		session_start();
		$temp = $_SESSION['switchs'];
	    $index = $switch2[6];
	    $num = $cable2[5];
	    //echo $index;
		$t = unserialize($temp);
		//var_dump($t);
		$cableName = 'cable'.$num;
		$t[$index - 1]->deleteElmt($cableName);
		$_SESSION['switchs'] = serialize($t);
	}

?>