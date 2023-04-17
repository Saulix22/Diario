<?PHP 
include('date.php');

if(!isset($_SESSION)) 
{ 
    session_start(); 
    $varsession = $_SESSION['id'];
} 

if ( $varsession == null || $varsession = '' ){

  header("location: error403.php");

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
  <div class="mt-20">
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
    <?PHP include('entries-list.php'); ?>
  </div>


</div>

  <script src="https://kit.fontawesome.com/ff9ed118ac.js" crossorigin="anonymous"></script>
  <script src="dropdown-user.js"></script>
  <script src="main.js"></script>

  </body>
</html>