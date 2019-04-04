$("#inputImg").change(function (){
    if ($('#inputImg').get(0).files.length === 0) {
        $("#imgCentre").addClass("d-none");
    } else {
        $("#imgCentre").removeClass("d-none");
    }

    var fileName = $(this).val();
    $("#imgName").html(fileName);
    readURL(this);
});


function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#imgCentre').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$(document).ready(function() {
    let img_title = $('#imgCentre').data('img');
    if (img_title != "") {
        $("#imgName").html(img_title);
    }
});
