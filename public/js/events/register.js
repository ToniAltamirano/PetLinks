$(document).ready(function() {
    $('#inputUsername').on('keyup', function(){
        $('#result-username').html('<div class="spinner-grow text-secondary" role="status"><span class="sr-only">Loading...</span></div>');

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
