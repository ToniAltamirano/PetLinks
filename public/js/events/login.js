function mostrarPassword() {
    var cambio = document.getElementById("inputPassword");
    if (cambio.type == "password") {
        cambio.type = "text";
        $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
    } else {
        cambio.type = "password";
        $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
    }
}

$('#inputPassword').focusin(function(){
    $('.input-group').addClass('special');
    $('#show_password').css('border-color', '#80bdff');
});

$('#inputPassword').focusout(function(){
    $('.input-group').removeClass('special');
    $('#show_password').css('border-color', '#ced4da');
});

