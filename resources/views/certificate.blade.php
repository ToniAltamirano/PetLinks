@extends('template.user')

@section('own_CSS')
    <link rel="stylesheet" href="{{ asset('css/certificate.css') }}">
@endsection

@section('contenidor')
    <div class="container my-5 pdf">
        <div class="jumbotron pdf">
            <div class="row text-center pdf">
                <img class="h-auto mx-auto pdf" src="{{ asset('img/spam_logo.png') }}" alt="imagen">
                <div class="col-md-7 mx-auto text-justify pdf">
                        <h1 class="display-2 text-black-50 pdf">CERTIFICADO </h1>
                        <h3 class="display-4 pdf"> Arnau Infante Pinós</h3>
                        <p class="lead pdf">Donación: 5 kg pienso</p>
                        <p class="lead pdf">Centro: refugi can pile</p>
                        <p class="lead pdf">Fecha donación: 23/04/2019</p>
                </div>
            </div>
        </div>

    </div>
    <script src="{{ asset('libs/jsPDF/html2canvas.min.js') }}"></script>
    <script src="{{ asset('libs/jsPDF/jspdf.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function()
        {
            html2canvas($('.jumbotron'),{
            onrendered:function(canvas){

            var img = canvas.toDataURL("image/png");
            var doc = new jsPDF('landscape');

            doc.addImage(img,'PNG',0,50);
            doc.save('test.pdf');
            }

            });
        });
    </script>


@endsection


