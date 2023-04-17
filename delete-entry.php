<?PHP

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
$varsession = $_SESSION['id'];

if ( $varsession == null || $varsession = '' ){

  header("location: index.php");

}

$id = $_GET["id"];

$connection = mysqli_connect("localhost","root","","diariodb");
$sql = "DELETE FROM entries WHERE entry_id = '$id' AND FK_user_id = ".$_SESSION['id']."";
$result = mysqli_query($connection,$sql);

if(mysqli_query($connection, $sql)){

    header('location: home.php');

} 

echo "Algo a sucedido mal";

  
?>