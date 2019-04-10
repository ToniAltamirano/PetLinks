$(document).ready(function () {
    var lan;
    var rowsSelect;
    if(opcionesLenguaje == 'es'){
        lan = "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json";
        rowsSelect = "%d filas seleccionadas";
    }else if(opcionesLenguaje == 'en'){
        lan = "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/English.json";
        rowsSelect = "%d rows selected";
    }else{
        lan = "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Catalan.json";
        rowsSelect = "%d files seleccionades";
    }


    var table = $('#tablePag').DataTable({
        language: {
            "url": lan,
            select: {
                rows: rowsSelect
            }
        },
        dom: 'lBfrtip',
        buttons: [{
                    extend: 'copy',
                    text: '',
                    className: 'bg-secondary ml-4',
                    key: {
                        key: 'c',
                        altKey: true
                    }
                }, {
                    extend: 'excel',
                    text: '',
                    title: titulo,
                    className: 'btn bg-secondary'
                }, {
                    extend: 'pdf',
                    text: '',
                    title: titulo,
                    className: 'bg-secondary'
                }, {
                    extend: 'print',
                    text: '',
                    className: 'bg-secondary'
                }
        ],
        select: true
    });

    //Aplicar filtro cuando se cambia el valor
    $('#filtro').on("click", function() {
        table.draw();
    });

     //Aplicar filtroDonantes cuando se cambia el valor
    $('#filtroDonantes').on("click", function() {
        table.draw();
    });

    //Aplicar filtroDonaciones cuando se cambia el valor
    $('#filtroDonaciones').on("click", function() {
        table.draw();
    });
});

//Función que filtra por el tipo de usuarios
$('#filtro').on('click', function(){

    $.fn.dataTableExt.afnFiltering.push(
    function( settings, data, dataIndex ) {
        var tipoInput = document.getElementById('innputRol').value;
        var type = data[5];
        if ( tipoInput == type || tipoInput == 0)
        {
            return true;
        }
        return false;
    }
    );

    $('#exampleModalCenter').modal('toggle');
});

//Filtramos la tabla de donantes, con las valores marcados
$('#filtroDonantes').on('click', function(){

    // Filtro tipo donante
    $.fn.dataTableExt.afnFiltering.push(
        function( settings, data, dataIndex ) {
            var tipoInput = document.getElementById('tipoDonante').value;
            var type = data[2];
            if ( tipoInput == type || tipoInput == 0)
            {
                return true;
            }
            return false;
        }
    );

    // Filtro es_habitual
    $.fn.dataTableExt.afnFiltering.push(
        function( settings, data, dataIndex ) {
            var tipoInput = document.getElementById('habitual').value;
            var type = data[3];
            if ( tipoInput == type || tipoInput == 0)
            {
                return true;
            }
            return false;
        }
    );

    // Filtro es_habitual
    $.fn.dataTableExt.afnFiltering.push(
        function( settings, data, dataIndex ) {
            var tipoInput = document.getElementById('tieneAnimales').value;
            var type = data[4];
            if ( tipoInput == type || tipoInput == 0)
            {
                return true;
            }
            return false;
        }
    );

    // Filtro es_habitual
    $.fn.dataTableExt.afnFiltering.push(
        function( settings, data, dataIndex ) {
            var tipoInput = document.getElementById('inputPoblacion').value;
            var type = data[5];
            if ( type.match(tipoInput) || tipoInput == '')
            {
                return true;
            }
            return false;
        }
    );

    // Filtro es_habitual
    $.fn.dataTableExt.afnFiltering.push(
        function( settings, data, dataIndex ) {
            var tipoInput = document.getElementById('inputPais').value;
            var type = data[6];
            if ( type.match(tipoInput) || tipoInput == '')
            {
                return true;
            }
            return false;
        }
    );

    // Filtro es_coalborador
    $.fn.dataTableExt.afnFiltering.push(
        function( settings, data, dataIndex ) {
            var tipoInput = document.getElementById('esColaborador').value;
            var type = data[7];
            if ( tipoInput == type || tipoInput == 0)
            {
                return true;
            }
            return false;
        }
    );

    // Filtro tipo_colaborador
    $.fn.dataTableExt.afnFiltering.push(
        function( settings, data, dataIndex ) {
            var tipoInput = document.getElementById('tipoColaboracion').value;
            var type = data[8];
            if ( tipoInput == type || tipoInput == 0)
            {
                return true;
            }
            return false;
        }
    );

    $.fn.dataTableExt.afnFiltering.push(
        function( oSettings, aData, iDataIndex ) {
            var iFini = document.getElementById('datepicker_from').value;
            var iFfin = document.getElementById('datepicker_to').value;

            var iStartDateCol = 12;
            var iEndDateCol = 12;

            iFini=iFini.substring(6,10) + iFini.substring(3,5)+ iFini.substring(0,2);
            iFfin=iFfin.substring(6,10) + iFfin.substring(3,5)+ iFfin.substring(0,2);

            var datofini=aData[iStartDateCol].substring(6,10) + aData[iStartDateCol].substring(3,5)+ aData[iStartDateCol].substring(0,2);
            var datoffin=aData[iEndDateCol].substring(6,10) + aData[iEndDateCol].substring(3,5)+ aData[iEndDateCol].substring(0,2);

            if ( iFini === "" && iFfin === "" )
            {
                return true;
            }
            else if ( iFini <= datofini && iFfin === "")
            {
                return true;
            }
            else if ( iFfin >= datoffin && iFini === "")
            {
                return true;
            }
            else if (iFini <= datofini && iFfin >= datoffin)
            {
                return true;
            }
            return false;
        }
    );

    $('#exampleModalCenter').modal('toggle');
});

