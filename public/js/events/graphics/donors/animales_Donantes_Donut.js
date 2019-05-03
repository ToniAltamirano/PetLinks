var style = getComputedStyle(document.body);
textColor = style.getPropertyValue('--text-color');

function graficoTiposDonacion(){
    $('#pieChartAnimales').html('<div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div>');
    var tipos_grafico = [];
    $.ajax({
        type: "GET",
        url: "../api/donante/animales",
        dataType: "json",
        async: 'true',
        success: function(json) {
            //array de subtipos de donaciones de las donaciones
            var donantes_animal = json.data.donantes_animal;
            //array de tipos de donaciones de la bd
            var animales = json.data.animales;

            //array donde meteremos la informacion que necesitemos
            var tipos_char = [];
            animales.forEach(animal => {
                tipos_char.push({"id": animal.id, "nombre" : animal.nombre, "cantidad" : 0});
            });

            donantes_animal.forEach(donante_animal => {
                if (donante_animal.animal.length != 0) {
                    donante_animal.animal.forEach(animal => {
                        tipos_char.forEach(tipo_char => {
                            if (animal.id == tipo_char.id) {
                                tipo_char.cantidad += 1;
                            }
                        });
                    });
                }
            });

            //array que le pasaremos al charts para crear el grafico
            var tipos_grafico = [["Animal", "Cantidad"]];
            tipos_char.forEach(tipo_char => {
                tipos_grafico.push([tipo_char.nombre, tipo_char.cantidad]);
            });
            $('#pieChartAnimales').html('');
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable(tipos_grafico);
                var options = {
                    backgroundColor: { fill:'transparent' },
                    legend: {textStyle: {color: textColor}},
                };

                var chart = new google.visualization.PieChart(document.getElementById('pieChartAnimales'));
                chart.draw(data, options);
            }
        }
    });
}

graficoTiposDonacion();
