<?PHP
session_start();
$varsession = $_SESSION['id'];

require 'connection.php';
$title = $_POST['title'];
$body = $_POST['body'];
$date = $_POST['date'];
$message = '';


if ( !empty($_POST['title']) && !empty($_POST['body']) && !empty($_POST['date']) && strlen($_POST['title']) <= 50 ){

    $sql = "INSERT INTO entries (title, body, date, FK_user_id) VALUES (:title, :body, :date, :author)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':title', $_POST['title']);
    $stmt->bindParam(':body', $_POST['body']);
    $stmt->bindParam(':date', $_POST['date']);
    $stmt->bindParam(':author', $_SESSION['id']);
    
    if ($stmt->execute()){

        header('location: home.php');

    } else {

        $message = 'Ah sucedido un error al guardar tu día:(';
        include('home.php');

    }
    

} else {

    if(strlen($_POST['title']) > 50){

        $message = 'EL título no debe ser mayor a 50 caracteres!';
        include('new-entry.php');

    }else {

        $message = 'Rellena todos los campos!';
        include('new-entry.php');

    }

}

?>