<?php
 
 $host ="localhost";
 $user ="root";
 $pass ="";
 $db="prueba";

 
 $con = mysqli_connect($host,$user,$pass,$db)or die("Problemas al Conectar");
 mysqli_select_db($con,$db)or die("problemas al conectar con la base de datos");


$consulta = mysqli_query($con, "SELECT * from datos ")
or die("Error al traer los datos ");

echo '<table border="1">';
echo '<tr>';
echo '<th id="municipio">Municipio</th>';
echo '<th id="nombre">Nombre</th>';
echo '<th id="cargo">Cargo</th>';
echo '<th id="telefono">Teléfono</th>';
echo '<th id="correo">Correo</th>';
echo '<th id="servicios">Servicio</th>';
echo '</tr>';

while ( $extraido = mysqli_fetch_array($consulta)) 
{
	echo '<tr>';
	echo '<td>'.$extraido['municipio'].'</td>';
	echo '<td>'.$extraido['nombre'].'</td>';
	echo '<td>'.$extraido['cargo'].'</td>';
	echo '<td>'.$extraido['telefono'].'</td>';
	echo '<td>'.$extraido['correo'].'</td>';
	echo '<td>'.$extraido['servicios'].'</td>';
	echo '</tr>';
}

mysqli_close($con);
echo '</table>';


?>