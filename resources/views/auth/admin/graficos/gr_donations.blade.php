@extends('auth.admin.admin')

@section('datos')
    <div class="row">
        <div class="card col-11 mx-auto mb-1">
            <div class="card-body">
                <div class="card-title">
                    <h3>Tipos de donación</h3>
                </div>
                <div id="pieChartTipos" class="text-center"></div>
            </div>
        </div>
        <div class="card col-11 mx-auto mb-1">
            <div class="card-body">
                <div class="card-title">
                    <h3>Subtipos de donación</h3>
                </div>
                <div id="pieChartSubtipos" class="text-center"></div>
            </div>
        </div>
    </div>


@endsection

@section('scripts')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        function graficoTiposDonacion(){
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

                        };

                        var chart = new google.visualization.PieChart(document.getElementById('pieChartTipos'));
                        chart.draw(data, options);
                    }
                }
            });
        }

        function graficoSubtiposDonacion(){
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
                    console.log(subtipos_donaciones);
                    var subtipos_char = [];
                    subtiposBD.forEach(subtipoBD => {
                        subtipos_char.push({"id": subtipoBD.id, "nombre" : subtipoBD.nombre, "cantidad" : 0});
                    });

                    console.log(subtipos_char);

                    subtipos_donaciones.forEach(subtipo_donaciones => {
                        subtipos_char.forEach(subtipo_char => {
                            if(subtipo_char.id == subtipo_donaciones.subtipos_id){
                                subtipo_char.cantidad += 1;
                            }
                        });
                    });

                    console.log(subtipos_char);

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
                            sliceVisibilityThreshold: .2,
                        };

                        var chart = new google.visualization.PieChart(document.getElementById('pieChartSubtipos'));
                        chart.draw(data, options);
                    }
                }
            });
        }

        graficoTiposDonacion();
        graficoSubtiposDonacion();
    </script>
@endsection
