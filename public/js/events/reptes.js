$(document).ready(function(){
    $.ajax({
        type: "GET",
        url: "http://localhost:8080/PetLinks/public/api/cantidad/pienso",
        //url: "http://www.abp-politecnics.com/2019/daw/projecte02/dw05/public/api/cantidad/pienso
        dataType: "json",
        async: 'true',
        success: function(json) {
            console.log(json.cantidad);

            $('#progressBarPinso').text(json.cantidad + " kg").css('width', json.porcentage + "%");

        }
    });

    $.ajax({
        type: "GET",
        url: "http://localhost:8080/PetLinks/public/api/cantidad/dinero",
        //url: "http://www.abp-politecnics.com/2019/daw/projecte02/dw05/public/api/cantidad/dinero
        dataType: "json",
        async: 'true',
        success: function(json) {
            console.log(json.cantidad);
            console.log(json.porcentage);

            $('#progressBarDiners').text(json.cantidad + " €").css('width', json.porcentage + "%");

        }
    });
});
