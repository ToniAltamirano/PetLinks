<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"/>

    <title>PetLinks</title>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary p-3">
        <a class="navbar-brand" href="/frutes_ToniA/public">
            PETLINKS
        </a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">           
        </div>

         <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0"></ul>
        <form class="form-inline my-2 my-lg-0">
          <a class="bg-transparent border-0 my-2 my-sm boton pr-4" href="register.php">Regístrate</a>
          <a class="btn btn-primary my-2 my-sm-0 boton boton-login" href="login.php">Iniciar Sesión</a>
        </form>
      </div>
    </nav>

     <nav class="navbar navbar-expand-lg navbar-light bg-primary p-0">
      <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0  title-font">
          <li class="nav-item">
            <a class="nav-link text-white ml-2 mr-2 pl-3" href="index.php">HOME
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white ml-2 mr-2 pl-3" href="gamesGrid.php">ABOUT US</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white ml-2 mr-2  pl-3" href="index.php#scroll">DONATE</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white ml-2 mr-2  pl-3" href="contact.php">RRSS</a>
          </li>
          
        </ul>
      </div>
    </nav>


    

   <div class="container">
  <div class="row">
    <div class="col-8">
      <h3 class="pt-5">VISITA NUESTRA PROTECTORA!</h3>
      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        <button class="btn btn-primary"> DONATE !</button>
</div>
    <div class="col-4">
      <img class="p-5"src="{{ asset('img/img.jpg') }}" alt=" ERROR">
    </div>
  </div>
  </div>



</div>

</body>
</html>
