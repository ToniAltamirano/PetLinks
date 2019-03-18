$(document).ready(function() {
    $('#inputUsername').on('keyup', function(){
        //$('#result-username').html('<img src="images/loader.gif" />').fadeOut(1000);

        var username = $(this).val();
        var dataString = 'username = ' + username;

        $.ajax({
            type: "GET",
            url: "register/check/" + username,
            //url: "{{ http://localhost:8080/Petlinks/public/register/check/ }}" + username,
            success: function(data) {
                console.log(data);
                $('#result-username').fadeIn(1000).html(data);
            }
        });
    });
});
