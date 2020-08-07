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
  <div class="card-header">NUEVA CATEGORÍA</div>
  <div class="card-body text-center">
            <form action="categorialn.php" enctype="multipart/form-data" method="POST">
            <table class="table table-borderless">
                <tr>
                    <th colspan="2"><h4>DATOS CATEGORÍA</h4></th>
                </tr>
                <tr>
                    <td><label for="titulo">Tipo de Envase</label></td>
                    <td>
                        <input class="form-control" type="text" name="nombre" required  maxlength="50" onkeydown="contar(this.value)" onkeyup="contar(this.value)">
                        <div class="form-row">
                            <label style="color: gray;">&nbsp;Caracteres ingresados (50 Máx.) :&nbsp;&nbsp;</label><input class="form-control col-md-1" type="text" name="total" id="total" disabled>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><label for="pieft">Cantidad Bodega</label></td>
                    <td><input type="number" min="1" max="15000" class="form-control" name="bodega" required></td>
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
