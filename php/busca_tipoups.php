<?php
include('conexion.php');

$dato = $_POST['dato'];

//EJECUTAMOS LA CONSULTA DE BUSQUEDA

$registro = mysql_query("SELECT * FROM cattipoups WHERE idCatTipoUPS LIKE '%$dato%' OR TipoUPS LIKE '%$dato%' ORDER BY idCatTipoUPS ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
           <tr>
                <th width="200">Tipo</th>
                <th width="300">Observaciones</th>
                <th width="50">Opciones</th>
            </tr>';
if(mysql_num_rows($registro)>0){
	while($registro2 = mysql_fetch_array($registro)){
		echo '<tr>
                        <td>'.$registro2['TipoUPS'].'</td>
                        <td>'.$registro2['Observaciones'].'</td>
                        <td><a href="javascript:editarRegistro('.$registro2['idCatTipoUPS'].');" class="glyphicon glyphicon-pencil"></a> <a href="javascript:eliminarRegistro('.$registro2['idCatTipoUPS'].');" class="glyphicon glyphicon-trash"></a></td>
                    </tr>';
	}
}else{
	echo '<tr>
				<td colspan="5">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
?>