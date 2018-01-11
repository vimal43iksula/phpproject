
$(document).ready(function() {
    
  $('#search').click(function() {
      //alert('hii');exit;
    var keywords = $('#keyword').val();
   
      
      if(keywords != "") {
       
      $.ajax({
        url: "view.php",
       data: {keywords : keywords},
        type:"POST",
        success: function(se) {
            $(".resultDiv").html(se);          
        }
      });
    }
  });
  });
  
  
  
 