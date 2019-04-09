$('#sidebarCollapse').on('click', function () {
    //$('#sidebar').toggleClass('active');
    if($('#sidebar').css('margin-left') == "0px"){
        $('#sidebar').css('margin-left', $('#sidebar').width()*-1);
    } else {
        $('#sidebar').css('margin-left', "0px");
    }
});
