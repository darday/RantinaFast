<?php
    require_once ('lacolmenadata/conexion.php');

    $id_query = "Select * from usuarios where tipo=2 ";
    $run = mysqli_query($conn, $id_query);
   // $row = mysqli_fetch_array($run);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Responsive-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css"type="text/css" media="screen" >
    <!--Iconos-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--agregada-->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    

    <title>Tiendas</title>
</head>
<body class="body">
    
<!--------------------------------NavBar--------------------------------->
<?php
  require_once('components/navBar2.php');
 ?>
<!--------------------------------NavBar--------------------------------->

<div class="breadcumb-area "  >
        <div class="container h-100 ">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="bradcumb-title text-center animated zoomIn"><br><br><br>
                        <h2>TIENDAS REGISTRADAS</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!--------------------------------Informacion-------------------------------->
<br>
<br>
<br>
<br>

<div class="container animated fadeInUp">

    <div class="row ">
    <?php
    //$i=0;
    while($row = mysqli_fetch_array($run)) {
        if ($row != null) {
          //$i = $i+1;
          $tit = $row["nombre_local"];
          $img = $row["logo"];
          $id = $row["idusuario"]
          ?>

            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 text-center">
                <div id="">
                    <div  class="box">
                        
                            <img  src="img/prov/<?php echo $img?>"  height="250px"/>
                         
                    </div>
                    <a ><h5><?php echo $tit?></h5></a>
                    
                    <hr>
                
                </div>
            </div>   
           
                  
                  <?php
        }
      }
      $run->close();
      $conn->close();
?>
       

        <!--------------------------------------------------------->
    </div>   
</div>
<!--------------------------------Informacion-------------------------------->

<!--------------------------------Footer-------------------------------------->
<!-- Footer -->
<br>
<br>
<br>
<br>


  <?php
  require_once('components/footer2.php');
 ?>


<!-- Footer -->
<!--------------------------------Footer-------------------------------------->


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>