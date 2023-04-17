<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/style.css">

    <title>Hola Diario</title>
  </head>
  <body>
        
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #fadd1e;">
  <a class="navbar-brand" href="index.php">Hola Diario!</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span> 
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">

    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#" >¿Qué es esto? <span class="sr-only">(current)</span></a>
      </li>
    </ul>

    <form class="form-inline my-2 my-lg-0">

    <button type="button" class="btn btn-outline-dark my-2 my-sm-0" 
    data-toggle="modal" data-target="#ModalLogIn" id="button-section">Iniciar sesión</button>

    <button type="button" class="btn btn-outline-dark my-2 my-sm-0" 
    data-toggle="modal" data-target="#ModalSignUp" id="button-section">Registrarse</button>
    

    <!-- Model FAKE for repair the bug from the next model. How that's possible? I don't know, but is better stay it of that way -->
    <div class="modal " id="ModalSignUpFAKE" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Sign Up</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
              </div>
              <button type="submit" class="btn btn-outline-warning">Register</button>
            </form>
          </div>
        </div>
      </div>
    </div>


    <!-- Model form for Log In -->
    <div class="modal" id="ModalLogIn" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Iniciar sesión</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body mx-3">

            <form action="login.php" method="post">
              <div class="form-group">
                <label for="exampleInputEmail1">Correo electronico</label>
                <input type="email" name="loginEmail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>

              <div class="form-group">
                  <label for="exampleInputPassword1">Contraseña</label>
                  <input type="password" name="loginPassword" class="form-control" id="exampleInputPassword1">
              </div>
              <button type="submit" value="submit" class="btn btn-outline-warning">Entrar</button>
          
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Model form for Sign Up -->
    <div class="modal" id="ModalSignUp" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Registrarse</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="signup.php" method="post">

              <div class="form-group">
                <label for="exampleInputEmail1">Correo Electronico*</label>
                <input type="email" name="signupEmail" id="signupEmail" class="form-control" aria-describedby="emailHelp">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Contraseña*</label>
                <input type="password" name="signupPassword" class="form-control" id="signupPassword">
                <!-- <span>alerta</span> -->
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Confirmar contraseña*</label>
                <input type="password" name="signupCpassword" class="form-control" id="signupCpassword">
              </div>
              <div class="form-group">
                <label for="exampleInput1">Ingresa tu enlace de Facebook</label>
                <input type="text" name="urlFB" class="form-control" placeholder="Opcional">
              </div>
              <div class="form-group">
                <label for="exampleInput1">Ingresa tu enlace de Instagram</label>
                <input type="text" name="urlIG" class="form-control" placeholder="Opcional">
              </div>
              <button type="submit" value="submit" name="registrar" class="btn btn-outline-warning">Registrarse</button>

            </form>
          </div>
        </div>
      </div>
    </div>

    </form>

  </div>

</nav>

<!-- Successful created account alert-->
<?php if(!empty($aproveMessage)): ?>

  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <?= $aproveMessage ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<?php endif; ?>

<!-- Error alert to create account -->
<?php if(!empty($message)): ?>

<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <?= $message ?>
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
</div>

<?php endif; ?>

<div class="container">

<p id="main-text">Escribe tus <span class="typed-text"></span><span class="cursor">&nbsp;</span></p>

</div>

<footer>

  <div class="social-media">

    <a target="_blank" href="https://www.instagram.com/saulix22/">
      <i class="fab fa-instagram"></i>
    </a>

    <a target="_blank" href="https://www.facebook.com/saulix22/">
      <i class="fab fa-facebook"></i>
    </a>

    <a target="_blank" href="https://www.youtube.com/">
      <i class="fab fa-youtube"></i>
    </a>

    <a target="_blank" href="https://www.gitlab.com/saulix22/">
      <i class="fab fa-gitlab"></i>
    </a>

  </div>

  <hr>

  <p id="CP">&copy; Copyright 2020 Saúl Castañeda</p>

</footer>

  <script src="main.js"></script>
  <script src="https://kit.fontawesome.com/ff9ed118ac.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    
  </body>
</html>