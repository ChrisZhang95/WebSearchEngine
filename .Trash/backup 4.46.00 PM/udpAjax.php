<?php

require 'UDPsocket.php';
require 'Computer.php';

session_start();

$temp = $_SESSION['computers'];
$t =  unserialize($temp);
if(!empty($t)){
// $user = $t[$num-1]->getUserName();
$source_ip = $t[0]->getIP();
$des_ip = $t[1]->getIP();
$udp = new UDPsocket($source_ip, $des_ip);
$udp->getSourceIP();
$udp->getDestIP();
$_SESSION['udp'] = $udp;
}
else{
	echo "Please configure computers first";
}
?>