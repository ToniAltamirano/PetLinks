$(document).ready(function() {
    $('#result-username').hide();
    $('#inputUsername').on('keyup', function(){
        var username = $(this).val();
        var dataString = 'username = ' + username;
        if(username != ""){
            $('#inputUsername').css('border-top-right-radius', '0').css('border-bottom-right-radius', '0');
            $('#result-username').show();
            $('#result-username').html('<div class="spinner-grow text-secondary m-1" role="status"></div>');
            $.ajax({
                type: "GET",
                url: "register/check/" + username,
                success: function(data) {
                    console.log(data);
                    if(data == "true"){
                        $('#result-username').html('<i class="material-icons m-2" style="color:red">clear</i>');
                    }else{
                        $('#result-username').html('<i class="material-icons m-2" style="color:green">check</i>');
                    }
                }
            });
        }
        else{
            $('#inputUsername').css('border-top-right-radius', '2rem').css('border-bottom-right-radius', '2rem');
            $('#result-username').hide();
        }

    });


});
