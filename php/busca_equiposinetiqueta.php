<?php
include('conexion.php');

$dato = $_POST['dato'];

//EJECUTAMOS LA CONSULTA DE BUSQUEDA

$registro = mysql_query("SELECT * FROM equipossinetiqueta WHERE idEquipoSinEtiqueta LIKE '%$dato%' OR NombreEquipo LIKE '%$dato%' ORDER BY idEquipoSinEtiqueta ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
           <tr>
                <th width="200">Equipo</th>
                <th width="200">Nombre</th>
                <th width="200">No Serie</th>
                <th width="200">Fecha de Adquisicion</th>
                <th width="200">Fecha de Asiganacion</th>
                <th width="200">Fecha de Modificacion</th>
                <th width="200">Clave</th>
                <th width="600">Observaciones</th>
                <th width="50">Usuario</th>
                <th width="50">Especificación</th>
                <th width="50">Status</th>
                <th width="50">Opciones</th>
            </tr>';
if(mysql_num_rows($registro)>0){
	while($registro2 = mysql_fetch_array($registro)){
		echo '<tr>
                        <td>'.$registro2['idEquipoSinEtiqueta'].'</td>
                        <td>'.$registro2['NombreEquipo'].'</td>
                        <td>'.$registro2['NumeroSerie'].'</td>
                        <td>'.$registro2['FechaAdquisicion'].'</td>
                        <td>'.$registro2['FechaAsignacion'].'</td>
                        <td>'.$registro2['FechaModificacion'].'</td>
                        <td>'.$registro2['Clave'].'</td>
                        <td>'.$registro2['Observaciones'].'</td>
                        <td>'.$registro2['IdUs'].'</td>
                        <td>'.$registro2['IdEsp'].'</td>
                        <td>'.$registro2['idStatus'].'</td>
                        <td><a href="javascript:editarRegistro('.$registro2['idEquipoSinEtiqueta'].');" class="glyphicon glyphicon-pencil"></a> <a href="javascript:eliminarRegistro('.$registro2['idEquipoSinEtiqueta'].');" class="glyphicon glyphicon-trash"></a></td>
                    </tr>';
	}
}else{
	echo '<tr>
				<td colspan="5">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
?>