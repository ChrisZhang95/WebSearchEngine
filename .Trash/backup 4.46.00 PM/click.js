$(document).ready(function(){
    $('#showapps').click(function(e){
              // $(".dropdown").next().css('visibility','hidden');
               //$('#show-apps').fadeOut(80);
            $('#show-apps').css('left',e.pageX+50);
            $('#show-apps').css('top',e.pageY+25);
            $('#show-apps').fadeIn(100);
          
    });

    //single click to spawn items
    $('#computerNav').click(function(){
        var combine = $(' <img src="pics/computer.jpg" alt="myimage" class="computer" class="item" style="width: 10%; opacity: 0.5; z-index: 1;">');
        combine.draggable();
        $('#playground').append(combine);

        $('.computer').each(function(index){
            $(this).attr('id', 'computer' + (index+1));
        });        

        var num = $('.computer').length;
        //var formid = "form" + num;
        var computerid = "computer" + num;
        //alert(computerid);
        //var name = $('#' + nameid).val();
        // Returns successful data submission message when the entered information is stored in database.
        var dataString = 'hostname1=' + computerid;
        //alert(computerid);

        //$('#' + formid).hide();

        // AJAX Code To Submit Form.
        $.ajax({
        type: "POST",
        url: "ajaxsubmit.php",
        data: dataString,
        cache: false,
        success: function(result){
            //alert(result);
        }
        });
        return false;
    });

    $('#cableNav').click(function(){
        var img1 = $('<img src="pics/cable.jpg" alt="myimage" class="cable"  style="width:15%; z-index: 0; opacity: 0.5;">');
        img1.draggable();
        $('#playground').append(img1);
        $('.cable').each(function(index){
            $(this).attr('id', 'cable' + (index+1));
        });

        var num = $('.cable').length;
        var cableName = "cable" + num;
        var dataString = 'cable1='+ cableName;
        $.ajax({
            type: "POST",
            url: "cableAjax.php",
            data: dataString,
            cache: false,
            // success: function(result){
            // alert(result);
            // }
        });
        return false;

    });

    $('#switchNav').click(function(){
        //var img = $('<img src="pics/switch.jpg" alt="switch" class="switch"  style="width: 10%; z-index: 0; margin-left:5%; margin-top:3%; opacity: 0.5;">')
        var img = $('<div class=switch class="item" style="width: 9em; height: 20em; background-color: black;"><p>Switch</p></div>')
        img.draggable();
        $('#playground').append(img);
        $('.switch').each(function(index){
            $(this).attr('id', 'switch' + (index+1));
        });
        var num = $('.switch').length;
        var type = "addSw";
        var switchName = "switch" + num;
        var dataString = 'switch1='+ switchName +'&type1='+type;
        $.ajax({
            type: "POST",
            url: "switchAjax.php",
            data: dataString,
            cache: false,
            // success: function(result){
            // alert(result);
            // }
        });
        return false;
    });
    
    var intervalID;
    var go = false;
    var newround = true;
    // var temptimeRem;
    // var temptimeElap;
    // var temppacketRem;
    // var temppacketSent;
    // var tempframeRem;
    // var tempframeSent;


    $('#result').click(configureComps);
    $('#pause').click(stopTimer);
    $('#continue').click(continueTimer);

    function configureComps(){
        $( "#dialog" ).dialog();

        $('#popsubmit').click(function(){
            var source = false;
            var des = false;
            var sourceName = 'computer'+$('#sourcename').val();
            var desName = 'computer'+$('#destinationname').val();
            var dataString = 'source1='+ sourceName + '&dest1=' + desName;

            if(sourceName=="" && desName==""){
                alert('Please fill in all information');
            }
            else {
                var computers = [];
                $('.computer').each(function(i){
                    computers[i] = $(this).attr('id');
                });
                var size = computers.length;
                for(i = 0; i < size; i++){
                    if(sourceName == computers[i]){
                        source = true;
                    }
                    else if(desName == computers[i]){
                        des = true;
                    }
                }
                if (source == true && des == true){
    
                    var php;
                    $.ajax({
                        type: "POST",
                        url: 'popBoxAjax.php',
                        data: dataString,
                        cache: false,
                        success: function(result){
                            php = result[0];
                            alert(result);
                            var cableNum = result[6];
                            var cable1 = 'cable' + cableNum;
                            
                            //var start = $('#myPhpValue').val();
                            //alert(start);
                            if(php == 1){
                                //alert('I am here');
                                //startTimer();
                                $('#dialog').dialog('destroy');
                                type = "start";
                                var dataString1 = 'cable1='+ cable1 + '&type1=' + type;
                                $.ajax({
                                    type: "POST",
                                    url: "monitorAjax.php",
                                    data: dataString1,
                                    cache: false,
                                    success: function(result){
                                        var r = result;
                                        //alert(result);
                                        //$('#monitor').html(result);
                                        newround = true;
                                        startTimer(cable1, r);
                                    }
                                })
                            }
                            else if (php == 2){
                                $('#dialog').dialog('destroy');
                                var cableNum1 = result[6];
                                var cable1 = 'cable' + cableNum1;
                                var cableNum2 = result[12];
                                var cable2 = 'cable' + cableNum2;
                                //alert(cable1 + "  " + cable2);
                                type2 = 'start2';
                                var dataString5 = 'cable1='+ cable1 + '&cable2=' + cable2 + '&type1=' + type2;
                                $.ajax({
                                    type: "POST",
                                    url: "monitorAjax2.php",
                                    data: dataString5,
                                    cache: false,
                                    success: function(result){
                                        //alert(result);
                                        //$('#monitor').html(result);
                                        var r = result.split(",");
                                        var r1 = r[0];
                                        var r2 = r[1];
                                        newround = true;
                                        startTimer(cable1, r1);
                                        startTimer(cable2, r2);
                                    }
                                })

                            }
                            else if (php == 3){
                                //alert ('3');
                                $('#dialog').dialog('destroy');
                            }
                            else if (php ==4){
                                //alert('4');
                                $('#dialog').dialog('destroy');
                            }
                            else {
                                alert('Please make sure the two computers are connected');
                            }
                        }
                    });
                    
                }
                else{
                    alert('Please input the right hostnames');
                }
            }
        });
    }
    var interVal = [];
    function startTimer($cable, $r){
        if($cable == 'cable2')
            //alert($r);
        var finished = false;
        //alert('startTimer');
        var speed = $('#speed').val();
        if (speed === "") {
            speed = 1000;
        }
        else{
            speed = speed * 1000;
        }
        
        go = true;

        var numframe = 704088;
        var numpacket = 16002;
        if(newround == true){
            var timeRem = 8;
            var timeRemFixed = timeRem;
            var timeElap = 0;
            var packetRem = numpacket;
            var packetSent = 0;
            var frameRem = numframe;
            var frameSent = 0;
        }
        else{
            //alert('else');
            var dataString4 = 'cable1='+ $cable + '&index=' + $r ;
            $.ajax({
                type: "POST",
                url: "tempVarAjax.php",
                data: dataString4,
                cache: false,
                success: function(result){
                    //alert(result);
                    var r = result.split(",");
                    //alert(r);
                    timeRem = parseInt(r[0]);
                    timeElap = parseInt(r[1]);
                    packetRem = parseInt(r[2]);
                    frameRem = parseInt(r[3]);
                    packetSent = parseInt(r[4]);
                    frameSent = parseInt(r[5]);
                    timeRemFixed = 8;
                    //alert(timeRem + timeElap);
                }
            });

        }
        newround = false;
        var num = $cable[5];
        intervalID = setInterval(function() {

            if(!go)
                return;
                if(timeRem > 0){
                    timeRem = timeRem - 1;
                    if (timeRem < 0)
                        timeRem = 0;
                }
                //$('#mtimerem').html(timeRem + " s");
                //temptimeRem = timeRem;
                if(timeElap + 1 <= timeRemFixed){
                    timeElap = timeElap + 1;
                }
                else timeElap = timeRemFixed;
                //$('#mtimeelapse').html(timeElap + " s");
                //temptimeElap = timeElap;

                if(timeRem != 0){
                    packetRem = packetRem - 2001;
                    //alert(packetRem);
                    packetSent = packetSent + 2001;
                    frameRem = frameRem - 88011;
                    frameSent = frameSent + 88011;
                    var type2 = 'update';
                    var dataString2 = 'cable1='+ $cable + '&type1=' + type2 + '&timeRem=' + timeRem + '&timeElap=' + timeElap+ '&packetRem=' + packetRem + '&frameRem=' + frameRem + '&packetSent=' + packetSent + '&frameSent=' + frameSent + '&index=' + $r;
                    $.ajax({
                        type: "POST",
                        url: "monitorIndex.php",
                        data: dataString2,
                        cache: false,
                        success: function(result){
                            //alert(result);
                        }
                    });
                }
                else{
                    
                    packetRem = 0;
                    frameRem = 0;
                    packetSent = numpacket;
                    frameSent = numframe;
                    var type2 = 'update';
                    var dataString2 = 'cable1='+ $cable + '&type1=' + type2 + '&timeRem=' + timeRem + '&timeElap=' + timeElap+ '&packetRem=' + packetRem + '&frameRem=' + frameRem + '&packetSent=' + packetSent+ '&frameSent=' + frameSent + '&index=' + $r;

                    $.ajax({
                        type: "POST",
                        url: "monitorIndex.php",
                        data: dataString2,
                        cache: false,
                        success: function(result){
                            //alert(result);
                        }
                    });
                    newround = true;
                    //for (i = 0; i < interVal.length; i++) {
                        $num = $cable[5];
                        clearInterval(interVal[0]);
                        interVal.splice(0, 1 );
                        //alert('Simulation at ' + $cable + ' is finished');

                    //}
                    //window.clearInterval(intervalID);
                    finished = true;
                }
         }, speed);
        interVal.push(intervalID);
        //alert(interValArray);
    }

    function stopTimer(){
        go = false;
        for (i = 0; i < interVal.length; i++) {
            window.clearInterval(interVal[i]);
        }
    }

    function continueTimer(){
        $.ajax({
            type: "POST",
            url: "getCableAjax.php",
            //data: dataString3,
            cache: false,
            success: function(result){
                newround = false;
                var r = result.split(",");
                for(i = 0; i < r.length; i++){
                    startTimer(r[i]);
                }
            }
        });
        
    }





});
//----------------------------------------------------------







