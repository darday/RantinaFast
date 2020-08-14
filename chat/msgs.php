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
$sql=$dbh->prepare("SELECT * FROM pedido");
$sql->execute();
while($r=$sql->fetch()){
	if($_SESSION['user'] == $r['correo_usuario']){
		$aktip = "bubble-right";
	}else{
		$aktip = "bubble-left";
	}
 echo "<div class='urltag $aktip'><p><span class='name'>{$r['correo_usuario']}</span><span class='msgc'>".urlf($r['pedido'])."</span></p></div>";
}
if(!isset($_SESSION['user']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH'])=='xmlhttprequest'){
 echo "<script>window.location.reload()</script>";
}

   function urlf($text){
      $reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
     preg_match_all($reg_exUrl, $text, $matches);
     $usedPatterns = array();
     foreach($matches[0] as $pattern){
       if(!array_key_exists($pattern, $usedPatterns)){
         $usedPatterns[$pattern]=true;
         $text = str_replace  ($pattern, '<a href="'.$pattern.'" rel="nofollow">'.$pattern.'</a> ', $text);   
       }
     }
     return $text;
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
