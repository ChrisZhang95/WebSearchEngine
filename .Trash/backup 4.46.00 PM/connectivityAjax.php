<?php 
	require 'Cable.php';
	session_start();
	$temp = $_SESSION['cables'];
	//$string = $_SESSION['string'];
	$string = '';
	$string2 = '';
	$t = unserialize($temp);
	for($i = 0; $i < sizeof($t); $i++){
		$comps = $t[$i]->getComputers();
		//echo $comps[0]."  ".$comps[1];
		if($comps[0] == "null" || $comps[1] == "null"){
			$string .= $i+1;
		}
		else {
			$string2 .= $i+1;
		}
	}
	echo $string.",";
	echo $string2;
	//echo $string;
?>
