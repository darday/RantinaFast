
//Cargar listado de productos
function cargarListarProducto(){
	$("#contenidodinamico").load("listar_productos.php");
	
}
function cargarIngresarProducto(){
	$("#contenidodinamico").load("ingreso_producto.php");
}
function cargarEditarProducto($id){
	var id = $id;
   $("#contenidodinamico").load("editar_producto.php",{id:id});
}
function cargarEliminarProducto($id){
	var id = $id;
   $("#contenidodinamico").load("eliminar_producto.php",{id:id});
}
function cargarEditarBodega($id){
	var id = $id;
   $("#contenidodinamico").load("editar_bodega.php",{id:id});
}
function cargarRegistro(){
	$("#contenidodinamico").load("listar_bodega.php");
}



function cargarListarProducto2(){
	$("#contenidodinamico").load("listar_productos.php");
}


