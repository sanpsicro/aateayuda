        

<?php
include ("conf.php");
// Geolocation detection with JavaScript, HTML5 and PHP
// http://locationdetection.mobi/
// Andy Moore
// http://andymoore.info/
// this is linkware if you use it please link to me:
// <a href="http://web2txt.co.uk/">Mp3 Downloads</a>



list($lat,$long) = explode(',',htmlentities(htmlspecialchars(strip_tags($_GET['latlng']))));
echo '<img src="https://maps.googleapis.com/maps/api/staticmap?center='.$lat.','.$long.'&zoom=16&size='.$_GET["wd"].'x'.$_GET["hg"].'&markers=color:red%7C'.$lat.','.$long.'&maptype=roadmap&sensor=false&key=AIzaSyDpoXEAhSTxAJE8NUcOithSDVCseaRa_hM" width="'.$_GET["wd"].'" height="'.$_GET["hg"].'" /><br /><br />';

$gral = $_GET["gr"];
$link = mysqli_connect($host,$username,$pass,$database);
$sSQL="UPDATE chatstat SET lat='$lat', longi='$long' where gr='$gral'";
mysqli_query($link, $sSQL);

?>