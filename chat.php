<link href="https://app-quam.net/aateayuda.com/chatstyle.css" rel="stylesheet" type="text/css" />
<?php 


error_reporting(E_ALL);

isset($_POST['color']) ? $color = $_POST['color'] : $color ="" ;
isset($_POST['name']) ? $name= $_POST['name'] : $name="" ;
isset($_POST['text']) ? $text= $_POST['text'] : $text="" ;
isset($_POST['op']) ? $op= $_POST['op'] : $op="" ;


isset($data) ? $data= $data : $data ="" ;



require_once "class.MySQL.php";
include ("conf.php");
$dbconnect = new MySQL();
$dbconnect->connectMySql("com.inc");
$ip=$_SERVER['REMOTE_ADDR'];
$d=date("Y-m-d H:i:s",time());
$d10=date("Y-m-d H:i:s",time()-864000);
if ($op=="insert"){
 if ($text!="") $dbconnect->query("insert into chat (date,name,text,ip,color,general) values (now(), 'usuario','$text','$ip','$color', '$name')");
 $dbconnect->query("UPDATE chatstat SET atendido = 0 where gr='$name'");
}

$result = $dbconnect->query("select date,name,text,color from chat where general=$name order by date asc");
$data = $data . "";
for ($i = 0; $i < mysqli_num_rows($result); $i++)  { 
  $row_array = mysqli_fetch_row($result);
  $datero=date_create($row_array[0]);
  $data .= "<div class=\"$row_array[3]\">";
  $data .= "".wordwrap($row_array[2], 40, '<br>',true)."<br /><div class=\"date\">".date_format($datero, 'g:i A')."";
  if ($row_array[3] === "bubbledRight") { $data .= "&nbsp;&nbsp;<img src=\"http://www.app-quam.net/aateayuda.com/ticks.png\">"; } else {}
  $data .= "</div></div>";
}
$data .="";
print $data;
?>
