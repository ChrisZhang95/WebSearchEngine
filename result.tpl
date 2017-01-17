
<!DOCTYPE html>
<html>
  <head>
    <script>
      function myFunction(word) {
          //var string = this.innerHTML;
          document.getElementById("inputbar").value = word;
      }
      </script>
    <!-- CSS Code -->
    <style>
      body {
        width: 100vw;
        height: 100vh;
        text-align: center;
        font-size: large;
        font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
        margin-top: 0.5%;
        margin-left: auto;
        margin-right: auto;
      }
      table {
        text-align: center;
        margin-left: auto;
        margin-right: auto;
        display: inline;
      }
      #inputbar {
        width: 400px;
        height: 40px;
        font-size: large;
      }

      #submitbutton {
        width: 100px;
        height: 40px;
        font-size:100%;
      }
      .left {
        float: left;
        margin-top: 0.8% 

      }
      .table {
        margin-left: 20%;
        float: left;
        clear: left;
      }
      button {
        height: 40px;
        width: 60px;
      }
      img {
        width: 200px;
        height:; 20px;
        float: left;
      }
      ul.pagination {
        display: inline-block;
        padding: 0;
        margin-bottom: : 5%;
      }

      ul.pagination li a{
          display: inline;
          color: black;
          float: left;
          padding: 8px 16px;
          text-decoration: none;
      }
  </style>
  <title>Magnifier</title>
  </head>
  

  <!--HTML Code -->
  <body>
      <div style="position: absolute;">
        <a href="http://34.192.184.201:8080/"> <img src="https://scontent-yyz1-1.xx.fbcdn.net/t31.0-8/14556777_1053917098039841_3701416755481522602_o.jpg"> </a>
        <form action="/" method="post"  class="left" autocomplete="off">
          <input id="inputbar" type="text" name="keywords"/>
          <button style="width: 90px;height: 46px;" id="submitbutton">Search</button><br>
        </form>
      

      <div  style="position: absolute; clear: left; margin-top: 80px">
      %import math
      %urlnum = 0
      %urlPerPage = 10
      %newDict = {}
      %if sortedDic != "ERROR":
        %for index, item in enumerate(sortedDic):
          <div style="text-align: left; margin-left: 60px;"><a href={{item[1]}}>{{item[1]}}</a></div>
          %urlnum += 1
          %newDict[index] = item[1]
        %end

        %pagenum = int(round(urlnum/urlPerPage)+1)
        %if pagenum < 1:
          %pagenum = 1
        %end
        <ul class="pagination", style="display: inline;color: black;float: left;padding: 8px 16px;text-decoration: none; text-align: left; margin-bottom: 40px;">
        %for i in range(pagenum):
          <li style="display: inline;color: black;float: left;padding: 8px 16px;text-decoration: none;text-align: left"><a>{{i+1}}</a></li>
        </ul>
        <div style="margin-top: 80px;">{{urlnum}} results found</div>
        %end
      %elif result != "":
        <div style="margin-left: 40px">{{result}}</div>
      %else:
        <div style="margin-left: 30px; font-size: 24;">No such keyword exists. Maybe click on one of these:</div>
        %for word in firstletterlist:
          <div  onclick="myFunction(this.innerHTML)" style="text-align: left; margin-left: 580px"">{{word}}</div>
        %end
        <a href="http://34.192.184.201:8080/">Go back to homepage</a>
      </div>
      %end
  </body>
</html>




