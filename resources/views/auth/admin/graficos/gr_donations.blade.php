@extends('auth.admin.admin')

@section('datos')

    <div class="card col-11 mx-auto mb-1">
        <div class="card-body">
            <div class="card-title">
                <h3>Tipos de donación</h3>
            </div>
            <div id="pieChartTipos" class="text-center" style="width: 100%; height: 500px;"></div>
        </div>
    </div>
    <div class="card col-11 mx-auto mb-1">
        <div class="card-body">
            <div class="card-title">
                <h3>Subtipos de donación</h3>
            </div>
            <div id="pieChartSubtipos" class="text-center" style="width: 100%; height: 500px;"></div>
        </div>
    </div>
    <div class="card col-11 mx-auto mb-1">
        <div class="card-body">
            <div class="card-title">
                <h3>Balance Donaciones/dinero</h3>
            </div>
            <div id="groupFechas" class="form-group row">
                <div class="col-xl-4 m-auto">
                    <label for="fechaInicio" class="">De: </label>
                    <input type="month" name="fechaInicio" id="fechaInicio" class="form-control d-inline">
                </div>

                <div class="col-xl-4 m-auto">
                    <label for="fechaFinal" class="d-inline">Hasta: </label>
                    <input type="month" name="fechaFinal" id="fechaFinal" class="form-control">
                </div>

            </div>
            <div id="barLinesDonationsMoney" class="text-center" style="width: 100%; height: 500px;"></div>
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
                            sliceVisibilityThreshold: .1,
                            //para hacer el donut
                            pieHole: 0.4,
                        };

                        var chart = new google.visualization.PieChart(document.getElementById('pieChartSubtipos'));
                        chart.draw(data, options);
                    }
                }
            });
        }

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
                    google.charts.load('current', {'packages':['corechart']});
                    google.charts.setOnLoadCallback(drawVisualization);

                    function drawVisualization() {
                        // Some raw data (not necessarily accurate)
                        var data = google.visualization.arrayToDataTable(dataForGraphic);

                        var options = {
                            title : 'Relación del número de donacines con el dinero recaudado',
                            vAxis: {title: 'Cantidad'},
                            hAxis: {title: 'Fecha'},
                            seriesType: 'bars',
                            series: {1: {type: 'line'}}
                        };

                        var chart = new google.visualization.ComboChart(document.getElementById('barLinesDonationsMoney'));
                        chart.draw(data, options);
                    }
                }
            });
        }

        graficoTiposDonacion();
        graficoSubtiposDonacion();

        $('#groupFechas > div > input').change(function(){
            if($('#fechaInicio').val() && $('#fechaFinal').val()){
                var fechaInicio = $('#fechaInicio').val();

                var fechaFinal = $('#fechaFinal').val();

                donaciones_dinero(fechaInicio, fechaFinal);
            }
        });

    </script>
@endsection
