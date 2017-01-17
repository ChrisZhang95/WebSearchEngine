<!DOCTYPE html>
<html>
  
  <head>
  <!--jQuery code -->
  <script>
    function startTime() {
        var today = new Date();
        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();
        m = checkTime(m);
        s = checkTime(s);
        document.getElementById('txt').innerHTML =
        h + ":" + m + ":" + s;
        var t = setTimeout(startTime, 500);
    }
    function checkTime(i) {
        if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
        return i;
    }
  </script> 

<!-- CSS code -->

    <style>
      #mapPlaceholder {
        height: 300px;
        width: 400px;
        display: inline-block;
        margin-top: 2%;
      }
      body {
        text-align: center;
        font-size: x-large;
        font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
        margin-top: 0.5%;
        margin-left: auto;
        margin-right: auto;
      }
      #inputbar {
        width: 400px;
        height: 40px;
        font-size: large;
      }
      button {
        height: 40px;
        width: 60px;
      }
      #submitbutton {
        width: 90px;
        height: 40px;
        font-size: large;
      }
      img {
        width: 400px;
        height:; 20px;
      }
    </style>
    
    <!--<link rel='stylesheet' type='text/css' href='csc326.css'/>-->
    <title>Magnifier</title>
  </head>
  

<!--HTML code -->
  

  <body onload="startTime()">
    <!--logo image--> 
    <br>
    <br>
    <img src="https://scontent-yyz1-1.xx.fbcdn.net/t31.0-8/14556777_1053917098039841_3701416755481522602_o.jpg"> 
    <!--seach bar input-->
    <form action="/" method="post" autocomplete="off">
      <input id="inputbar" type="text" name="keywords"/>
      <button id="submitbutton" id="submitbutton">Search</button><br>
    </form>
        
    <div id="txt" style="margin-top: 5%; font-family: Arial; font-size: 24"></div>
    
   
    
  </body>
</html>




