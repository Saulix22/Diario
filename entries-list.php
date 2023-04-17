<?PHP 

$varsession = $_SESSION['id'];

if ( $varsession == null || $varsession = '' ){

  header("location: error403.php");

}

include('date.php');
$entry = "";
$body = "";
$author = $_SESSION['id'];

$connection = mysqli_connect("localhost","root","","diariodb");
$sql = "SELECT * FROM entries WHERE MONTH(date) = '$month' AND YEAR(date) = '$year' AND FK_user_id = $author";
$result = mysqli_query($connection,$sql);

function body_limited($text, $limit, $suffix){

    if(strlen($text) > $limit){

        return substr($text, 0, $limit) . $suffix;
    }

    return $text;

}

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