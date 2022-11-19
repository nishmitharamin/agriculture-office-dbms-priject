<?php
    $server ="localhost";
    $username="root";
    $password="";
    $db= "agriculture_office";

$con= mysqli_connect($server,$username,$password,$db,3307);
if($con === false){
   die("database is not connected");
}
else{

echo " ";}
//include_once('index.php');
//mysql_select_db('agriculture_office');

//$con=mysql_connect("localhost","root","","test");

?>