//Función que filtra por el tipo de donaciones
$('#filtroDonaciones').on('click', function(){

    $.fn.dataTableExt.afnFiltering.push(
    function( settings, data, dataIndex ) {
        var minimCoste = document.getElementById('costeMinimo').value;
        var maxCoste = document.getElementById('costeMaximo').value;

        var type = data[9];

        if ( minimCoste === "" && maxCoste === "" )
        {
            return true;
        }
        else if ( minimCoste <= type && maxCoste === "")
        {
            return true;
        }
        else if ( maxCoste >= type && minimCoste === "")
        {
            return true;
        }
        else if (minimCoste <= type && maxCoste >= type)
        {
            return true;
        }
        return false;
    }
    );

    $.fn.dataTableExt.afnFiltering.push(
        function( oSettings, aData, iDataIndex ) {
            var iFini = document.getElementById('datepicker_from').value;
            var iFfin = document.getElementById('datepicker_to').value;

            var iStartDateCol = 6;
            var iEndDateCol = 6;

            iFini=iFini.substring(6,10) + iFini.substring(3,5)+ iFini.substring(0,2);
            iFfin=iFfin.substring(6,10) + iFfin.substring(3,5)+ iFfin.substring(0,2);

            var datofini=aData[iStartDateCol].substring(6,10) + aData[iStartDateCol].substring(3,5)+ aData[iStartDateCol].substring(0,2);
            var datoffin=aData[iEndDateCol].substring(6,10) + aData[iEndDateCol].substring(3,5)+ aData[iEndDateCol].substring(0,2);

            if ( iFini === "" && iFfin === "" )
            {
                return true;
            }
            else if ( iFini <= datofini && iFfin === "")
            {
                return true;
            }
            else if ( iFfin >= datoffin && iFini === "")
            {
                return true;
            }
            else if (iFini <= datofini && iFfin >= datoffin)
            {
                return true;
            }
            return false;
        }
    );


    // Filtro tipo_colaborador
    $.fn.dataTableExt.afnFiltering.push(
        function( settings, data, dataIndex ) {
            var tipoInput = document.getElementById('habitual').value;
            var type = data[13];
            if ( tipoInput == type || tipoInput == 0)
            {
                return true;
            }
            return false;
        }
    );

    // Filtro centro desti
    $.fn.dataTableExt.afnFiltering.push(
        function( settings, data, dataIndex ) {
            var tipoInput = document.getElementById('centroDesti').value;
            var type = data[3];
            if ( tipoInput == type || tipoInput == 0)
            {
                return true;
            }
            return false;
        }
    );

    // Filtro centro Receptor
    $.fn.dataTableExt.afnFiltering.push(
        function( settings, data, dataIndex ) {
            var tipoInput = document.getElementById('centroReceptor').value;
            var type = data[2];
            if ( tipoInput == type || tipoInput == 0)
            {
                return true;
            }
            return false;
        }
    );

    // Filtro subtipus
    $.fn.dataTableExt.afnFiltering.push(
        function( settings, data, dataIndex ) {
            var tipoInput = document.getElementById('subtipo').value;
            var type = data[5];
            if ( tipoInput == type || tipoInput == 0)
            {
                return true;
            }
            return false;
        }
    );

    $('#exampleModalCenter').modal('toggle');
});
