<?php

$type=$_POST['type'];
if($type == 'switch'){
	//Fetching Values from URL
	$id2=$_POST['id1'];

	require 'Switch.php';

	//echo $id2;
	$num = $id2[6];
	session_start();

	$temp = $_SESSION['switchs'];
	$t =  unserialize($temp);
	//var_dump($t);
	if(!empty($t[$num-1])){
		$user = $t[$num-1]->getName();

		echo "Name: '".$user."'\n";
		$t[$num-1]->getArray();
	}
	else{
		echo "Please configure switch first";
	}
	return;
}

if($type == 'computer'){
	//Fetching Values from URL
	$id2=$_POST['id1'];

	require 'Computer.php';

	//echo $id2;
	$num = $id2[8];
	session_start();

	$temp = $_SESSION['computers'];
	$t =  unserialize($temp);
	//var_dump($t);
	if(!empty($t[$num-1])){
		//$user = $t[$num-1]->getUserName();
		$ip = $t[$num-1]->getIP();
		$host = $t[$num-1]->getHost();
		//$app = $t[$num-1]->getApp();
		$cable = $t[$num-1]->getCable();

		//echo "Username: '".$user."'\n";
		echo "Hostname: '".$host."'\n";
		echo "IP Address: '".$ip."'\n";
		//.$app."'\n";
		echo "Cable: '".$cable."'\n";
		echo "Application: '";
		$apps = $t[$num-1]->getApp();
		echo "'\n";
	}
	else{
		echo "Please configure computer first";
	}
	return;
}

if($type == 'cable'){
	$id2=$_POST['id1'];
	//echo "I am in cable double click";
	require 'Cable.php';

	$num = $id2[5];
	session_start();

	$temp = $_SESSION['cables'];
	$t =  unserialize($temp);
	//var_dump($t);
	if(!empty($t[$num-1])){
		$user = $t[$num-1]->getName();
		$ip = $t[$num-1]->getSocket();
		$host = $t[$num-1]->getType();
		$app = $t[$num-1]->getComputers();

		echo "Name: '".$user."'\n";
		echo "Socket: '".$ip."'\n";
		echo "Type: '".$host."'\n";
		echo "Computers:  ".$app[0]." & ".$app[1];
	}
	else{
		echo "Please configure cable first";
	}
	return;
}
?>