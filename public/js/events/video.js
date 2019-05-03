$(document).ready(function(){

    $('.Question').hide();

});

var video = document.getElementById( 'video' );

video.addEventListener("timeupdate", function(){
    if(this.currentTime >= 79) {
        this.pause();
        $('.Question').show();
    }
});

$('#si').on('click', function(event) {
    video.currentTime = 0;
    video.play();
    $('.Question').hide();
});

$('#no').on('click', function(event) {
    $('.Question').hide();
});

$('#Inici').on('click', function(event) {
    video.currentTime = 0;
    video.play();
});

$('#GPP').on('click', function(event) {
    video.currentTime = 24;
    video.play();
});

$('#Gatos').on('click', function(event) {
    video.currentTime = 44;
    video.play();
});
