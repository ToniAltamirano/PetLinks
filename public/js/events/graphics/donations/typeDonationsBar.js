function tipo_fecha(fechaInicio, fechaFinal){
    $('#barChartTipos').html('<div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div>');

    $.ajax({
        type: "GET",
        // IMPORTANTE!! MODIFICAR ESTA URL PARA QUE FUNCIONE EN EL SERVER.
        //www.abp-politecnics.com/2019/daw/projecte02/dw05/public
        url: "http://www.abp-politecnics.com/2019/daw/projecte02/dw05/public/api/donacion/tipos/" + fechaInicio + "/" + fechaFinal,
        //url: "http://localhost:8080/PetLinks/public/api/donacion/tipos/" + fechaInicio + "/" + fechaFinal,
        dataType: "json",
        async: 'true',
        success: function(json) {
            var periodos = json.data.periodo;
            var donativos = json.data.donativos;
            var tipos = json.data.tipos;

            //console.log(tipos);
            //console.log(periodos);
            //console.log(donativos);
            var columns = [];
            periodos.forEach(periodo => {
                columns.push(new Array(periodo));
            });

            columns.forEach(column => {
                tipos.forEach(tipo => {
                    column.push(new Array(tipo.nombre, tipo.id));
                });
            });

            columns.forEach(column => {
                for(var i = 1; i<column.length; i++){
                    var cont = 0;
                    donativos.forEach(donativo => {
                        if(column[0] == donativo.fecha_donativo && column[i][1] == donativo.subtipos.tipos_id){
                            cont++;
                        }
                    });
                    column[i].push(cont);
                }
            });
            console.log(columns[0]);

            var dataForGraphic = [['Fecha']];

            for(var i = 1; i<columns[0].length; i++){
                dataForGraphic[0].push(columns[0][i][0]);
            }

            columns.forEach(column => {
                var fila = [column[0]];
                for(var i = 1; i<column.length; i++){
                    fila.push(column[i][2]);
                }

                dataForGraphic.push(fila);
            });

            console.log(dataForGraphic);
            $('#barLinesDonationsMoney').html('');
            google.charts.load('current', {'packages':['corechart', 'bar']});
            google.charts.setOnLoadCallback(drawVisualization);

            function drawVisualization() {
                var data = google.visualization.arrayToDataTable(dataForGraphic);

                var options = {
                    hAxis: {title: 'Fecha'},
                    vAxis: {title:'Donaciones'},
                    seriesType: 'bars',
                };

                var chart_div = document.getElementById('barChartTipos');
                var chart = new google.charts.Bar(chart_div);
                //para que el grafico se convierta en imagen
                /*google.visualization.events.addListener(chart, 'ready', function () {
                    chart_div.innerHTML = '<img src="' + chart.getImageURI() + '">';
                    console.log(chart_div.innerHTML);
                  });*/

                chart.draw(data, google.charts.Bar.convertOptions(options));
            }
        }
    });
}

$('#groupFechasTipos > div > input').change(function(){
    getDates();
});

function getDates() {
    if($('#groupFechasTipos > div > #fechaInicioTipos').val() && $('#groupFechasTipos > div > #fechaFinalTipos').val()){
        var fechaInicio = $('#fechaInicioTipos').val();

        var fechaFinal = $('#fechaFinalTipos').val();

        tipo_fecha(fechaInicio, fechaFinal);
    }
}

getDates();
