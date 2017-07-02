<?php
if(isset($_POST['userlink'])&& !empty($_POST['userlink'])){
    $varlink = $_POST['userlink'];
    if(!(substr( $varlink, 0, 7 ) === "http://" || substr( $varlink, 0, 8 ) === "https://")){
        $finalvarlink = "https://".$varlink;
    }
    else{
      $finalvarlink = $varlink;
    }

    $arrlink = explode(".",$finalvarlink);
    $arrlink1 = explode("//",$arrlink[0]);
    ///echo $arrlink[1];
    $encrypt = md5($arrlink[1]);
    $encryptlink = "redirect.php?link=".$encrypt;
    $redirect = "results.php?link=".$encrypt;
    //echo $encryptlink;
    $mysql_host = 'localhost';
    $mysql_username = 'root';
    $mysql_password='';
    $mysql_db='practicedata';
    $conn = @mysqli_connect($mysql_host,$mysql_username,$mysql_password,$mysql_db) or die('sorry error!! Cant connect!');
    $query = "INSERT INTO linkshortener(userlink,resultantlink,matchencrypt)
VALUES ('$finalvarlink','$encryptlink','$encrypt')";
    mysqli_query($conn,$query);
    mysqli_close($conn);
    header("Location:".$redirect);
  }

unset($_POST['userlink']);
?>


<html>
  <head>
    <title> LINK SHORTENER </title>
  </head>
  <body>
    <form action="" method="POST">
      <h1> Enter Link you want to shorten!</h1>
      <input type="text" name="userlink">
      <input type="submit"  value="Submit!">
    </form>
  </body>

</html>
