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
    <link rel="stylesheet" href="css/galeria.css"type="text/css" media="screen" >
    <!--Iconos-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--agregada-->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="js/galeria.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/lightslider.js"></script>
    
    <script>
              $('#lightSlider').lightSlider({
                gallery: true,
                item: 1,
                loop:true,
                slideMargin: 0,
                thumbItem: 9
                });
    </script>
              


    <title>Galeria</title>
</head>
<body class="body">
    
<!--------------------------------NavBar--------------------------------->
    <?php
     require_once('components/navbar.php');
    ?>
<!--------------------------------NavBar--------------------------------->

<div class="breadcumb-area "  >
        <div class="container h-100 ">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="bradcumb-title text-center animated zoomIn"><br>
                        <h2>GALERIA</h2>
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

<div class="container">
    <div class="row ">
    <div class="demo">
    <ul id="lightSlider" >
        <li data-thumb="https://sachinchoolur.github.io/lightslider/img/thumb/cS-1.jpg">
            <img src="https://sachinchoolur.github.io/lightslider/img/cS-1.jpg" />
        </li>
        <li data-thumb="https://sachinchoolur.github.io/lightslider/img/thumb/cS-2.jpg">
            <img src="https://sachinchoolur.github.io/lightslider/img/cS-2.jpg" />
        </li>
        <li data-thumb="https://sachinchoolur.github.io/lightslider/img/thumb/cS-3.jpg">
            <img src="https://sachinchoolur.github.io/lightslider/img/cS-3.jpg" />
        </li>
        <li data-thumb="https://sachinchoolur.github.io/lightslider/img/thumb/cS-4.jpg">
            <img src="https://sachinchoolur.github.io/lightslider/img/cS-4.jpg" />
        </li>
        <li data-thumb="https://sachinchoolur.github.io/lightslider/img/thumb/cS-5.jpg">
            <img src="https://sachinchoolur.github.io/lightslider/img/cS-5.jpg" />
        </li>
        <li data-thumb="https://sachinchoolur.github.io/lightslider/img/thumb/cS-6.jpg">
            <img src="https://sachinchoolur.github.io/lightslider/img/cS-6.jpg" />
        </li>
        <li data-thumb="https://sachinchoolur.github.io/lightslider/img/thumb/cS-7.jpg">
            <img src="https://sachinchoolur.github.io/lightslider/img/cS-7.jpg" />
        </li>
        <li data-thumb="https://sachinchoolur.github.io/lightslider/img/thumb/cS-8.jpg">
            <img src="https://sachinchoolur.github.io/lightslider/img/cS-8.jpg" />
        </li>
        <li data-thumb="https://sachinchoolur.github.io/lightslider/img/thumb/cS-9.jpg">
            <img src="https://sachinchoolur.github.io/lightslider/img/cS-9.jpg" />
        </li>
        <li data-thumb="https://sachinchoolur.github.io/lightslider/img/thumb/cS-10.jpg">
            <img src="https://sachinchoolur.github.io/lightslider/img/cS-10.jpg" />
        </li>
        <li data-thumb="https://sachinchoolur.github.io/lightslider/img/thumb/cS-11.jpg">
            <img src="https://sachinchoolur.github.io/lightslider/img/cS-12.jpg" />
        </li>
        <li data-thumb="https://sachinchoolur.github.io/lightslider/img/thumb/cS-13.jpg">
            <img src="https://sachinchoolur.github.io/lightslider/img/cS-13.jpg" />
        </li>
    </ul>
</div>
         

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
  require_once('components/footer.php');
 ?>


<!-- Footer -->
<!--------------------------------Footer-------------------------------------->


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>