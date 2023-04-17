<?PHP

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
$varsession = $_SESSION['id'];

if ( $varsession == null || $varsession = '' ){

  header("location: index.php");

}

require("template-entries.php");

$id = $_GET["id"];

$connection = mysqli_connect("localhost","root","","diariodb");
$sql = "SELECT * FROM entries WHERE entry_id = '$id' AND FK_user_id = ".$_SESSION['id']."";
$result = mysqli_query($connection,$sql);

while($row = $result ->fetch_assoc()){

  $editEntry = "
    <div class='container bg-white w-6/12 h-50 rounded-md flex shadow-lg mx-auto mt-28'>
      
      <form action='home.php' class='w-full p-6'>
        
        <div class='my-3 px-7'>
          <div class='flex'>
            <label class='my-4 text-2xl'>Nombre de tu día</label>
            <div class='ml-auto focus:outline-none'>".$row['date']."</div>
          </div>  
          <div class='bg-yellow-100 border-2 border-yellow-300 pt-1.5 pl-2 outline-none rounded-md h-10 w-7/12'>".$row['title']."</div>       
        </div>

        <div class='pb-5 px-7'>
          <label class='block my-4 text-xl'>Tu día...</label>
          <div class='bg-yellow-100 border-2 border-yellow-300 p-2 content-start outline-none rounded-md h-48 w-full' name='body' type='text'>".$row['body']."</div >
        </div>

        <div class='flex px-7'>
          <button class='py-2 px-3 rounded-md text-gray-800 font-semibold bg-white ml-auto border-2 border-yellow-400 hover:bg-yellow-200 hover:border-0 hover:border-yellow-200 hover:text-black focus:bg-white hover:shadow-lg focus:shadow-sm focus:outline-none'>Cerrar</button>
        </div>

      </form>

    </div>

    ";

    echo $editEntry;
}

  
?>