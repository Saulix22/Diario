<?PHP 
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
$varsession = $_SESSION['id'];

if ( $varsession == null || $varsession = '' ){

  header("location: index.php");

}

$month = $_POST['month'];
$year = $_POST['year'];
$entry = "";
$body = "";
$author = $_SESSION['id'];
$monthList = array( '01' => 'Enero', '02' => 'Febrero', '03' => 'Marzo', '04' => 'Abril',
'05' => 'Mayo', '06' => 'Junio', '07' => 'Julio', '08' => 'Agosto',
'09' => 'Septiembre', '10' => 'Octubre', '11' => 'Noviembre', '12' => 'Diciembre');

$monthName = $monthList[$month];
$connection = mysqli_connect("localhost","root","","diariodb");
$sql = "SELECT * FROM entries WHERE MONTH(date) = '$month' AND YEAR(date) = '$year' AND FK_user_id = $author";
$result = mysqli_query($connection,$sql);

function body_limited($text, $limit, $suffix){

    if(strlen($text) > $limit){

        return substr($text, 0, $limit) . $suffix;
    }

    return $text;

}

?>

<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Tailwind & CSS -->
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/home.css">

    <title>Inicio</title>
  </head>
  <body>

  <!-- Navegation bar -->
  <nav class="bg-yellow-300 h-auto w-full flex fixed">
    <div class="max-w-5x1 px-2s font-menlo py-3 px-4" >

      <a href="home.php" class="text-xl text-gray-800">Hola Diario!</a>

    </div>

    <div class="my-auto ml-auto">
      <a href="new-entry.php">
      <button class="px-3 py-1.5 rounded-md text-gray-800 border border-gray-800 hover:bg-gray-700 hover:text-white focus:outline-none">Tu nuevo día</button>
      </a>
    </div>

    <div class="justify-self-end mr-6 ml-6 relative py-3 px-4">

      <button class="focus:outline-none" id="user-button">
        <i class="fab fas fa-user text-gray-800"></i>
        <span class="sr-only">Abrir menú</span>
      </button>
      
      <div class="bg-white py-1 rounded-lg mt-2 right-0 absolute" id="user-menu" role="menu">
        <a href="#" class="block py-1 pl-4 pr-8 text-gray-800 hover:bg-yellow-200">Perfil</a>
        <a href="#" class="block py-1 pl-4 pr-8 text-gray-800 hover:bg-yellow-200">Configuraciones</a>
        <a href="logout.php" class="block py-1 pl-4 pr-8 text-gray-800 hover:bg-yellow-200">Salir</a>
      </div>
      
    </div>

  </nav>


<!-- Error alert to create form -->
<?php if(!empty($message)): ?>

<div class="bg-red-200 pl-5 py-3 flex font-regular rounded" role="alert" id="red-alert">
<?= $message ?>
<button type="button" class="ml-auto text-20 focus:outline-none" id="close-alert">
<i class="far fa-times-circle text-2xl mr-5"></i>
</button>
</div>

<?php endif; ?>


<!-- Feed of daily enties -->

<div class="container mx-auto flex grid justify-items-center">

  <!-- Month name-->
  <div class="mx-auto mt-20 mb-1">
    <h1 class="py-4 text-5xl text-gray-800 font-bold"> <?PHP echo $monthName ; ?> del <?PHP echo $year ; ?> </h1>
  </div>

  <div class="mb-1">
    <form action="home-month.php" method="post">
        <select name="month" class="border-2 border-yellow-300">
          <option value="01">Enero</option>
          <option value="02">Febrero</option>
          <option value="03">Marzo</option>
          <option value="04">Abril</option>
          <option value="05">Mayo</option>
          <option value="06">Junio</option>
          <option value="07">Julio</option>
          <option value="08">Agosto</option>
          <option value="09">Septiembre</option>
          <option value="10">Octubre</option>
          <option value="11">Noviembre</option>
          <option value="12">Diciembre</option>
        </select>
        <input type="number" name="year" value="<?PHP echo $year ; ?>" class="border-2 border-yellow-300" placeholder="Año" min="2000" max="<?PHP echo $year ; ?>">
        <input type="submit" value="Buscar" class="border-2 px-1 bg-yellow-300 border-gray-700 rounded ">
    </form>
  </div>

<!-- Daily entries of month -->
  <div class="my-4">
  
    <?PHP 
    
    while($row = $result->fetch_assoc()){

        $bodyLenght = $row['body'];
      
        $bodyLimited = body_limited($bodyLenght, 30, "...");
          
        $entry =  "
          
          <div class='my-4'>
            
            <div class='h-36 bg-yellow-100 px-10 py-5 rounded border border-yellow-400 my-5'>
          
              <div class='flex mx-auto' method='GET'>

                <a href='single-entry.php?id=".$row['entry_id']."' class='font-bold text-2xl text-gray-800 mr-10'>" .$row['title']. "</a>
                <label class='ml-auto my-auto'>".$row['date']."</label> 
                <button>
                <a href='verification-edit.php?id=".$row['entry_id']."'><i class='far fa-edit ml-2 text-lg'></i></a>
                </button>
                <button type='button' class='ml-2 text-lg' onclick='confirmDelete(".$row['entry_id'].")'>
                  <i class='fas fa-trash'></i>
                </button>

              </div>
                
              <div class='mt-4 ml-auto'>
                <p class='text-2xl font-light'>" .$bodyLimited. "</p>
              </div>
            
            </div>
            
          </div>
          
        ";
          
        echo $entry;
      
      }
      
      if($entry == null){
      
        echo "
      
          <div class='flex mt-20'>
      
          <img class='mx-auto' src='/images/typewriter.svg' width='55%' alt='Create some new entries'> 
      
          </div>
      
          <div class='px-auto mt-10 mb-1 flex'>
          
            <p class='py-4 mx-auto text-5xl text-gray-800 font-bold hm-text'> Escribe algo sobre tu día </p>
          
          </div>
      
        ";
      
      }
    
    ?> 

  </div>


</div>


  <script src="https://kit.fontawesome.com/ff9ed118ac.js" crossorigin="anonymous"></script>
  <script src="dropdown-user.js"></script>
  <script src="main.js"></script>

  </body>
</html>