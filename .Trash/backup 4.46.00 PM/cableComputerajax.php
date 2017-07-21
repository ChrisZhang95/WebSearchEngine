<?php
$type2 = $_POST['type'];
$phpCableComp = false;

if($type2 == 'insertComp'){
	$id2=$_POST['comp1'];
	$cable2=$_POST['cable1'];
	require 'Cable.php';
	require 'Computer.php';
	session_start();
	$temp = $_SESSION['cables'];
	$temp2 = $_SESSION['computers'];
    $index = $id2[8];
    $num = $cable2[5];
    
	$t = unserialize($temp);
	$t2 = unserialize($temp2);
	$compCable = $t2[$index-1]->getCable();
	//var_dump($t2);
	$compName = 'computer'.$index;
	$computers = $t[$num - 1]->getComputers();
	if($compCable == $cable2){
		if(!in_array($compName, $computers))
			$t[$num - 1]->setComputer($compName);
	}
	$_SESSION['cables'] = serialize($t);
}

else if($type2 == 'deleteComp'){
	//echo " I am here";
	$id2=$_POST['comp1'];
	$cable2=$_POST['cable1'];
	require 'Cable.php';
	session_start();
	$temp = $_SESSION['cables'];
    $index = $id2[8];
    $num = $cable2[5];
    //echo $index;
	$t = unserialize($temp);
	$compName = 'computer'.$index;
	$t[$num - 1]->deleteComputer($compName);
	$_SESSION['cables'] = serialize($t);
}
else if($type2 == 'insertCableComputer'){
	$id2=$_POST['comp1'];
	$cable2=$_POST['cable1'];
	require 'Computer.php';
	require 'Cable.php';
	session_start();
	$temp = $_SESSION['computers'];
    $index = $id2[8];
    $num = $cable2[5];
	$t = unserialize($temp);
	$temp1 = $_SESSION['cables'];
	$cab1 = unserialize($temp1);
	//echo $cab1[$num - 1]->getComputers()[0]. " ".$cab1[$num - 1]->getComputers()[1];
	if($cab1[$num - 1]->getComputers()[0] == 'null' || $cab1[$num - 1]->getComputers()[1] == 'null'){
		if($t[$index - 1]->getCable() == 'null')
			$t[$index - 1]->setCable($cable2);
	}
	$_SESSION['computers'] = serialize($t);

	$string = "";
	$string2 = "";
	$temp3 = $_SESSION['computers'];
	$t3 = unserialize($temp);
	for($i = 0; $i < sizeof($t3); $i++){
		$cable = $t3[$i]->getCable();
		//echo $comps[0]."  ".$comps[1];
		if($cable == "null"){
			$string .= $i+1;
		}
		else {
			$string2 .= $i+1;
		}
	}
	echo $string.",";
	echo $string2;

}
else if($type2 == 'deleteCableComputer'){
	$id2=$_POST['comp1'];
	//$cable2=$_POST['cable1'];
	require 'Computer.php';
	session_start();
	$temp = $_SESSION['computers'];
    $index = $id2[8];
    $num = $cable2[5];
	$t = unserialize($temp);
	$compName = 'null';
	$t[$index - 1]->setCable($compName);
	$_SESSION['computers'] = serialize($t);

}
?>
