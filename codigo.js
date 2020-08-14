


$(document).ready( function() {   // Esta parte del código se ejecutará automáticamente cuando la página esté lista.
    $("#btn1").click( function() {     // Con esto establecemos la acción por defecto de nuestro botón de enviar.
                                      // Primero validará el formulario.
            $.post("pedido.php",$("#myform").serialize(),function(res){
                $("#formulario").fadeOut("slow");   // Hacemos desaparecer el div "formulario" con un efecto fadeOut lento.
                
            });
        
    });    
});

$(document).ready(function(){ 
    $("#btn1").click(function(){
        //tipos de mensajes succes, info, warning, error
        //titulo y mensaje de texto
        toastr["info"]("Gracias por hacer su pedido, en instantes confirmaremos su pedido", "¡Pedido Hecho!");   
        
    
    });
    
    toastr.options = { 
        //primeras opciones
        "closeButton": false, //boton cerrar
        "debug": false,
        "newestOnTop": false, //notificaciones mas nuevas van en la parte superior
        "progressBar": true, //barra de progreso hasta que se oculta la notificacion
        "preventDuplicates": false, //para prevenir mensajes duplicados
        
        "onclick": null,
        
        //Posición de la notificación
        //toast-bottom-left, toast-bottom-right, toast-bottom-left, toast-top-full-width, toast-top-center
        "positionClass": "toast-top-right",
                
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut",
        "tapToDismiss": false
    };
    
    
    
    
    
});