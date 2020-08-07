
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
   $("#contenidodinamico").load("listar_productos.php");
}
function agregarCategoria(){
	$("#contenidodinamico").load("ingreso_categoria.php");
}
function actualizarBodega(){
	$("#contenidodinamico").load("listar_categoria.php");
}
function cargarEditarBodega($id){
	var id = $id;
   $("#contenidodinamico").load("editar_bodega.php",{id:id});
}
function cargarEliminarCategoria($id){
	var id = $id;
   $("#contenidodinamico").load("eliminar_categoria.php",{id:id});
   $("#contenidodinamico").load("listar_categoria.php");
}
function cargarListarRegistro(){
	$("#contenidodinamico").load("listar_bodega.php");
}
function cargarGanancias(){
	$("#contenidodinamico").load("listado_ganancias.php");
}

/************PROVEEDOR************************ */


function provIngProd(){
	$("#contenidodinamico").load("panel_prov_ingprod_form.php");
}

function cargarListarProducto2(){
	$("#contenidodinamico").load("panel_prov_listprod.php");
}

function provListarOferta(){
	$("#contenidodinamico").load("panel_prov_listofer.php");
}

function provListarProducto(){
	$("#contenidodinamico").load("panel_prov_listprod.php");
}

