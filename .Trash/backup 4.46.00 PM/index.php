<?php 
session_start();
if (isset($_SESSION))
  session_destroy();
 ?>
<!DOCTYPE html>
<html>
<head>
<title>ECE 361 Computer Network</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js"></script>
<link href="style.css" rel="stylesheet">
<script src="script.js"></script>
<script src="collision.js"></script>
<script src="click.js"></script>
<script src="doubleclick.js"></script>
<script src="rightclick.js"></script>
<script src="udpClick.js"></script>

</head>
<body>
<!-- Required div Starts Here -->
<h1><strong>ECE361 Computer Networks</strong></h1>

<?php
// page1.php
require 'Computer.php';
require 'Monitor.php';
require 'Cable.php';
session_start();
$computers = array();
$cables = array();
$switch = array();
$_SESSION['string'] = serialize($cables);
$_SESSION['cables'] = serialize($cables);
$_SESSION['switchs'] = serialize($switch);
$_SESSION['computers'] = serialize($computers);
//$monitor = new Monitor();
$monitor = array();
//$_SESSION['monitor'] = serialize($monitor);
//$speed = 1024*1024*1024*8;
//$cable = new Cable($speed, "Cisco", "Cat6/6E", "RJ45");
//$_SESSION['cable'] = $cable;
?>
<form >
  	Simulation Speed:<br>
  	<input type="text" name="speed" id="speed">
  	<!-- <button type="button" onclick="alert('Hello world!')">Submit</button> -->
</form> 


<button id="result" disabled class="button" id="popbox">Start</button>
<button id="pause" disabled class="button" onclick="Continue()">Pause</button>
<button id="continue" disabled class="button">Continue</button>

<div id="dialog" style="display: none; background-color: #ff8533; ">
	<label style="padding-right: 9.9%; margin-top: 3%;">Source name :</label>
	<input id="sourcename" type="text" >
	<label>Destination name :</label>
	<input id="destinationname" type="text">
	<input id="popsubmit" type="button" value="Configure" style="margin-top: 3%; margin-left: 70%">
</div>

<form method="get" action="index.php" class="button">
    <input type="submit" value="Reset">
</form>

<?php
	include "connectSQL.php";
?>
<nav>
    <ul class="cf">
        <li><a href="#" id="computerNav">Computer</a></li>
        
        <li><a href="#" id="cableNav">Ethernet Cable</a></li>
        <li><a href="#" id="switchNav">Switch</a></li>
        <li><a href="#">Ethernet Card</a></li>  
    </ul>
</nav>		
<section id="playground">
	<div class="container" >
        <div id="contextMenu" class="context-menu" style="z-index: 3;">
          <ul>
          <li><div id="showapps" class="menuItem">Applications</div></li>
          </ul>
          
        </div>
  </div>
  <div class="showApps" id="show-apps" style="z-index: 4; text-align: center; position: absolute;">
          <ul style="list-style: none; position: relative; right: 20%;">
          <li><div id="app1" class="app-items" >app1</div></li>
          <li><div id="app2" class="app-items" >app2</div></li>
          </ul>
   </div>

</section>
<section id="monitor">
	<h2>Monitor</h2>

</section>
<section style="display: none;" id="php">
    false
</section>
<section style="display: none;" id="php1">
  
</section>
<script type="text/javascript">
  $(document).ready(function(){
 var currentObj;
 //rightclick
 $("body").on("mousedown",".computer", function(e) {
     if (3 == e.which) {
      currentObj = $(this).parent();
      console.log(currentObj.html());
    }
 });
 //data li
 $(".showApps ul li").click(function(){
    //alert('hi');
    var id=$(this).children("div").attr('id');
     var app=$(this).children("div").html();
     var computerid=currentObj.children(".computer").attr('id');
     currentObj.children(".chooseApp").find("."+id).remove();
     var html='<div class="'+id+'">'+app+'</div>'
     // currentObj.children(".chooseApp").append(html);

    $.post("addComputer.php",{'id':computerid,'appid':id,'appname':app},function(result){
        //alert(result);
    });


});

$("body").on("dblclick",".computer", function() {
  $(this).parent().children(".chooseApp").show();
 });

 });
 </script>
 
 
 </body>
</html>


<script>
function Continue() {
    $('#continue').removeAttr("disabled");
}
</script>
