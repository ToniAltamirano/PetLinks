$('#pieChartSubtipos').html('<div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div>');
var tipos_grafico = [];
$.ajax({
    type: "GET",
    url: "../api/donacion/subtipos",
    dataType: "json",
    async: 'true',
    success: function(json) {

        var subtipos_donaciones = json.data.donaciones_subtipos;
        var subtiposBD = json.data.subtipos;

        var subtipos_char = [];
        subtiposBD.forEach(subtipoBD => {
            subtipos_char.push({"id": subtipoBD.id, "nombre" : subtipoBD.nombre, "cantidad" : 0});
        });


        subtipos_donaciones.forEach(subtipo_donaciones => {
            subtipos_char.forEach(subtipo_char => {
                if(subtipo_char.id == subtipo_donaciones.subtipos_id){
                    subtipo_char.cantidad += 1;
                }
            });
        });

        var subtipos_grafico = [["Tipos de donacion", "Cantidad"]];
        subtipos_char.forEach(subtipo_char => {
            subtipos_grafico.push([subtipo_char.nombre,subtipo_char.cantidad]);
        });
        $('#pieChartSubtipos').html('');
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable(subtipos_grafico);
            var options = {
                //los valores que esten por debajo del 10% del total, se uniran en una sola para formar el tipo "other"
                sliceVisibilityThreshold: .05,
                //para hacer el donut
                pieHole: 0.4,
            };

            var chart = new google.visualization.PieChart(document.getElementById('pieChartSubtipos'));
            chart.draw(data, options);
        }
    }
});
