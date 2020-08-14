<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
<script src="css/jsindex.js"></script>
<script>    
$(document).ready( function () {
    $('#tabla').DataTable({
        language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Último",
            "next": "Siguiente",
            "previous": "Anterior"
        }
    },
    });
} );
</script>

  <div class="card text-center">
    <BR>
  <div class="wrap-input100  m-b-26 text-center" data-validate="Campo Obligatorio">
			<h1>LISTAR PEDIDOS</h1>
  </div>
  <div class="card-body text-center">
      <?php

session_start();
require_once('user.php');
require_once('user_session.php');

$correo=$_SESSION['user'];
//echo $correo;
              try{
                  require_once ('lacolmenadata/conexion.php');
                  $id_query = "Select * from usuarios where correo='$correo'";
                  $run = mysqli_query($conn, $id_query);
                  $row = mysqli_fetch_array($run);
                  $id_user=$row['idusuario'];

                  $sql = "SELECT usuarios.nombres, usuarios.correo, factura.fecha, factura.id_factura
                  FROM usuarios
                  INNER JOIN factura ON usuarios.idusuario = factura.id_cliente where factura.local ='$correo' && factura.estado = 0  ORDER BY factura.id_factura desc";
                  $result = $conn->query($sql);

                  
              }
              catch (Exception $e){
                  $error= $e->getMessage();
              }
              ?>
              <table class="display" id="tabla" style="font-size: 13px ">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Cliente</th>
                  <th>Correo</th>
                  <th>Fecha</th>
                  <th>Ver</th>
                </tr>
              </thead>
              <tbody>
              <?php
              $i = 0;
              while($row = $result->fetch_array()) {
                if ($row != null) {
                  $i = $i+1;
                  $nomb = $row["nombres"];
                  $corr = $row["correo"];
                  $fecha = $row["fecha"];
                  $id_fac=$row["id_factura"];

                  ?>
                   
                          <tr>
                          <td> <?php echo $i; ?> </td>
                          <td> <?php echo $nomb; ?> </td>
                          <td> <?php echo $corr; ?> </td>
                          <td> <?php echo $fecha; ?> </td>
                          
                          
                          <td><a href='panel_prov_verped_form.php?fac=<?php echo $id_fac?>' title='Editar' ><i class='fas fa-edit'></i></a></td>
                          <?php
                }
              }
              $result->close();
              $conn->close();
          ?>
              </tbody>
        </table>
  </div>
</div>
