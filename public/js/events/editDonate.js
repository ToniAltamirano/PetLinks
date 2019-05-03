$(document).ready(function(){
    //dependiendo del tipo de donacion se muestran o se ocultan los subtipos
    if($('#tipo option:selected').val() == "6"){
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
        $('#subtipo>option[data-tipoId="' + $('#tipo option:selected').val() + '"]').show();
    }

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

    //esta parte del formulario cambia si se escoje un centro existente en la bd o uno que no esta
    if($('#centroReceptor option:selected').val() == "otro"){
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

    //si hay factura se puede escojer un archivo
    $('#hayFactura').change(function(){
        if($('#hayFactura').prop('checked')){
            $('#groupDetallesFactura').show();
            //$('#detallesFactura').prop('required', true);
        }
        else{
            $('#groupDetallesFactura').hide();
            //$('#detallesFactura').prop('required', false);
        }
    });

    if($('#hayFactura').prop('checked')){
        $('#groupDetallesFactura').show();
        //$('#detallesFactura').prop('required', true);
    }
    else{
        $('#groupDetallesFactura').hide();
        //$('#detallesFactura').prop('required', false);
    }

    //para el cambio de imagen de la factura
    $("#detallesFactura").change(function (){
        var fileName = $(this).val();
        $("#facturaName").html(fileName);
        readURL(this);
    });
});
