$(document).ready(function(){

 $(document).on('click', '.udp', function(){
        var id = $(this).attr('id');
        var num = id[3];
        $('#protocol'+ num).css('visibility','hidden');
        $('#protocol'+ num).css('display','none');
        //alert(num);
        var dataString = 'id1='+ id;
        
        
        //AJAX Code To Submit Form.
        $.ajax({
         type: "POST",
         url: "udpAjax.php",
         //data: dataString,
         cache: false,
         success: function(result){
             alert(result);
         }
        });
        
         return false;
    });
 $(document).on('click', '.application', function(){
        var id = $(this).attr('id');
        var num = id[11];
        $('#protocol'+ num).css('visibility','hidden');
        $('#protocol'+ num).css('display','none');
        //alert(num);
        var dataString = 'id1='+ id;
        
        
        //AJAX Code To Submit Form.
        $.ajax({
         type: "POST",
         url: "applicationAjax.php",
         //data: dataString,
         cache: false,
         success: function(result){
             alert(result);
         }
        });
        
         return false;
    });
});