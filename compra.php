<?php

session_start();
try{
    require_once ('lacolmenadata/conexion.php');
    $correo = $_SESSION['user'];
    $sql = "select * from usuarios where correo = '$correo'";
    $result=$conn->query($sql);
    $_r = $result->fetch_array();

}catch(Exception $e){
 $error = $e->getMessage();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilo.css">
    <script src="js/popper.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        
    <link rel="stylesheet" type="text/css" href="css/rantinaStyle.css">

    <link rel="stylesheet" href="css/sweetalert2.min.css">


	<link rel="icon" type="image/png" href="img/icono/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link rel="stylesheet" type="text/css" href="font-awesome/css/all.css">

    <title>Módulo de Compras</title>

</head>

<body>
    <header>
        <div class="container">
            <div class="row justify-content-between mb-5">
                <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
                    <a class="navbar-brand" href="venta.php">RANTINA FAST</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                        aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </nav>
            </div>
        </div>
    </header>

    <br>

    <main>
        <div class="container">
            <div class="row mt-3">
                <div class="col">
                    <h2 class="d-flex justify-content-center mb-3">Realizar Compra</h2>
                    <form id="procesar-pago" action="guardarfac.php" method="post">
                        <div class="form-group row">
                            <label for="cliente" class="col-12 col-md-2 col-form-label h2">Cliente :</label>
                            <div class="col-12 col-md-10">
                                <input type="text" class="form-control" id="cliente"
                                    placeholder="Ingresa nombre cliente" name="cliente" value="<?php echo $_r['nombres']; ?>" required disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12 col-md-2 col-form-label h2">CI/RUC :</label>
                            <div class="col-12 col-md-10">
                                <input type="text" class="form-control" id="cedula" 
                                    placeholder="1313459966" value="<?php echo $_r['ci']; ?>" name="cedula" required disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-12 col-md-2 col-form-label h2">Teléfono :</label>
                            <div class="col-12 col-md-10">
                                <input type="text" class="form-control"  
                                    placeholder="098065744" name="telefono" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-12 col-md-2 col-form-label h2">Dirección :</label>
                            <div class="col-12 col-md-10">
                                <input type="text" class="form-control"
                                    placeholder="Av. Maldonado" name="direccion" required>
                            </div>
                        </div>

                        <div class="form-group row">
                        <label class="col-12 col-md-2 col-form-label h2" for="fecha">Fecha :</label></td><?php date_default_timezone_set('America/Bogota'); ?>
                            <div class="col-12 col-md-10">
                            <p><?php echo date('Y-m-d');?><p>
                            <input class="form-control" type="date" name="fecha" value="<?php echo date('Y-m-d');?>" hidden>
                            <input name="fecha" value="<?php echo date('Y-m-d');?>" hidden>
                            <input name="mail" value="<?php echo $_SESSION['mail'];?>" hidden>
                            </div>
                            </div>


                    

                        <div id="carrito" class="form-group table-responsive" >
                            <table class="table" id="lista-compra" >
                                <thead>
                                    <tr>
                                        <th scope="col">Imagen</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Precio</th>
                                        <th scope="col">Cantidad</th>
                                        <th scope="col">Sub Total</th>
                                        <th scope="col">Eliminar</th>
                                    </tr>

                                </thead>
                                <tbody >

                                </tbody>
                                <tr>
                                    <th colspan="4" scope="col" class="text-right">SUB TOTAL :</th>
                                    <th scope="col">
                                        <p id="subtotal"></p>
                                    </th>
                                    <!-- <th scope="col"></th> -->
                                </tr>
                                <tr>
                                    <th colspan="4" scope="col" class="text-right">i.v.a (12%) :</th>
                                    <th scope="col">
                                        <p id="igv"></p>
                                    </th>
                                    <!-- <th scope="col"></th> -->
                                </tr>
                                <tr>
                                    <th colspan="4" scope="col" class="text-right">TOTAL :</th>
                                    <th scope="col">
                                        <input id="total" name="monto" class="font-weight-bold border-0" readonly style="background-color: white;">
                                    </th>
                                    <!-- <th scope="col"></th> -->
                                </tr>

                            </table>
                        </div>

                        <div class="row justify-content-center" id="loaders">
                            <img id="cargando" src="img/cargando.gif" width="220">
                        </div>

                        <div class="row justify-content-between">
                            <div class="col-md-4 mb-2"> 
                                <a href = "javascript:history.back()" class="btn btn-info btn-block">Seguir comprando</a>
                            </div>
                            <div class="col-xs-12 col-md-4">
                                <button href="" class="btn btn-success btn-block" id="procesar-compra">Realizar compra</button>
                            </div>
                        </div>
                    </form>


                </div>


            </div>

        </div>
    </main>





    </div>

    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/sweetalert2.min.js"></script>

    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/emailjs-com@2.3.2/dist/email.min.js"></script>

    <script src="js/carrito.js"></script>
    <script src="js/compra.js"></script>

    <script>
        function contar(esto){
            cuantas=esto.length;
            document.forms[0].total2.value="  "+ cuantas;
        }
        function contara(esto){
            cuantas=esto.length;
            document.forms[0].totala.value="  "+ cuantas;
        }
</script>


</body>

</html>