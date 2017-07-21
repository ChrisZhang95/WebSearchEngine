


$(document).ready(function(){

	function collision($div1, $div2) {
      var x1 = $div1.offset().left;
      var y1 = $div1.offset().top;
      var h1 = $div1.outerHeight(true);
      var w1 = $div1.outerWidth(true);
      var b1 = y1 + h1;
      var r1 = x1 + w1;
      var x2 = $div2.offset().left;
      var y2 = $div2.offset().top;
      var h2 = $div2.outerHeight(true);
      var w2 = $div2.outerWidth(true);
      var b2 = y2 + h2;
      var r2 = x2 + w2;
        
      if (b1 < y2 || y1 > b2 || r1 < x2 || x1 > r2) return false;
      return true;
    }
  var start = false;

  window.setInterval(function() {
    
      
      $('.switch').each(function(index){
          var switchid = $(this).attr('id');
          var numCollision = $('.cable').length;
          $('.cable').each(function(j){
              var k = j + 1;
              if(!collision($('#' + switchid), $('#cable' + k))){
                  numCollision--;
                  var type = 'deleteCable1';
                  var cableid = 'cable' + k;
                  var dataString = 'switch1=' + switchid + '&cable1=' + cableid + '&type1=' + type;
                  $.ajax({
                    type: "POST",
                    url: "switchAjax.php",
                    data: dataString,
                    cache: false,
                    // success: function(result){
                    //   alert(result);
                    // }
                  });
              }
              else {
                //alert('hi');
                  var type = 'addCable';
                  var cableid = 'cable' + k;
                  var dataString = 'switch1=' + switchid + '&cable1=' + cableid + '&type1=' + type;
                  $.ajax({
                    type: "POST",
                    url: "switchAjax.php",
                    data: dataString,
                    cache: false,
                    // success: function(result){
                    //   alert(result);
                    // }
                  });
              }
          });
          if(numCollision >= 2){
            $('#' + switchid).css({ opacity: 1});
            cables_switch = true;
          }
          else{
            $('#' + switchid).css({ opacity: 0.5});
            cables_switch = false;
          }
      });

      $('.computer').each(function(index){
        var computerid = $(this).attr('id');
        var numCollision = $('.cable').length;
        $('.cable').each(function(j){
          var k = j + 1;
          var unattached;
          var attached;
          if(!collision($('#' + computerid), $('#cable' + k))){
                  numCollision--;
          }
          else{
              var cableid = 'cable' + k;
              //alert(cableid)
              var type = "insertCableComputer";
              var dataString = 'comp1=' + computerid + '&cable1=' + cableid + '&type=' + type;
                $.ajax({
                  type: "POST",
                  url: "cableComputerajax.php",
                  data: dataString,
                  cache: false,
                  success: function(result){
                     //alert(result);
                      var r = result.split(",");
                      var unattached = r[0];
                      var attached = r[1];
                      //alert(attached);
                  }
                });
          }
        });
        if(numCollision >= 1){
          $('#' + computerid).css({ opacity: 1 });
          //cables_computers = true;
        }

        else{
          $('#' + computerid).css({ opacity: 0.5 });
              var type = "deleteCableComputer";
              var dataString = 'comp1=' + computerid +'&type=' + type;
                $.ajax({
                  type: "POST",
                  url: "cableComputerajax.php",
                  data: dataString,
                  cache: false,
                });
        }
      });

      $('.cable').each(function(i){
          var cableid = $(this).attr('id');
          var numCollision = $('.computer').length + $('.switch').length;
          $('.computer').each(function(j){
            var k = j+1;
            if(!collision($('#' + cableid), $('#computer' + k))){
                numCollision--;
                var data1 = 'computer' + k;
                var type = 'deleteComp';
                //alert(data);
                var dataString = 'comp1=' + data1 + '&cable1=' + cableid + '&type=' + type;
                $.ajax({
                  type: "POST",
                  url: "cableComputerajax.php",
                  data: dataString,
                  cache: false,
                });
            }
            else{
                var data1 = 'computer' + k;
                var type = 'insertComp';
                //alert(data);
                var dataString = 'comp1=' + data1 + '&cable1=' + cableid + '&type=' + type;
                $.ajax({
                  type: "POST",
                  url: "cableComputerajax.php",
                  data: dataString,
                  cache: false,
                  // success: function(result){
                  //   alert(result);
                  // }
                });
            }
          });

          $('.switch').each(function(j){
              var k = j+1;
              if(!collision($('#' + cableid), $('#switch' + k))){
                  numCollision--;
                  var data1 = 'switch' + k;
                  var type = 'deleteSwitch';
                  //alert(data);
                  var dataString = 'switch1=' + data1 + '&cable1=' + cableid + '&type=' + type;
                  $.ajax({
                    type: "POST",
                    url: "cableSwitchAjax.php",
                    data: dataString,
                    cache: false,
                    // success: function(result){
                    //   alert(result);
                    // }
                  });
              }
              else {
                  var data1 = 'switch' + k;
                  var type = 'insertSwitch';
                  //alert(data);
                  var dataString = 'switch1=' + data1 + '&cable1=' + cableid + '&type=' + type;
                  $.ajax({
                    type: "POST",
                    url: "cableSwitchAjax.php",
                    data: dataString,
                    cache: false,
                    // success: function(result){
                    //   alert(result);
                    // }
                  });
              }

          });
          var attached="";
          var unattached="";
          var index;

          $.ajax({
            type: "POST",
            url: 'connectivityAjax.php',
            //data: dataString,
            cache: false,
            success: function(result){
              //alert(result);
              for(i = 0; i < result.length; i++){
                if(result[i] ==','){
                  //alert('hello');
                  index = i;
                  break;
                }
              }
              //alert(index);
              if(index == 0)
                unattached = "";
              else{
                for(i = 0; i < index; i++){
                  unattached += result[i];
                }
              }

              for(i = index + 1; i < result.length; i++){
                attached += result[i];
              }
              //alert(unattached);
              //alert(attached);
              if(attached.length != 0){
                $('#result').removeAttr("disabled");
                $('#pause').removeAttr("disabled");
                //alert('hi');
              }
              for(i=0; i < unattached.length; i++){
                var id = unattached[i];
                var cableId = 'cable' + id;
                $('#'+cableId).css({ opacity: 0.5 });
              }
              for(i=0; i < attached.length; i++){
                var id = attached[i];
                //alert(id);
                var cableId = 'cable' + id;
                $('#'+cableId).css({ opacity: 1 });
              }
            }
          });

          
          // if(numCollision >= 2){
          //   //alert(numCollision);
          //     $('#'+cableid).css({ opacity: 1 });
          //     $('#result').removeAttr("disabled");
          //     $('#pause').removeAttr("disabled");
          //     //start = true;
          // }
          // else {
          //     $('#'+cableid).css({ opacity: 0.5 });
          // }
      });
      
      var num = 0;
      $('.cable').each(function(index){
          var opacity = $(this).css("opacity");
        //alert(opacity);
        if(opacity == 0.5)
          num++;
      });
      if(num == $('.computer').length){
        $('#result').attr('disabled', 'disabled');
        $('#pause').attr('disabled', 'disabled');
      }

    }, 200);
});



    





