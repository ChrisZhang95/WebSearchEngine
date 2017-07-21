$(document).ready(function(e){
	var interVal = [];
$(document).on('contextmenu', '.cable', function(){
	
	clearInterval(interVal[0]);
    interVal.splice(0, 1 );
	var id = $(this).attr('id');
	var type = 'rightclk';
	var dataString1 = 'cable1='+ id + '&type1=' + type;
	var speed = $('#speed').val();

    if (speed === "") {
        speed = 1000;
    }
    else{
        speed = speed * 1000;
    }
    intervalID = setInterval(function() {
		$.ajax({
		    type: "POST",
            url: "monitorRightClk.php",
            data: dataString1,
            cache: false,
		}).done(function(data) {
			//alert(data);
			$('#monitor').html(data);    
		});
	}, 1000);
	interVal.push(intervalID);
	return false;
});

$(document).on('contextmenu', '.computer', function(e){
	var id = $(this).attr('id');
	var num = id[8]
	$('#application'+ num).css('display','initial');
	// Returns successful data submission message when the entered information is stored in database.
	var dataString = 'id1='+ id;
	$("#contextMenu").css('left',e.pageX+10);
	$("#contextMenu").css('top',e.pageY+10);
	$("#contextMenu").fadeIn(100);
	return false;
});



});