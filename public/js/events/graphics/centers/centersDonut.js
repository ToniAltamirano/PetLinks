$('#donutChartCentros').html('<div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div>');
var tipos_grafico = [];
$.ajax({
    type: "GET",
    url: "../api/centro/destino",
    dataType: "json",
    async: 'true',
    success: function(json) {
        var donativos = json.data.donativos;
        var centros = json.data.centros;

        //console.log(donativos);
        //console.log(centros);

        var centros_chart = [];
        centros.forEach(centro => {
            centros_chart.push({"id": centro.id, "nombre" : centro.nombre, "cantidad" : 0});
        });

        donativos.forEach(donativo => {
            centros_chart.forEach(centro_chart => {
                if(donativo.centros_desti_id == centro_chart.id){
                    centro_chart.cantidad += 1;
                }
            });
        });

        var centros_grafico = [["Centros", "Cantidad"]];
        centros_chart.forEach(centro_chart => {
            centros_grafico.push([centro_chart.nombre,centro_chart.cantidad]);
        });
        $('#donutChartCentros').html('');
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable(centros_grafico);
            var options = {
                //los valores que esten por debajo del 10% del total, se uniran en una sola para formar el tipo "other"
                //sliceVisibilityThreshold: .1,
                //para hacer el donut
                pieHole: 0.4,
            };

            var chart = new google.visualization.PieChart(document.getElementById('donutChartCentros'));
            chart.draw(data, options);
        }
    }
});
