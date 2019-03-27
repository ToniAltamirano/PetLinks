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

});
