<?PHP

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
$varsession = $_SESSION['id'];

if ( $varsession == null || $varsession = '' ){

  header("location: index.php");

}

require("edit-entry.php");

$id = $_GET["id"];

$connection = mysqli_connect("localhost","root","","diariodb");
$sql = "SELECT * FROM entries WHERE entry_id = '$id' AND FK_user_id = ".$_SESSION['id']."";
$result = mysqli_query($connection,$sql);

while($row = $result ->fetch_assoc()){

  $editEntry = "
    <div class='container bg-white w-6/12 h-50 rounded-md flex shadow-lg mx-auto mt-28'>
      
      <form action='update-edit.php?id=".$row['entry_id']."' class='w-full p-6' method='post'>
        
        <div class='my-3 px-7'>
          <div class='flex'>
            <label class='my-4 text-2xl'>Nombre de tu día</label>
            <input class='ml-auto focus:outline-none' value='".$row['date']."' type='date' name='date' id='date'>
          </div>  
          <input class='border-2 pl-2 border-yellow-400 focus:border-yellow-500 outline-none rounded-md h-10 w-7/12' value='".$row['title']."' type='text' name='title' id='entry-title'>       
        </div>

        <div class='pb-5 px-7'>
          <label class='block my-4 text-xl'>Tu día...</label>
          <textarea class='border-2 p-2 border-yellow-400 content-start focus:border-yellow-500 outline-none rounded-md h-48 w-full' name='body' type='text'>".$row['body']."</textarea>
        </div>

        <div class='flex px-7'>
          <button class='py-2 px-3 rounded-md text-yellow-400 bg-white ml-auto border-2 border-yellow-400 hover:bg-yellow-400 hover:border-0 hover:text-black' name='id' type='submit'>Guardar</button>
        </div>  

      </form>

    </div>

    ";

    echo $editEntry;
}

  
?>