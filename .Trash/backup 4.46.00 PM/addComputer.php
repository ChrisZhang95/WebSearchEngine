<?php
//computer id
$id=$_POST['id'];
//app id
$appid=$_POST['appid'];
//app name
$appname=$_POST['appname'];
$compIndex = $id[8];
require 'Computer.php';
session_start();
//
$temp = $_SESSION['computers'];
$t = unserialize($temp);
$t[$compIndex-1]->setAPP($appid);
$_SESSION['computers'] = serialize($t);

$temp = $_SESSION['computers'];
$t = unserialize($temp);
//var_dump($t);
//$_SESSION['computers'][$id][$appid] = $appname;
// $_SESSION[$id][$appid] = $appname;

// if(empty($id)&&empty($appid)&&empty($appname)){
// 	echo 1;
// }else{
// 	echo 0;
// }
?>