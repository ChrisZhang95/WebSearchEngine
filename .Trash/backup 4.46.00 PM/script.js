$(document).ready(function(){
$(document).on('click', '.submit', function(){
	var submitid = $(this).attr('id');
	var num = submitid[6];
	var nameid = "name" + num;
	var formid = "form" + num;
	var computerid = "computer" + num;
	//alert(computerid);
	var name = $('#' + nameid).val();
	// Returns successful data submission message when the entered information is stored in database.
	var dataString = 'name1='+ name + '&hostname1=' + computerid;
	//alert(computerid);
	if(name=='' || nameid=='')
	{
	alert("Please Fill All Fields");
	}
	else
	{
	$('#' + formid).hide();

	// AJAX Code To Submit Form.
	$.ajax({
	type: "POST",
	url: "ajaxsubmit.php",
	data: dataString,
	cache: false,
	// success: function(result){
	// alert(result);
	// }
	});
	}
	return false;
});

$('#playground').mousedown(function(e){
          if(1 == e.which){
               $(".dropdown").next().css('visibility','hidden');
               $(".chooseApp").hide();
               // $("#contextMenu").fadeOut(80);//2017-7-17
               // $('#show-apps').fadeOut(80);//2017-7-17
          }
        });

//
$("#playground").click(function(){
		$("#contextMenu").fadeOut(80);
		$('#show-apps').fadeOut(80);
});
$(".container").click(function(){
		event.stopPropagation(); // 
});
$(".showApps").click(function(){
		event.stopPropagation(); //
});
});