function donaciones_dinero(fechaInicio, fechaFinal){
    $('#barLinesDonationsMoney').html('<div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div>');
    $.ajax({
        type: "GET",
        url: "../api/donacion/balance/" + fechaInicio + "/" + fechaFinal,
        dataType: "json",
        async: 'true',
        success: function(json) {
            var periodos = json.data.periodo;
            var donativos = json.data.donativos;

            //console.log(periodos);
            //console.log(donativos);

            var prueba_array = [];
            periodos.forEach(periodo => {
                var num_donaciones = 0;
                var total_dinero = 0;
                donativos.forEach(donativo => {
                    if(periodo == donativo.fecha_donativo){
                        num_donaciones++;
                        if(donativo.coste != null){
                            total_dinero += donativo.coste;
                        }
                    }
                });
                prueba_array.push({"fecha": periodo, "donaciones": num_donaciones, "total_dinero": total_dinero});
            });

            //console.log(prueba_array);

            var dataForGraphic = [['Fecha', 'nº Donaciones', 'Dinero €']];

            prueba_array.forEach(element => {
                dataForGraphic.push([element.fecha, element.donaciones, element.total_dinero]);
            });

            console.log(dataForGraphic);
            $('#barLinesDonationsMoney').html('');

            google.charts.setOnLoadCallback(drawVisualization);

            function drawVisualization() {
                // Some raw data (not necessarily accurate)
                google.charts.load('current', {'packages':['corechart', 'bar']});
                var data = google.visualization.arrayToDataTable(dataForGraphic);

                var options = {
                    title : 'Relación del número de donacines con el dinero recaudado',
                    hAxis: {title: 'Fecha'},
                    vAxes: {0: {gridlines: {color: 'grey'}, title:'Donaciones',

                    },
                            1: {gridlines: {color: 'grey'}, title:'€',
                            format:"##"},
                  },
                    pointSize: 5,
                    seriesType: 'bars',
                    series: {1: {type: 'line', targetAxisIndex:1, pointShape: 'circle'},

                }
                };

                var chart = new google.visualization.ComboChart(document.getElementById('barLinesDonationsMoney'));
                chart.draw(data, options);
            }
        }
    });
}

$('#groupFechas > div > input').change(function(){
    if($('#groupFechas > div > #fechaInicio').val() && $('#groupFechas > div > #fechaFinal').val()){
        var fechaInicio = $('#fechaInicio').val();

        var fechaFinal = $('#fechaFinal').val();

        donaciones_dinero(fechaInicio, fechaFinal);
    }
});
