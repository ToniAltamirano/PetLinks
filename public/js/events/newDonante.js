$(document).ready(function(){

    $('.particulares').hide();
    $('.empresas').hide();


    //Cuando cambiamos
    $('#tipoDonante').change(function(){
        var tipo = $('#tipoDonante option:selected').val();
        if(tipo == "2"){
            $('.empresas').hide();
            $('.particulares').show();
            $('.general').show();
            $('.general2').show();

        }else if(tipo == 3){
            $('.particulares').hide();
            $('.empresas').show();
            $('.general').show();
            $('.general2').show();
        }else{
            $('.particulares').hide();
            $('.empresas').hide();
            $('.general').hide();
            $('.general2').hide();
        }

    });

    //Cuando venimos del edit y ya tenemos uno seleccionado 
    var tipo = $('#tipoDonante option:selected').val();
    if(tipo == "2"){
        $('.empresas').hide();
        $('.particulares').show();
        $('.general').show();
        $('.general2').show();

    }else if(tipo == 3){
        $('.particulares').hide();
        $('.empresas').show();
        $('.general').show();
        $('.general2').show();
    }else{
        $('.particulares').hide();
        $('.empresas').hide();
        $('.general').hide();
        $('.general2').hide();
    }

  

    $('#vincleEntitat').change(function(){
        var tipo = $('#vincleEntitat option:selected').val();
        if(tipo == 1){
            $('#infoVincle').attr('hidden', false);
        }
        else{
            $('#infoVincle').attr('hidden', true);
        }

    });

    $('#esColaborador').change(function(){
        var tipo = $('#colaborador option:selected').val();
        if(tipo == 1){
            $('#tipusColaborador').attr('hidden', false);
        }
        else{
            $('#tipusColaborador').attr('hidden', true);
        }

    });

    var tipo = $('#colaborador option:selected').val();
    if(tipo == 1){
        $('#tipusColaborador').attr('hidden', false);
    }
    else{
        $('#tipusColaborador').attr('hidden', true);
    }

    // $('#tieneAnimalesdiv').change(function(){
    //     var tieneAnimales = $('#tieneAnimalesdiv option:selected');
    //     if(tieneAnimales == 1){
    //         $('#animalesdiv').attr('hidden', false);
    //     }
    //     else{
    //         $('#animalesdiv').attr('hidden', true);
    //     }
    // });


    //Edit blade



});
