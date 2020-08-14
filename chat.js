function scTop(){
 $(".msgs").animate({scrollTop:$(".msgs")[0].scrollHeight});
}
function load_new_stuff(){
 localStorage['lpid']=$(".msgs .msg:last").attr("title");
 $(".msgs").load("msgs.php",function(){
  if(localStorage['lpid']!=$(".msgs .msg:last").attr("title")){
   scTop();
  }
 });
}

$(document).ready(function(){ 
    $('.tab').click(function(){
		var dip = $(this).data('dip');
		if(dip == "chat"){
        $('.chat').css('display','block');
        $('.users').css('display','none');
		}else{
        $('.chat').css('display','none');
        $('.users').css('display','block');
		}
		return false;										 
    });
 scTop();
 $("#msg_form").on("submit",function(){
       // Con esto establecemos la acción por defecto de nuestro botón de enviar.
                                          // Primero validará el formulario.
                $.post("pedido.php",$("#msg_form").serialize(),function(res){
                    $("#formulario").fadeOut("slow");   // Hacemos desaparecer el div "formulario" con un efecto fadeOut lento.
                    
                });
            
       
 });
});
