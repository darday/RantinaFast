<?php
    include_once 'user.php';
    include_once 'user_session.php';

    $userSession = new UserSession();
    $user = new User();

    if(isset($_SESSION['user']))
    {
        $user->setUser($userSession->getCurrentUser());
    }

 ?>
<div class="card text-center">
  <div class="card-header">REGISTRAR PRODUCTO</div>
  <div class="card-body text-center">
            <form action="productoln.php" enctype="multipart/form-data" method="POST">
            <table class="table table-borderless">
                <tr>
                    <th colspan="2"><h4>DATOS PRODUCTO</h4></th>
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
                      <option value="<?php echo $row['id_cat'];?>"><?php echo $row['nombre_cat'];?></option>
                      <?php
                      }
                      ?>
                    </select></td>
                </tr>
                <tr>
                    <td><label for="titulo">Nombre Producto</label></td>
                    <td>
                        <input class="form-control" type="text" name="nombre" required  maxlength="50" onkeydown="contar(this.value)" onkeyup="contar(this.value)">
                        <div class="form-row">
                            <label style="color: gray;">&nbsp;Caracteres ingresados (50 Máx.) :&nbsp;&nbsp;</label><input class="form-control col-md-1" type="text" name="total" id="total" disabled>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><label for="contenido">Descripción</label></td>
                    <td><textarea class="form-control" name="contenido" cols="30" rows="10"></textarea></td>
                    <script language="Javascript" type="text/javascript">
                        CKEDITOR.replace( 'contenido' );
                    </script>
                </tr>  
                <tr>
                    <td><label for="pieft">Precio Sugerido</label></td>
                    <td><input type="number" required step=".01" class="form-control" name="precio"></td>
                </tr>
                <tr>
                    <td><label for="pieft">Precio Producc.</label></td>
                    <td><input type="number" required step=".01" class="form-control" name="preciopr"></td>
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
