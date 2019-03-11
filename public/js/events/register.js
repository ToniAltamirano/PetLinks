$(document).ready(function() {
    $('#username').on('keyup', function(){
        $('#result-username').html('<img src="images/loader.gif" />').fadeOut(1000);

        var username = $(this).val();
        var dataString = 'username='+username;

        $.ajax({
            type: "POST",
            url: "comprobar.php",
            data: dataString,
            success: function(data) {
                $('#result-username').fadeIn(1000).html(data);
            }
        });
    });
});
