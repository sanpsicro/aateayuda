<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>AMERICAN ASSIST - ATENCION A CLIENTES</title>
<link href="http://www.aateayuda.com/chatstyle.css" rel="stylesheet" type="text/css" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
</head>
<body>
<div class="boty">
<div class="ncont">
<div class="intro">
<img src="http://www.aateayuda.com/logohd.png" /><br /><br />

<?php 
include('conf.php'); 
include_once 'customFunctions.php';
isset($_GET['gr']) ? $general=$_GET["gr"] : $general = "" ;
//isset($_GET['fecha']) ? $fecha=$_GET["fecha"] : $fecha = "" ;

$db = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);
$result = mysqli_query($db,"SELECT status from chatstat where gr = '$general' LIMIT 1");
if (mysqli_num_rows($result)){ 
$status=mysqli_result($result,0,"status");
}
if ($status == 1 || empty($status)) {
	echo "Este servicio no esta activo";
	die();
	} else {}

	$result2 = mysqli_query($db,"SELECT date from chat where general = '$general' order by date desc LIMIT 1");
if (mysqli_num_rows($result2)){ 
$fecha=mysqli_result($result2,0,"date");
}
$d10=date("Y-m-d H:i:s",time()-43200);
$today = strtotime($d10);
$last = strtotime($fecha);



if ($last < $today && !empty($fecha)) {
	echo "Este servicio no esta activo"; die();
	} else {}

 ?>
Bienvenido al chat de <strong>American Assist</strong>, puede usarlo con toda confianza durante el curso de su asistencia.
<br /><br />
Nuestro objetivo es respaldarlo en momentos difíciles.
<br /><br />
Para facilitar su servicio puede indicarnos su ubicación, esta información solo se usará para brindarle apoyo con mayor rapidez.
</div>
</div>
<div class="menudw"><a href="gochat.php?gr=<?php echo $general;?>" class="wtlink">ENTRAR</div> <!-- checkpoint --> 
</div>



</body>
</html>