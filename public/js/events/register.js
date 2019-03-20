$(document).ready(function() {
    $('#result-username').hide();
    $('#inputUsername').on('keyup', function(){
        var username = $(this).val();
        var dataString = 'username = ' + username;
        if(username != "" && username.length >= 4){

            $('#inputUsername').css('border-right', 'none');
            $('#inputUsername').css('border-top-right-radius', '0rem').css('border-bottom-right-radius', '0rem');
            $('#result-username').show();
            $('#result-username').html('<div class="material-icons spinner-grow text-secondary m-1" role="status"></div>');
            $.ajax({
                type: "GET",
                url: "register/check/" + username,
                success: function(data) {
                    console.log(data);
                    if(data == "true"){
                        $('#result-username').html('<i class="material-icons m-2">clear</i>');
                    }else{
                        $('#result-username').html('<i class="material-icons m-2" style="color:green">check</i>');
                    }
                }
            });
        }
        else{
            $('#inputUsername').css({'border-right':'1px', 'border-top-right-radius': '2rem', 'border-bottom-right-radius':'2rem'});
            $('#result-username').hide();

        }
    });
});

$('#inputUsername').focusin(function(){
    $('.input-group').addClass('special');
    $('#result-username').css('border-color', '#80bdff');

});

$('#inputUsername').focusout(function(){
    $('.input-group').removeClass('special');
    $('#result-username').css('border-color', '#ced4da');
});
