<?php
// Descargado de la pagina http://tusolutionweb.blogspot.pe/
//SIGUENOS
//Siguenos en twitter
//https://twitter.com/tusolutionweb
//Vista nuestra pagina web
//http://tusolutionweb.blogspot.com/
//Siguenos en facebook
//https://www.facebook.com/CodigofuenteGratis/

if(!isset($dbh)){
 session_start();
 date_default_timezone_set("UTC");
 $musername = "root";
 $mpassword = "";
 $hostname  = "localhost";
 $dbname    = "rantinafast";
 $dbh=new PDO('mysql:dbname='.$dbname.';host='.$hostname.";port=3306",$musername, $mpassword);
 /*Change The Credentials to connect to database.*/
 include("user_online.php");
 // Descargado de la pagina http://tusolutionweb.blogspot.pe/
//SIGUENOS
//Siguenos en twitter
//https://twitter.com/tusolutionweb
//Vista nuestra pagina web
//http://tusolutionweb.blogspot.com/
//Siguenos en facebook
//https://www.facebook.com/CodigofuenteGratis/

}
?>

