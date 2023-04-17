<?PHP 

include('connection.php');
$month = date("m");
$year = date("Y");
$monthList = array( '01' => 'Enero', '02' => 'Febrero', '03' => 'Marzo', '04' => 'Abril',
'05' => 'Mayo', '06' => 'Junio', '07' => 'Julio', '08' => 'Agosto',
'09' => 'Septiembre', '10' => 'Octubre', '11' => 'Noviembre', '12' => 'Diciembre');

$monthName = $monthList[$month];
$monthSelected = $month;

?>

