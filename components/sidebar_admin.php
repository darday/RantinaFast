<head>
	<meta charset="UTF-8">
	<title>Administración</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="x-ua-compatible" content="ie-edge">
	<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
	<script type="text/javascript" charset="utf8" src="js/jquery.dataTables.js"></script>
	<link rel="icon" type="image/png" href="img/icono/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link rel="stylesheet" type="text/css" href="font-awesome/css/all.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
	<link rel="stylesheet" type="text/css" href="css/rantinaStyle.css">



</head>



<BR>
<div class="list-group " >
    <a href="admin.php" class="list-group-item active">
        <i class="fas fa-home"></i>  Menu principal
    </a>
    
</div>
<br>

<div class="list-group " style="color:black">
    <a  class="list-group-item active">
         CLIENTES
    </a>
        
		<a href="admin_ingclien_form.php" class="list-group-item">
			<i class="fas fa-plus-square" style="font-size:20px;"></i>
			Agregar Clientes
		</a>
		<a  onclick="adminListarCliente();"  class="list-group-item">
			<i class="fa fa-list-alt" style="font-size:20px;"></i>
			Listar Clientes
		</a>

	<a  class="list-group-item active">
          PROVEEDORES
	</a>
	
		<a href="admin_ingprov_form.php" class="list-group-item">
			<i class="fas fa-plus-square" style="font-size:20px;"></i>
				Agregar Proveedor	<br>
		</a>
		<a onclick="adminListarProveedor()" class="list-group-item">
			<i class="fa fa-list-alt" style="font-size:20px;"></i>
				Listar Proveedor
		</a>
	
	<a  class="list-group-item active">
		 NOTICIAS
	</a>
	
		<a href="admin_ingnot_form.php" class="list-group-item">
			<i class="fas fa-plus-square" style="font-size:20px;"></i>
				Agregar Noticias	<br>
		</a>

		<a onclick="adminListarNoticia();" class="list-group-item">
			<i class="fa fa-list-alt" style="font-size:20px;"></i>
				Listar Noticias
		</a>
		
	<a  class="list-group-item active">
		 MI PERFIL
	</a>
	<a href="admin_editadmin_form.php" class="list-group-item">
		<i class="fa fa-university" style="font-size:20px;"></i>
		Ver Mi Perfil
	</a>
    
</div>






