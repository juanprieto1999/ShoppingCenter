var actualizar = function(dato)
  {  
	var id=dato.getAttribute("data-id");
	var href=dato.getAttribute("data-href");
	var cantidad=$("#product_"+ id).val();
	window.location.href = href +"/"+ cantidad;
  }