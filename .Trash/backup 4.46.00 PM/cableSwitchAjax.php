<?php
$type2 = $_POST['type'];




if($type2 == 'insertSwitch'){

	$id2=$_POST['switch1'];
	$cable2=$_POST['cable1'];
	require 'Cable.php';
	session_start();
	$temp = $_SESSION['cables'];
    $index = $id2[6];
    $num = $cable2[5];
    //echo $index;
	$t = unserialize($temp);
	$compName = 'switch'.$index;
	$switches = $t[$num - 1]->getComputers();
	if (!in_array($compName, $switches)) 
		$t[$num - 1]->setComputer($compName);
	$_SESSION['cables'] = serialize($t);

}
else if($type2 == 'deleteSwitch'){

	$id2=$_POST['switch1'];
	$cable2=$_POST['cable1'];
	require 'Cable.php';
	session_start();
	$temp = $_SESSION['cables'];
    $index = $id2[6];
    $num = $cable2[5];
    echo $index;
	$t = unserialize($temp);
	$compName = 'switch'.$index;
	$t[$num - 1]->deleteComputer($compName);
	$_SESSION['cables'] = serialize($t);

}

?>