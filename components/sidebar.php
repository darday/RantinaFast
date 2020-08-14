<?php 

require_once 'lacolmenadata/conexion.php';
$get_comment = "SELECT * FROM pedido WHERE estado = '0'";
$get_comment_run = mysqli_query($conn, $get_comment);
$num_of_rows = mysqli_num_rows($get_comment_run);

?>

<BR>
<div class="list-group " >
    <a href="panel_prov.php" class="list-group-item active">
        <i class="fas fa-home"></i>  Menu principal
    </a>
    
</div>
<br>

<div class="list-group " style="color:black">
	<a  class="list-group-item active">
         LISTAS DE COMPRAS
	</a>
	
        
    
    <a   class="list-group-item">

		<?php
            if ($num_of_rows > 0) {
                echo "<span >$num_of_rows</span>";
            }else{
				echo "<span >0</span>";

			}
            ?>
			Mensajes Nuevos

			
	</a>
    <a href="panel_prov_listlistcomp.php"  class="list-group-item">

		
		<i class="fa fa-list-alt" style="font-size:20px;"></i>
			Ver Lista de Compras

			
	</a>

	<a  class="list-group-item active">
         MIS PEDIDOS
    </a>
        
    
    <a  onclick="provListarPedido();"  class="list-group-item">
		<i class="fa fa-list-alt" style="font-size:20px;"></i>
			Ver Pedidos
	</a>

    <a  onclick="provListarPedidoEntregado()"  class="list-group-item">
		<i class="fa fa-list-alt" style="font-size:20px;"></i>
			Ver Pedidos Entregados
	</a>


    <a  class="list-group-item active">
         PRODUCTOS
    </a>
        
		<a href="panel_prov_ingprod_form.php" class="list-group-item">
			<i class="fas fa-plus-square" style="font-size:20px;"></i>
			Agregar Productos
		</a>
		<a  onclick="provListarProducto();"  class="list-group-item">
			<i class="fa fa-list-alt" style="font-size:20px;"></i>
										Listar Productos
		</a>

	<a  class="list-group-item active">
          OFERTAS/CANASTA
	</a>
	
		<a href="panel_prov_ingofer_form.php" class="list-group-item">
			<i class="fas fa-plus-square" style="font-size:20px;"></i>
									Agregar Ofertas/Canasta	<br>
		</a>
		<a onclick="provListarOferta();" class="list-group-item">
			<i class="fa fa-list-alt" style="font-size:20px;"></i>
									Listar Ofertas
		</a>
	
	<a  class="list-group-item active">
		 MI NEGOCIO
	</a>
	<a href="panel_prov_editprov_form.php" class="list-group-item">
	<i class="fa fa-university" style="font-size:20px;"></i>
									Ver Mi Negocio
		</a>
    
</div>