<?php
$con=new mysqli('localhost','root','','firstphp');
if($con->connect_error){
  die("Connection failed:". $con->connect_error);
}

$db_selected= mysqli_select_db($con,'firstphp');
if(!$db_selected)
{
  die('Cannot use Kittie dabase'.mysql_error());
}


 ?>
