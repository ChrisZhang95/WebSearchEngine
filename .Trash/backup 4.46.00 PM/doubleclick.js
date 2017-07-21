
$(document).ready(function(){
	$(document).on('dblclick', '.switch', function(){
		var id = $(this).attr('id');
		var type = 'switch';
		//alert(id);
		// Returns successful data submission message when the entered information is stored in database.
		var dataString = 'id1='+ id +'&type=' + type;
		
		
		// AJAX Code To Submit Form.
		$.ajax({
			type: "POST",
			url: "dblclickajax.php",
			data: dataString,
			cache: false,
			success: function(result){
				alert(result);
			}
		});
		
		return false;
	});
	$(document).on('dblclick', '.computer', function(){
		var id = $(this).attr('id');
		var type = 'computer';
		//alert(id);
		// Returns successful data submission message when the entered information is stored in database.
		var dataString = 'id1='+ id +'&type=' + type;
		
		
		// AJAX Code To Submit Form.
		$.ajax({
			type: "POST",
			url: "dblclickajax.php",
			data: dataString,
			cache: false,
			success: function(result){
				alert(result);
			}
		});
		
		return false;
	});
	$(document).on('dblclick', '.cable', function(){
		var id = $(this).attr('id');
		var type = 'cable';
		// Returns successful data submission message when the entered information is stored in database.
		var dataString = 'id1='+ id +'&type=' + type;
		// AJAX Code To Submit Form.
		$.ajax({

			type: "POST",
			url: "dblclickajax.php",
			data: dataString,
			cache: false,
			success: function(result){
				alert(result);
			}
		});
		
		return false;
	});



});