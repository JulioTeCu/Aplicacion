<?php
 //conectamos Con el servidor
 $host ="localhost";
 $user ="root";
 $pass ="";
 $db="prueba";

 //funcion llamada conexion con (dominio,usuarios,contraseña,base_de_datos)
 $con = mysqli_connect($host,$user,$pass,$db)or die("Problemas al Conectar");
 mysqli_select_db($con,$db)or die("problemas al conectar con la base de datos");


 //recuperar las variables
 $municipio=$_POST['municipio'];
 $nombre=$_POST['nombre'];
 $cargo=$_POST['cargo'];
 $telefono=$_POST['telefono'];
 $correo=$_POST['correo'];
 $servicios=$_POST['servicios'];

 //hacemos la sentencia de sql

 $insertar ="INSERT INTO datos VALUES('$municipio',
 		   '$nombre',
           '$cargo',
           '$telefono',
           '$correo',
       	   '$servicios')";
 //ejecutamos la sentencia de sql
 $ejecutar=mysqli_query($con,$insertar) 
 or die ("Error al insertar los datos");
 //verificamos la ejecucion
 mysqli_close($con);
 echo "Datos insertados correctamente";



?>