<?php 
     // Descargado de la pagina http://tusolutionweb.blogspot.pe/
//SIGUENOS
//Siguenos en twitter
//https://twitter.com/tusolutionweb
//Vista nuestra pagina web
//http://tusolutionweb.blogspot.com/
//Siguenos en facebook
//https://www.facebook.com/CodigofuenteGratis/

include("config.php");
$sql=$dbh->prepare("SELECT name FROM chatters");
$sql->execute();
		$aktip = "";
while($r=$sql->fetch()){
     if(isset($_SESSION['user'])){
	if($_SESSION['user'] == $r['name']){
		$aktip = "<a href='logout.php' class='keluar'>Keluar</a>";
	}
	 }
 echo "<div class='user'>{$r['name']} $aktip</div>";
}

     // Descargado de la pagina http://tusolutionweb.blogspot.pe/
//SIGUENOS
//Siguenos en twitter
//https://twitter.com/tusolutionweb
//Vista nuestra pagina web
//http://tusolutionweb.blogspot.com/
//Siguenos en facebook
//https://www.facebook.com/CodigofuenteGratis/

?>
