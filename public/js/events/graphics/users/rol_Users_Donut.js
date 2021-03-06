var style = getComputedStyle(document.body);
textColor = style.getPropertyValue('--text-color');

function graficoTiposDonacion(){
    $('#pieChartRoles').html('<div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div>');
    var tipos_grafico = [];
    $.ajax({
        type: "GET",
        url: "../api/usuario/roles",
        dataType: "json",
        async: 'true',
        success: function(json) {
            //array de subtipos de donaciones de las donaciones
            var donantes_roles = json.data.donantes_roles;
            //array de tipos de donaciones de la bd
            var roles = json.data.roles;

            //array donde meteremos la informacion que necesitemos
            var tipos_char = [];
            roles.forEach(rol => {
                tipos_char.push({"id": rol.id, "rol" : rol.rol, "cantidad" : 0});
            });

            donantes_roles.forEach(donante_rol => {
                tipos_char.forEach(tipo_char => {
                    if (donante_rol.roles_id == tipo_char.id) {
                        tipo_char.cantidad += 1;
                    }
                });
            });

            //array que le pasaremos al charts para crear el grafico
            var tipos_grafico = [["Rol", "Cantidad"]];
            tipos_char.forEach(tipo_char => {
                tipos_grafico.push([tipo_char.rol, tipo_char.cantidad]);
            });
            $('#pieChartRoles').html('');
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable(tipos_grafico);
                var options = {
                    backgroundColor: { fill:'transparent' },
                    legend: {textStyle: {color: textColor}},
                };

                var chart = new google.visualization.PieChart(document.getElementById('pieChartRoles'));
                chart.draw(data, options);
            }
        }
    });
}

graficoTiposDonacion();
