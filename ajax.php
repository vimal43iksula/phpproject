<input type="text"><br><br>
<button>Search</button>
<p></p>
<script type="text/javascript">
    $(document).ready(function(){
        $("button").click(function(){

            $.ajax({
                type: 'POST',
                url: 'view.php',
                success: function(data) {
                    alert(data);
                    $("p").text(data);

                }
            });
   });
});
</script>


<?php 
        ;
 ?>