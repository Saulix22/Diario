<?php

  require 'connection.php';

  $message = '';
  $aproveMessage = '';
  $alertEmail = '';
  $alertPassword = '';

  /*  Sign up validation  */ 
    if (!empty($_POST['signupEmail']) && filter_var($_POST['signupEmail'], FILTER_VALIDATE_EMAIL) 
    && !empty($_POST['signupPassword']) && $_POST["signupCpassword"] == $_POST["signupPassword"]) {

        $sql = "INSERT INTO users (email, password, facebook_url, instagram_url) VALUES (:email, :password, :userFB, :userIG)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $_POST['signupEmail']);
        $password = password_hash($_POST['signupPassword'], PASSWORD_DEFAULT);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':userFB', $_POST['urlFB']);
        $stmt->bindParam(':userIG', $_POST['urlIG']);
      
      
        if ($stmt->execute()) {
          $aproveMessage = 'Cuenta creada correctamente!';
          include("index.php");
        } else {
          $message = 'Lo sentimos, ocurrió un error al crear tu cuenta';
          include("index.php");
        }

    } else {

      if ($_POST) {
        
        if (!$_POST["signupEmail"] || !$_POST["signupPassword"]) {
                  
          $message .= "Rellena todos los campos obligatorios.<br>";
          include("index.php");
            
        } else {
        
          if ($_POST["signupCpassword"] != $_POST["signupPassword"]) {
                  
            $message .= "Las contraseñas no son iguales.<br>";
            include("index.php");
              
          }

          if ($_POST['signupEmail'] && filter_var($_POST["signupEmail"], FILTER_VALIDATE_EMAIL) === false) {
              
            $message .= "Correo electronico no valido.<br>";
            include("index.php");
              
          }  
        
        } 
        
      }
      
      /*Redirect to index if trying to enter directly from URL address*/ 
      if($_POST['signupEmail'] == null && $_POST['signupPassword'] == null && $_POST['signupCpassword'] == null){

        header('location: index.php');
    
      }

    }

?>

