$(document).ready(function () {

    var table = $('#tablePag').DataTable({
        language: {

            "sProcessing":   "Processant...",
            "sLengthMenu":   "Mostra _MENU_ registres",
            "sZeroRecords":  "No s'han trobat registres.",
            "sInfo":         "Mostrant de _START_ a _END_ de _TOTAL_ registres",
            "sInfoEmpty":    "Mostrant de 0 a 0 de 0 registres",
            "sInfoFiltered": "(filtrat de _MAX_ total registres)",
            "sInfoPostFix":  "",
            "sSearch":       "Filtrar:",
            "sUrl":          "",
            "oPaginate": {
                "sFirst":    "Primer",
                "sPrevious": "Anterior",
                "sNext":     "Següent",
                "sLast":     "Últim"
            }

        },
        dom: 'lBfrtip',
        buttons: [{
                    extend: 'copy',
                    text: 'Copy',
                    className: 'bg-secondary ml-4',
                    key: {
                        key: 'c',
                        altKey: true
                    }
                }, {
                    extend: 'excel',
                    text: 'Excel',
                    title: titulo,
                    className: 'btn bg-secondary'
                }, {
                    extend: 'pdf',
                    text: 'PDF',
                    title: 'Donacions',
                    className: 'bg-secondary'
                }, {
                    extend: 'print',
                    text: 'Print',
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

    $('#sidebarCollapse').on('click', function () {
        //$('#sidebar').toggleClass('active');
        if($('#sidebar').css('margin-left') == "0px"){
            $('#sidebar').css('margin-left', $('#sidebar').width()*-1);
        } else {
            $('#sidebar').css('margin-left', "0px");
        }
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
