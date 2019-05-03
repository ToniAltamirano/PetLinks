var opcionesLenguaje
$(document).ready(function () {
    opcionesLenguaje = $('#lan').val();
});

$('#myButton').on('click', function(event) {

    var rowMultiple = $("#tablePag").DataTable().rows('.selected').data();
    var row = $("#tablePag").DataTable().row('.selected').data();

    if(row == null || row == 'undefined'){
        $('#modalInfoEdit').modal('show');
    }else if(rowMultiple.length > 1){
        $('#modalInfoEditMultiple').modal('show');
    }else{
    //Llamamos al modal
        var id = row[1];
        $('#formularioEdit').attr('action', "usuarios/" + id + "/edit");
        $('#formularioEdit').submit();
    }

});

 $('#createButton').on('click', function(event) {
     $('#formularioCreate').attr('action', "usuarios/create");
     $('#formularioCreate').submit();
});

$('#delete').on('click', function(event) {
    var row = $("#tablePag").DataTable().row('.selected').data();
    // alert(row);
    if(row == null || row == 'undefined'){
        $('#modalInfo').modal('show');
    }else{
       //Llamamos al modal
       $('#modalDelete').modal('show');
    }
});

function eliminar(){

    var row = $("#tablePag").DataTable().row('.selected').data();

    var id = row[1];

    $('#formularioDelete').attr('action', "usuarios/" + id);
    $('#formularioDelete').submit();


}
