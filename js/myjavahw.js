$(function(){	
	$('#nuevo').on('click',function(){
		$('#formulario')[0].reset();
		$('#so').val('Registro');
		$('#edi').hide();
		$('#reg').show();
		$('#registra').modal({
			show:true,
			backdrop:'static'
		});
	});
	
	$('#bs-prod').on('keyup',function(){
		var dato = $('#bs-prod').val();
		var url = '../php/busca_otrohw.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'dato='+dato,
		success: function(datos){
			$('#agrega-registros').html(datos);
		}
	});
	return false;
	});
	
});

function agregaRegistro(){
	var url = '../php/agrega_otrohw.php';
	$.ajax({
		type:'POST',
		url:url,
		data:$('#formulario').serialize(),
		success: function(registro){
			if ($('#so').val() == 'Registro'){
			$('#formulario')[0].reset();
			$('#mensaje').addClass('bien').html('Registro completado con exito').show(200).delay(2500).hide(200);
			$('#agrega-registros').html(registro);
			return false;
			}else{
			$('#mensaje').addClass('bien').html('Edicion completada con exito').show(200).delay(2500).hide(200);
			$('#agrega-registros').html(registro);
			return false;
			}
		}
	});
	return false;
}

function eliminarRegistro(id){
	var url = '../php/elimina_otrohw.php';
	var pregunta = confirm('¿Esta seguro de eliminar el Equipo con id: ' + id +'?');
	if(pregunta==true){
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(registro){
			$('#agrega-registros').html(registro);
			return false;
		}
	});
	return false;
	}else{
		return false;
	}
}

function editarRegistro(id){
	$('#formulario')[0].reset();
	var url = '../php/actualiza_otro.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(valores){
				var datos = eval(valores);
				$('#reg').hide();
				$('#edi').show();
				$('#so').val('Edicion');
				$('#id-otro').val(id);
				$('#nombre').val(datos[0]);
				$('#serie').val(datos[1]);
				$('#nombrer').val(datos[2]);
				$('#fechaadquisi').val(datos[3]);
				$('#fechaasig').val(datos[4]);
				$('#obs').val(datos[6]);
				$('#usuario').val(datos[7]);
				$('#esp').val(datos[8]);
				$('#status').val(datos[9]);
				$('#registra').modal({
					show:true,
					backdrop:'static'
				});
			return false;
		}
	});
	return false;
}