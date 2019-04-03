$("#inputImg").change(function (){
    if ($('#inputImg').get(0).files.length === 0) {
        $("#imgCampanya").addClass("d-none");
    } else {
        $("#imgCampanya").removeClass("d-none");
    }

    var fileName = $(this).val();
    $("#imgName").html(fileName);
    readURL(this);
});


function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#imgCampanya').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$(document).ready(function() {
    let img_title = $('#imgCampanya').data('img');
    if (img_title != "") {
        $("#imgName").html(img_title);
    }
});
