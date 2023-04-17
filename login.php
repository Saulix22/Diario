<?php    
if(!isset($_SESSION)) 
{ 
    session_start(); 
    //$varsession = $_SESSION['loginEmail'];
} 

if($_POST['loginEmail'] == null && $_POST['loginPassword'] == null){

    header('location: index.php');
    
}

include('connection.php');
$email = $_POST['loginEmail'];
$password = $_POST['loginPassword'];
//$_SESSION['loginEmail'] = $email;

$connection = mysqli_connect("localhost","root","","diariodb");
$stmt = $connection -> prepare("SELECT user_id, email, password FROM users WHERE email = '$email'");
$stmt -> execute();
$stmt -> store_result();
$stmt -> bind_result($userID, $emailDB, $hash);

if ($stmt -> num_rows == 1){

    $stmt -> fetch();
    
    if (password_verify($password, $hash)){

        $_SESSION['id'] = $userID;
        header("location: home.php");

    } else {

        $message = "Tu correo y/o contraseña no coinciden.";
        include("index.php");

    }

} else {

    $message = "Contraseña incorrecta.";
    include("index.php");

}

?>