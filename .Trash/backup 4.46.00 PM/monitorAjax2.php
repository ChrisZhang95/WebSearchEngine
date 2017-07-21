
<?php

$type2=$_POST['type1'];
$index1 = -1;
$index2 = -1;
if ($type2 = "start2"){
	require 'Monitor.php';
	session_start();

	if(!empty($_POST['cable1'])) {
		$cable1 = $_POST['cable1'];
		//if this cable already has a monitor
		if(array_key_exists($cable1, $_SESSION)){
			$monitor = new Monitor($cable1);
			$cableMonitor = $_SESSION[$cable1];
			$t = unserialize($cableMonitor);
			array_push($t, $monitor);
			$_SESSION[$cable1] = serialize($t);
			$index1 = sizeof($t) - 1;
			echo $index1.",";
		}
		//if this is a new monitor
		else{
			$monitors = array();
			$monitor = new Monitor($cable1);
			array_push($monitors, $monitor);
			$_SESSION[$cable1] = serialize($monitors);
			$index1 = 0;
			echo $index1.",";
		}

	}


	if(!empty($_POST['cable2'])) {
		$cable2 = $_POST['cable2'];
		if(array_key_exists($cable2, $_SESSION)){
			$monitor = new Monitor($cable2);
			$cableMonitor = $_SESSION[$cable2];
			$t = unserialize($cableMonitor);
			array_push($t, $monitor);
			$_SESSION[$cable2] = serialize($t);
			$index2 = sizeof($t) - 1;
			//echo sizeof($t).'/n';
			echo $index2;
		}
		//if this is a new monitor
		else{
			$monitors = array();
			$monitor = new Monitor($cable2);
			array_push($monitors, $monitor);
			$_SESSION[$cable2] = serialize($monitors);
			$index2 = 0;
			echo $index2;
		}
	}
}
	//var_dump($_SESSION[$cable1]);
?>