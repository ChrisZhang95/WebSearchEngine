<?php

$conn = mysql_connect("localhost", "root", "");
mysql_select_db("Network");
//Fetching Values from URL
//$name2=$_POST['name1'];
$hostname = $_POST['hostname1'];

require 'Computer.php';
session_start();

$result = mysql_query("SELECT INET_NTOA(address), address, available FROM `IP_Address`", $conn);

while ($row = mysql_fetch_array($result)) {
    if ($row["available"] == 'true'){

    	//adding a new computer to global variable
    	$computer = new Computer($row["INET_NTOA(address)"], $hostname);
    	$temp = $_SESSION['computers'];
        $index = $hostname[8];
    	$t = unserialize($temp);
        $num = count($t);
        if($num < $index -1){
            for($i = 0; $i < $index -1; $i++){
                $t[$i] = $i;
            }
            array_push($t, $computer);
        }
        else if($num > $index){
            $t[$index-1] = $computer;
        }
        else array_push($t, $computer);
    	//var_dump($t);
    	$_SESSION['computers'] = serialize($t);
        //------
        $temp = $_SESSION['computers'];
        $t = unserialize($temp);
        var_dump($t);
        //----
    	$update = mysql_query("UPDATE `IP_Address` SET `available`= 'false' WHERE `address` = ".$row["address"], $conn);
   		return;
    }
}
//UPDATE `IP_Address` SET `available`= 'false' WHERE `address` = 3232235521


//mysql_close($connection); // Connection Closed


?>