<?php 
include('conf.php'); 
include_once 'customFunctions.php';
$general=$_GET["gr"];
$db = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);
$result = mysqli_query($db,"SELECT status from chatstat where gr = '$general' LIMIT 1");
if (mysqli_num_rows($result)){ 
$status=mysqli_result($result,0,"status");
}
if ($status == 1 || empty($status)) {
	header("Location: http://app-quam.net/aateayuda.com/$general/");
	} else {}

	$result2 = mysqli_query($db,"SELECT date from chat where general = '$general' order by date desc LIMIT 1");
if (mysqli_num_rows($result2)){ 
$fecha=mysqli_result($result2,0,"date");
}
$d10=date("Y-m-d H:i:s",time()-43200);
$today = strtotime($d10);
$last = strtotime($fecha);

if ($last < $today && !empty($fecha)) {
		header("Location: http://app-quam.net/aateayuda.com/$general/");
	} else {}

 ?>
<html>
<head>
<link href="http://www.aateayuda.com/chatstyle.css" rel="stylesheet" type="text/css" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
</head>
<body>
<?php


require_once "class.Chat.php"; 
$chat = new Chat();
$chat->createChat($_GET['gr'],"bubbledRight");
?>
</body>
</html>
