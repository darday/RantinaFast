<?php
    include_once 'user.php';
    include_once 'user_session.php';

    $userSession = new UserSession();
    $user = new User();

    if(isset($_SESSION['user']))
    {
        $user->setUser($userSession->getCurrentUser());
    }

     $idop=$_REQUEST['id'];
     try{
         require_once 'lacolmenadata/conexion.php';
         $sql2="select * from producto where id_producto='$idop'";
         $result2=$conn->query($sql2);
         }catch(Exception $e){
                              $error=$e->getMessage();
                             }
         $row2=$result2->fetch_array();
     ?>
<div class="card text-center">
  <div class="card-header">EDITAR PRODUCTO</div>
  <div class="card-body text-center">
            <form action="editar_productoln.php" enctype="multipart/form-data" method="POST">
            <table class="table table-borderless">
                <tr>
                    <th colspan="2"><h4>Datos Producto</h4></th>
                </tr>
                <tr>
                    <td><label for="seccion">Tipo de envase</label></td>
                    <td><select class="form-control" name="cate">
                      <?php
                      try{
                          require_once 'lacolmenadata/conexion.php';
                          $sql="select * from categoria";
                          $result=$conn->query($sql);
                          }catch(Exception $e){
                                               $error=$e->getMessage();
                                              }
                          while($row=$result->fetch_array()){
                      ?>
                      <option  value="<?php echo $row['id_cat'];?>"><?php echo $row['nombre_cat'];?></option>
                      <?php
                      }
                      ?>
                    </select></td>
                </tr>
                <tr>
                    <td><label for="titulo">Nombre Producto</label></td>
                    <td>
                        <input value="<?php echo $row2['nombre_producto'];?>" class="form-control" type="text" name="nombre" required  maxlength="50" onkeydown="contar(this.value)" onkeyup="contar(this.value)">
                        <div class="form-row">
                            <label style="color: gray;">&nbsp;Caracteres ingresados (50 Máx.) :&nbsp;&nbsp;</label><input class="form-control col-md-1" type="text" name="total" id="total" disabled>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><label for="contenido">Descripción</label></td>
                    <td><textarea class="form-control" name="contenido" cols="30" rows="10"><?php echo $row2['descripcion'];?></textarea></td>
                    <script language="Javascript" type="text/javascript">
                        CKEDITOR.replace( 'contenido' );
                    </script>
                </tr>  
                <tr>
                    <td><label for="pieft">Precio Sugerido</label></td>
                    <input value="<?php echo $idop;?>" name="id" hidden>
                    <td><input value="<?php echo $row2['precio'];?>" type="number" step=".01" class="form-control" name="precio" required></td>
                </tr>
                <tr>
                    <td><label for="pieft">Precio Producc.</label></td>
                    <td><input value="<?php echo $row2['precio_pr'];?>" type="number" step=".01" class="form-control" name="preciopr" required></td>
                </tr>
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
