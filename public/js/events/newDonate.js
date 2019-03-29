$(document).ready(function(){
    $('#subtipo>option').hide();
    $('#groupDetallesFactura').hide();

    $('#tipo').change(function(){
        var tipo = $('#tipo option:selected').val();
        $('#subtipo option:selected').prop('selected', false);
        if(tipo == "6"){
            $('#formGroupSubtipos').hide();
            $('#groupPeso').hide();
            $('#groupUnidades').hide();
            $('#subtipo>option').prop('selected', true);
        }
        else{
            $('#formGroupSubtipos').show();
            $('#groupPeso').show();
            $('#groupUnidades').show();
            $('#subtipo>option').hide();
            $('#subtipo>option[data-tipoId="' + tipo + '"]').show();
        }
    });

    $('#centroReceptor').change(function(){
        var centro = $('#centroReceptor option:selected').val();

        if(centro == "otro"){
            $('#formGroupCentroReceptor').removeClass('col-xl-6');
            $('#formGroupCentroReceptor').addClass('col-xl-2');
            $('#groupOtroCentroReceptor').attr('hidden', false);
            $('#otroCentroReceptor').prop('required', true);
        }
        else{
            $('#formGroupCentroReceptor').removeClass('col-xl-2');
            $('#formGroupCentroReceptor').addClass('col-xl-6');
            $('#groupOtroCentroReceptor').attr('hidden', true);
            $('#otroCentroReceptor').prop('required', false);
        }
    });

    $('#hayFactura').change(function(){
        if($('#hayFactura').prop('checked')){
            $('#groupDetallesFactura').show();
            $('#detallesFactura').prop('required', true);
        }
        else{
            $('#groupDetallesFactura').hide();
            $('#detallesFactura').prop('required', false);
        }
    });

    //opcion para decir si ya es donante o no
    $('input:radio[name="soyDonante"]').change(function(){
        if($('input:radio[name="soyDonante"]:checked').val() == "si"){
            $('#formGroupDonante').show();
            $('#btnAñadirDonante').attr('hidden', true);
        }
        else{
            $('#formGroupDonante').hide();
            $('#btnAñadirDonante').attr('hidden', false);
        }
    });

    $('#tipoDonante').change(function(){
        var tipo = $('#tipoDonante option:selected').val();

        if(tipo == 1){
            $('#groupCifDni').attr('hidden', true);
        }
        else{
            $('#groupCifDni').attr('hidden', false);

        }
    });


    $('#inputDNICIF').on('keyup', function(){
        var dni_cif = $(this).val();

        if(dni_cif != "" && dni_cif.length == 9){

            $.ajax({
                type: "GET",
                url: "donante/check/" + dni_cif,
                success: function(data) {
                    console.log(data);
                    if(data == "true"){
                        $('#inputDNICIF').addClass('is-valid');
                    }else{
                        $('#inputDNICIF').addClass('is-invalid');
                    }
                }
            });
        }
        else{
            $('#inputDNICIF').removeClass('is-valid');
            $('#inputDNICIF').removeClass('is-invalid');
        }
    });

});
