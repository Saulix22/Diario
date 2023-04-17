<?PHP 

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
$varsession = $_SESSION['id'];

if ( $varsession == null || $varsession = '' ){

  header("location: index.php");

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
  <nav class="bg-yellow-300 h-auto flex">
    <div class="max-w-5x1 px-2s font-menlo py-3 px-4" >

      <a href="home.php" class="text-xl text-gray-800">Hola Diario!</a>

    </div>

    <div class="justify-self-end mr-6 ml-auto relative py-3 px-4">

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


<!-- Form 
<div class="container bg-white w-6/12 h-50 rounded-md flex shadow-lg mx-auto mt-28">
  
  <form action="form-validation.php" class="w-full p-6" method="post">
    
    <div class="my-3 px-7">
      <div class="flex">
        <label class="my-4 text-2xl">Nombre de tu día</label>
        <input class="ml-auto focus:outline-none" type="date" name="date" id="date">
      </div>  
      <input class="border-2 pl-2 border-yellow-400 focus:border-yellow-500 outline-none rounded-md h-10 w-7/12" type="text" name="title" id="entry-title">       
    </div>
      
    <div class="pb-5 px-7">
      <label class="block my-4 text-xl">Tu día...</label>
      <textarea class="border-2 p-2 border-yellow-400 content-start focus:border-yellow-500 outline-none rounded-md h-48 w-full" name="body" type="text"></textarea>
    </div>

    <div class="flex px-7">
      <button class="py-2 px-3 rounded-md text-yellow-400 bg-white ml-auto border-2 border-yellow-400 hover:bg-yellow-400 hover:border-0 hover:text-black" type="submit">Guardar</button>
    </div>  

  </form>

</div>
-->
  <script src="https://kit.fontawesome.com/ff9ed118ac.js" crossorigin="anonymous"></script>
  <script src="dropdown-user.js"></script>
  <script src="main.js"></script>

  </body>
</html>