@extends('auth.admin.admin')

@section('datos')
    <div class="row">
        <div class="card col-11 mx-auto mb-1">
            <div class="card-body">
                <div class="card-title">
                    <h3>Animales</h3>
                </div>
                <div id="pieChartAnimales" class="text-center"></div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
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

                    console.log(donante_animal);
                    donantes_animal.forEach(donante_animal => {
                        tipos_char.forEach(tipo_char => {
                            if(donante_animal.animal.id == tipo_char.id){
                                tipo_char.cantidad += 1;
                            }
                        });
                    });

                    //array que le pasaremos al charts para crear el grafico
                    var tipos_grafico = [["Aninal", "Cantidad"]];
                    tipos_char.forEach(tipo_char => {
                        tipos_grafico.push([tipo_char.nombre,tipo_char.cantidad]);
                    });
                    $('#pieChartAnimales').html('');
                    google.charts.load('current', {'packages':['corechart']});
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                        var data = google.visualization.arrayToDataTable(tipos_grafico);
                        var options = {

                        };

                        var chart = new google.visualization.PieChart(document.getElementById('pieChartAnimales'));
                        chart.draw(data, options);
                    }
                }
            });
        }

        graficoTiposDonacion();
    </script>
@endsection
