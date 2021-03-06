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
  <div class="card-header">LISTAR PRODUCTOS</div>
  <div class="card-body text-center">
      <?php
              try{
                  require_once ('lacolmenadata/conexion.php');
                  $sql = "select * from categoria";
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
                  <th>Nombre</th>
                  <th>Bodega</th>
                  <th>Aumentar/Quitar</th>
                  <th>Eliminar</th>
                  <th>Estado</th>
                </tr>
              </thead>
              <tbody>
              <?php
              $i =0;
              while($row = $result->fetch_array()) {
                if ($row != null) {
                  $i = $i +1;
                   printf("
                          <tr>
                          <td>%s</td>
                          <td>%s</td>
                          <td>%s</td>
                          <td><a title='Editar' onclick='cargarEditarBodega(%s);'><i class='fas fa-sync'></i></a></td>
                          <td><a title='Eliminar' onclick='cargarEliminarCategoria(%s);'><i class='fas fa-trash'></i></a></td>
                          ",$i,$row["nombre_cat"],$row["bodega"],$row["id_cat"],$row["id_cat"]);

                          if($row["bodega"]<1000){
                            echo "<td style='background-color:FireBrick;'><p style='color:white;'>!Baja existencia¡</p></td>";
                          }else{
                            echo "<td style='background-color:ForestGreen;'><p style='color:white;'>Stock Suficiente</p></td>";
                          }
       
                }
              }
              $result->close();
              $conn->close();
          ?>
              </tbody>
        </table>
  </div>
</div>
