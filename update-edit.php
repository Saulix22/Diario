<?PHP 
session_start();
$varsession = $_SESSION['id'];

require 'connection.php';

$title = $_POST['title'];
$body = $_POST['body'];
$date = $_POST['date'];
$id = $_GET['id'];
$message = '';

if ( !empty($_POST['title']) && !empty($_POST['body']) && !empty($_GET['id']) && !empty($_POST['date']) && strlen($_POST['title']) <= 50 ){

    $sql = "UPDATE entries SET title ='$title', body ='$body', date ='$date' WHERE entry_id = '$id'";
    
    if ($conn->query($sql) == true){

        header('location: home.php');

    } else {

        echo $message = 'Ah sucedido un error al actualizar tu día:(';
        include('home.php');

    }

} else {

    if(strlen($_POST['title']) > 50){

        $message = 'EL título no debe ser mayor a 50 caracteres!';
        include('verification-edit.php');

    }else {

        $message = 'Rellena todos los campos!';
        include('verification-edit.php');

    }

}

?>