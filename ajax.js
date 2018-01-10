

    $(document).ready(function(){
        $(".search").click(function(){

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

