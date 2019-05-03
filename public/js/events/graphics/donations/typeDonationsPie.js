var style = getComputedStyle(document.body);
textColor = style.getPropertyValue('--text-color');

$('#pieChartTipos').html('<div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div>');
var tipos_grafico = [];
$.ajax({
    type: "GET",
    url: "../api/donacion/tipos",
    dataType: "json",
    async: 'true',
    success: function(json) {
        //array de subtipos de donaciones de las donaciones
        var subtipos = json.data.donaciones_subtipos;
        //array de tipos de donaciones de la bd
        var tipos = json.data.tipos;

        //array donde meteremos la informacion que necesitemos
        var tipos_char = [];
        tipos.forEach(tipo => {
            tipos_char.push({"id": tipo.id, "nombre" : tipo.nombre, "cantidad" : 0});
        });

        subtipos.forEach(subtipo => {
            tipos_char.forEach(tipo_char => {
                if(subtipo.subtipos.tipos_id == tipo_char.id){
                    tipo_char.cantidad += 1;
                }
            });
        });

        //array que le pasaremos al charts para crear el grafico
        var tipos_grafico = [["Tipos de donacion", "Cantidad"]];
        tipos_char.forEach(tipo_char => {
            tipos_grafico.push([tipo_char.nombre,tipo_char.cantidad]);
        });
        $('#pieChartTipos').html('');
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable(tipos_grafico);
            var options = {
                backgroundColor: { fill:'transparent' },
                legend: {textStyle: {color: textColor}},
            };
            var chart = new google.visualization.PieChart(document.getElementById('pieChartTipos'));
            chart.draw(data, options);
        }
    }
});
