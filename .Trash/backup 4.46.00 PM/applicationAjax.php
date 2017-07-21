<?php


//Fetching Values from URL
$id2=$_POST['id1'];

require 'Application.php';

//echo $id2;
$num = $id2[11];
session_start();

$temp = $_SESSION['computers'];
$t =  unserialize($temp);

if(!empty($t)){
$user = $t[$num-1]->getUserName();
$ip = $t[$num-1]->getIP();
$host = $t[$num-1]->getHost();

echo "Username: '".$user."'\n";
echo "Hostname: '".$host."'\n";
echo "IP Address: '".$ip."'\n";
}
else{
	echo "Please configure first";
}
return;

?>