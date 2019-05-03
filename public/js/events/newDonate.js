$(document).ready(function(){
    $('#subtipo>option').hide();
    $('#groupDetallesFactura').hide();

    //dependiendo del tipo de donacion se muestran o se ocultan los subtipos
    $('#tipo').change(function(){
        var tipo = $('#tipo option:selected').val();
        $('#subtipo option:selected').prop('selected', false);
        if(tipo == "6"){
            $('#formGroupSubtipos').hide();
            $('#groupPeso').hide();
            $('#groupUnidades').hide();
            $('#subtipo>option').prop('selected', true);
            $('#coste').prop('required', true);
        }
        else{
            $('#formGroupSubtipos').show();
            $('#groupPeso').show();
            $('#groupUnidades').show();
            $('#subtipo>option').hide();
            $('#subtipo>option[data-tipoId="' + tipo + '"]').show();
            $('#coste').prop('required', false);
        }
    });

    //esta parte del formulario cambia si se escoje un centro existente en la bd o uno que no esta
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

    //si el donante es anonimo no cal que introduzca ningun dato
    $('#tipoDonante').change(function(){
        var tipo = $('#tipoDonante option:selected').val();

        if(tipo == 1){
            $('#infoDonante').attr('hidden', true);
            $('#donante').val('anonimo');
            $('#resultDonantes').prop('required', false);
        }
        else{
            $('#infoDonante').attr('hidden', false);
            $('#donante').val('no_anonimo');
            $('#resultDonantes').prop('required', true);
        }

        console.log($('#donante').val());
    });

    //consulta para comprobar el donante
    $('#btnBuscarDonante').on('click', function(){
        $('#resultDonantes').removeClass('is-valid');
        $('#resultDonantes').removeClass('is-invalid');
        var dni_cif = $('#inputDNICIF').val();
        var nombre = $('#inputNombre').val();
        var apellidos = $('#inputApellidos').val();
        var email = $('#inputEmail').val();
        var telefono = $('#inputTelefono').val();

        if(dni_cif == ""){
            dni_cif = null;
        }
        if(nombre == ""){
            nombre = null;
        }
        if(apellidos == ""){
            apellidos = null;
        }
        if(email == ""){
            email = null;
        }
        if(telefono == ""){
            telefono = null;
        }

        $.ajax({
            type: "GET",
            url: "donante/check/" + dni_cif + "/" + nombre + "/" + apellidos + "/" + email + "/" + telefono,
            success: function(data) {
                console.log(data);
                if(data != null){
                    if(data.length > 0){
                        $('#resultDonantes').html("");
                        data.forEach(donante => {
                            $('#resultDonantes').append(new Option(donante.nombre + ";" + donante.apellidos + ";" + donante.cif + ";" + donante.telefono + ";" + donante.correo, donante.id));
                        });
                        $('#resultDonantes').addClass('is-valid');
                    }
                    else{
                        $('#resultDonantes').addClass('is-invalid');
                    }
                }
            }
        });
    });

    $('#formInsert').on('submit', function(e){
        if($('#resultDonantes').hasClass('is-invalid')){
            e.preventDefault();
            $('#resultDonantes').focus();
        }
    });

    //mostrar los precios estimados de los subtipos
    $('#subtipo').change(function(){
        //console.log('subtipo cambiado: ' + $('#subtipo>option:selected').data('coste'));
        //si el valor es un numero lo ponemos en el input. No lo pondremos cuando el valor no sea un numero(undefined, null, string, etc)
        if(isNaN($('#subtipo>option:selected').data('coste')) == false){
            $('#coste').val($('#subtipo>option:selected').data('coste'));
        }
        else{
            $('#coste').val("");
        }
    });

});
