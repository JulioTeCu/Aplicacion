<?php
 
 $host ="localhost";
 $user ="root";
 $pass ="";
 $db="prueba";

 
 $con = mysqli_connect($host,$user,$pass,$db)or die("Problemas al Conectar");
 mysqli_select_db($con,$db)or die("problemas al conectar con la base de datos");

 $municipio=$_POST['municipio'];
 $nombre=$_POST['nombre'];
 $cargo=$_POST['cargo'];
 $telefono=$_POST['telefono'];
 $correo=$_POST['correo'];
 $servicios=$_POST['servicios'];

 mysqli_query($con, "UPDATE datos set municipio= '$municipio',nombre='$nombre', cargo='$cargo',correo='$correo',servicios='$servicios' where telefono='$telefono' ")or die ("Error al actulizar");
 mysqli_close($con);
 echo "Datos actualizados correctamente ";


?>