<?php

 $host ="localhost";
 $user ="root";
 $pass ="";
 $db="prueba";

 $con = mysqli_connect($host,$user,$pass,$db)or die("Problemas al Conectar");
 mysqli_select_db($con,$db)or die("problemas al conectar con la base de datos");

 $clave=$_POST['telefono'];

 mysqli_query($con,"DELETE from datos where telefono='$clave' ")
 or die ("Error al eliminar datos");

 mysqli_close($con);
 echo "Datos eliminados correctamente";


?>