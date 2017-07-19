<html>
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
<?
include('conf.php'); 
$general=$_GET["gr"];
$db = mysql_connect($host,$username,$pass);
mysql_select_db($database,$db);
$result = mysql_query("SELECT status from chatstat where gr = '$general' LIMIT 1",$db);
if (mysql_num_rows($result)){ 
$status=mysql_result($result,0,"status");
}

if ($status == 1 || empty($status)) {
echo "Chat no activo";
die();
	} else {}

$result2 = mysql_query("SELECT date from chat where general = '$general' order by date desc LIMIT 1",$db);
if (mysql_num_rows($result2)){ 
$fecha=mysql_result($result2,0,"date");
}
$d10=date("Y-m-d H:i:s",time()-43200);
$today = strtotime($d10);
$last = strtotime($fecha);

if ($last < $today && !empty($fecha)) {
		header("Location: http://aateayuda.com/$general/");
	} else {}

 ?>
<strong>¿Tu ubicación es correcta?</strong><br /><br />
<div id="geo" class="geolocation_data"></div>
<script type="text/JavaScript" src="geo.js"></script>
</div>
</div>
<div class="menudw"><a href="close.php" class="wtlink">SI, REGISTRAR</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="get.php?gr=<?=$_GET["gr"]?>" class="wtlink">NO, CORREGIR</a></div>
</div>
  </body>
</html>
