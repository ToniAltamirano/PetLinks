$(document).ready(function(){
    $('#subtipo>option').hide();
    $('#groupDetallesFactura').hide();

    $('#tipo').change(function(){
        var tipo = $('#tipo option:selected').val();
        $('#subtipo option:selected').prop('selected', false);
        if(tipo == "6"){
            $('#formGroupSubtipos').hide();
        }
        else{
            $('#formGroupSubtipos').show();
            $('#subtipo>option').hide();
            $('#subtipo>option[value="' + tipo + '"]').show();
        }
    });

    $('#centroReceptor').change(function(){
        var centro = $('#centroReceptor option:selected').val();

        if(centro == "otro"){
            $('#formGroupCentroReceptor').removeClass('col-xl-6');
            $('#formGroupCentroReceptor').addClass('col-xl-2');
            $('#groupOtroCentroReceptor').attr('hidden', false);
        }
        else{
            $('#formGroupCentroReceptor').removeClass('col-xl-2');
            $('#formGroupCentroReceptor').addClass('col-xl-6');
            $('#groupOtroCentroReceptor').attr('hidden', true);
        }
    });

    $('#hayFactura').change(function(){
        if($('#hayFactura').prop('checked')){
            $('#groupDetallesFactura').show();
        }
        else{
            $('#groupDetallesFactura').hide();
        }
    });

});
