<?php
$conn = mysql_connect("localhost", "root", "");
mysql_select_db("Network");


$update = mysql_query("UPDATE `IP_Address` SET `available`= 'true' WHERE `available` = 'false'", $conn);
// if(!$conn)
// 	echo "Error";
// else
// 	echo"Connected!";

// $result = mysql_query("SELECT INET_NTOA(address) FROM `IP_Address` WHERE address = '3232235521'", $conn);

// $row = mysql_fetch_array($result);
// echo "The address is ".$row["INET_NTOA(address)"];

?>