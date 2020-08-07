<?php
    include_once 'user.php';
    include_once 'user_session.php';

    $userSession = new UserSession();
    $user = new User();

    if(isset($_SESSION['user']))
    {
        $user->setUser($userSession->getCurrentUser());
    }

     $id=$_REQUEST['id'];
     try{
         require_once 'lacolmenadata/conexion.php';
         $sql2="select * from categoria where id_cat='$id'";
         $result2=$conn->query($sql2);
         }catch(Exception $e){
                              $error=$e->getMessage();
                             }
         $row2=$result2->fetch_array();
     ?>
<div class="card text-center">
  <div class="card-header">CONTROL DE BODEGA</div>
  <div class="card-body text-center">
            <form action="editar_bodegaln.php" enctype="multipart/form-data" method="POST">
            <table class="table table-borderless">
                <tr>
                    <th colspan="2"><h4>Inventario</h4></th>
                </tr>
                <tr>
                    <td><label for="seccion">Operación</label></td>
                    <td><select class="form-control" name="op">
                      <option selected value="1">Agregar a Inventario</option>
                      <option value="0">Quitar de Inventario</option>
                      
                    </select></td>
                </tr>
                <tr>
                    <td><label for="pieft">Existencia Bodega</label></td>
                    <td><label for="pieft"><?php echo $row2['bodega'];?></label></td>
                </tr>
                <tr>
                    <td><label for="pieft">Cantidad de Envases</label></td>
                    <td><input type="number" required min="1" max="15000" class="form-control" name="bodega"></td>
                </tr>
                <input type="number" value="<?php echo $id;?>" name="id" hidden>
                <input class="form-control" type="date" name="fecha" value="<?php echo date('Y-m-d');?>" hidden>
                <tr>
                    <td colspan="2">
                      <input  class="btn btn-primary" type="submit" value="Guardar">
                      <input  class="btn btn-primary" type="reset" value="Limpiar">
                    </td>
                </tr>
             </table>
            </form>
    </div>
</div>

<script>
        function contar(esto){
            cuantas=esto.length;
            document.forms[0].total.value="  "+ cuantas;
        }
</script>
