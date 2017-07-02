<title> Resultant LINK </title>
<h1>The Resultant Shortened URL is:</h1>
<?php
$var = $_GET['link'];
$mysql_host = 'localhost';
$mysql_username = 'root';
$mysql_password='';
$mysql_db='practicedata';
$conn = mysqli_connect($mysql_host,$mysql_username,$mysql_password,$mysql_db) or die('sorry error!! Cant connect!');
$query = "SELECT `resultantlink` from `linkshortener` where `matchencrypt`= '$var'";
if($query_run=mysqli_query($conn,$query)){
while($rows = mysqli_fetch_assoc($query_run)){
  echo "<a href='".$rows['resultantlink']."'>".$rows['resultantlink']."</a>";
  BREAK;
}
}
mysqli_close($conn);

?>
