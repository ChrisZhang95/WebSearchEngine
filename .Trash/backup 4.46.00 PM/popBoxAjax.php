<?php
	$source2 = $_POST['source1'];
	$dest2 = $_POST['dest1'];
	//echo $source2." ".$dest2;
	require 'Cable.php';
	require 'Switch.php';
	session_start();
	$cabs = $_SESSION['cables'];
	$tcabs = unserialize($cabs);
	$numCab = count($tcabs);
	$myPhpValue = -1;
	for($i = 0; $i < $numCab; $i++){
		$comps = $tcabs[$i]->getComputers();
		//check connection between cables
		if(in_array($source2, $comps) && in_array($dest2, $comps) && $dest2 != $source2){
			$myPhpValue = 1;
			echo $myPhpValue;
			echo $tcabs[$i]->getName();
			return;
		}
		//check connection between computers connecting to the same switch
		else if(($comps[0] == $source2 && strlen($comps[1]) == 7)|| ($comps[1] == $source2 && strlen($comps[0]) == 7)){
			if(strlen($comps[1]) == 7){
				$switch1 = $comps[1];
			}
			else{
				$switch1= $comps[0];
			}
			for($j = 0; $j < $numCab; $j++){
				if($j != $i){
					$comps2 = $tcabs[$j]->getComputers();
					if(($comps2[0] == $dest2 && strlen($comps2[1]) == 7)|| ($comps2[1] == $dest2 && strlen($comps2[0]) == 7)){
						if(strlen($comps2[1]) == 7){
							$switch2 = $comps2[1];
						}
						else{
							$switch2 = $comps2[0];
						}
						//echo $switch1."   ".$switch2;
						if($switch1 == $switch2){
							$myPhpValue = 2;
							echo $myPhpValue;
							echo $tcabs[$i]->getName();
							echo $tcabs[$j]->getName();
							return;
						}
					}
				}
			}
		}
		
	}
	//$tcabs[$i]
	//$tcabs[$j]
	//check connection between multiple switches
	for($i = 0; $i < $numCab; $i++){
		$comps = $tcabs[$i]->getComputers();
		if(in_array($source2, $comps)){
			if(strlen($comps[1]) == 7){
				$switch1 = $comps[1];
			}
			else{
				$switch1= $comps[0];
			}
			for($j = 0; $j < $numCab; $j++){
				$comps2 = $tcabs[$j]->getComputers();
				if($comps2[0] == $switch1 && strlen($comps2[1]) == 7 || $comps2[1] == $switch1 && strlen($comps2[0]) == 7){
					if($comps2[0] != $switch1)
						$switch2 = $comps2[0];
					else
						$switch2  = $comps2[1];
					for($k = 0; $k < $numCab; $k++){
						$comps3 = $tcabs[$k]->getComputers();
						if($comps3[0] == $switch2 && $comps3[1] == $dest2 || $comps3[1] == $switch2 && $comps3[0] == $dest2){
							$myPhpValue = 3;
							echo $myPhpValue;
							echo $tcabs[$i]->getName();
							echo $tcabs[$j]->getName();
							echo $tcabs[$k]->getName();
							return;
						}
					}
					for($k = 0; $k < $numCab; $k++){
						$comps3 = $tcabs[$k]->getComputers();
						if($comps3[0] == $switch2 && strlen($comps3[1]) == 7 || $comps3[1] == $switch2 && strlen($comps3[0]) == 7){
							if($comps3[0] != $switch2)
								$switch3 = $comps3[0];
							else
								$switch3  = $comps3[1];
							for($l = 0; $l < $numCab; $l++){
								$comps4 = $tcabs[$l]->getComputers();
								if($comps4[0] == $switch3 && $comps4[1] == $dest2 || $comps4[1] == $switch3 && $comps4[0] ==$dest2){
									$myPhpValue = 4;
									echo $myPhpValue;
									echo $tcabs[$i]->getName();
									echo $tcabs[$j]->getName();
									echo $tcabs[$k]->getName();
									echo $tcabs[$l]->getName();
									return;
								}
							}
						}
					}
				}
			}
		}
	}
?>

