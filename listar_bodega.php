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
  <div class="card-header">REGISTRO DE CAMBIOS EN BODEGA</div>
  <div class="card-body text-center">
      <?php
              try{
                  require_once ('lacolmenadata/conexion.php');
                  $sql = "select * from modifi_bodega";
                  $result = $conn->query($sql);
              }
              catch (Exception $e){
                  $error= $e->getMessage();
              }
              ?>
              <table class="display" id="tabla" style="font-size: 13px ">
              <thead>
                <tr>
                  <th>Fecha</th>
                  <th>Motivo Modificación</th>
                  <th>Cantidad</th>
                  <th>Tipo Envase</th>
                </tr>
              </thead>
              <tbody>
              <?php
              $i = 0;
              while($row = $result->fetch_array()) {
                if ($row != null) {
                  $i = $i+1;
                  $idcate = $row["id_cat"]; 
                  try{
                  require_once ('lacolmenadata/conexion.php');
                  $sql2 = "select * from categoria where id_cat='$idcate'";
                  $result2 = $conn->query($sql2);
                  $row2 = $result2->fetch_array();
                  }catch(Exception $e){
                  $error= $e->getMessage();
                  }

                   printf("
                          <tr>
                          <td>%s</td>
                          <td>%s</td>
                          <td>%s</td>
                          <td>%s</td>
                          ",$row["fecha"],$row["accion"],$row["cantidad"],$row2["nombre_cat"]);
       
                }
              }
              $result->close();
              $conn->close();
          ?>
              </tbody>
        </table>
  </div>
</div>
