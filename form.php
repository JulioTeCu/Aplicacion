<?php
    $servidor = "localhost";
    $usuario = "root";
    $clave="";
    $db ="prueba";

    $conex = mysqli_connect($servidor, $usuario, $clave, $db);

    if (!$conex) {
    	echo"Eroro en la conexion con el servidor";
    }

 ?>

 <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Gestion municipal Luis</title>
    <link rel="stylesheet" type="text/css" href="css/modelo_servicios.css">
</head>
<body>
    
    <header>
    
        <img  clas="logo" src="imagenes/logo.jpg"  alt="Logotipo de GMI" title="Logotipo hecho por GMI"  >   
        <br></br>
    
    <nav>
    
        <ul class="menu" >
    
            <li><a href="index.html">Inicio</a></li>
            <li><a href="servicios.html">Servicios</a></li>
            <li><a href="nosotros.html">Nosotros</a></li>
            <li><a href="cursos.html">Cursos</a></li>
            <li><a href="contactenos.html">Contactenos</a></li>
              
        </ul>
    
    </nav>

</header>

    <section class="main">

        <section class="articles">

            <article>
                <h2>SERVICIOS : </h2>
                 <font>
                <ul>
                    <li>Consultoria</li>
                    <li>Capacitación</li>
                    <li>Elaboración de planes de trabajo</li>
                    <li>Elaboración de informes</li>
                    <li>Análisis de la gestion</li>
                </ul>
            </font>
            </article>
            <article>
                <h3>Solicitar un servicio </h3>
                <form class="formulario" action="http://localhost/formulario/form.php" method="post">
                    <div>
                        <label for="municipio" >Municipio : 
                            <input type="text" placeholder="Municipio de interes"  name="municipio">
                        </label>
                    </div>

                    <div>
                        <label for="nombre">Nombre :
                            <input type="text" placeholder="Nombre completo"  name="nombre"> 
                        </label>
                    </div>
                    <div>
                        <label for="cargo">Cargo : 
                            <input type="text" placeholder="Cargo"  name="cargo">
                        </label>
                    </div>
                    
                    <div>
                        <label for="telefono">Teléfono : 
                            <input type="text" placeholder="Teléfono"  name="telefono">
                        </label>
                    </div>
                    <div>
                        <label for="correo">Correo : 
                            <input type="email" placeholder="Correo"  name="correo">
                        </label>
                    </div>
                    
                    <label>
                        <input type="submit" value="Envíar" name="enviar">
                    </label>
                </form>


            </article>
            <article>
            	<div class="tabla">
            		<table>
            			<tr>
            				<th>Municipio</th>
            				<th>Nombre</th>
            				<th>Cargo</th>
            				<th>Telefono</th>
            				<th>Correo</th>
            			</tr>
            			<?php
            			$consulta = "SELECT * FROM datos";
            			$ejecutarConsulta = mysqli_query($conex, $consulta);
            			$verFilas = mysqli_num_rows($ejecutarConsulta);
            			$fila = mysqli_fetch_array($ejecutarConsulta);
            			if(!$ejecutarConsulta){
            				echo "Error en la Consulta";
            			}else{
            				if($verFilas<1){
            					echo "<tr><td>Sin registros </td></tr>";
            				}else{
            					for($i=0;$i<=$fila;$i++){
            						echo '
            						<tr>
            							<td>'.$fila[0].'</td>
            							<td>'.$fila[1].'</td>
            							<td>'.$fila[2].'</td>
            							<td>'.$fila[3].'</td>
            							<td>'.$fila[4].'</td>
            						</tr>
            						';
            						$fila = mysqli_fetch_array($ejecutarConsulta);
            					}
            				}
            			}
            			?>
            		</table>
            	</div>
            </article>
    </section>
        <aside>
    
            <h3>Aqui el aside</h3>
            <p>Por el momento no exixte informacion que se decee poner en esta parte. Despues se pondra.</p>
    
        </aside>

    </section> 

    <footer class="footer">
        <div class="foobody">
            <div class="colum1">
                <h2>Más información de la empresa</h2>

                <p>Es una empresa que ...........</p>

            </div>

            <div class="colum2">
                <h2>Redes sociales</h2>
                <div class="row">
                    <img src="imagenes/bloogger.png">
                    <a target="_blank" href="">Siguenos en Bloogger </a>
                </div>
                <div class="row">
                    <img src="imagenes/facebook.jpg">
                    <a target="_blank" href="">Siguenos en Facebook </a>
                </div>
                <div class="row">
                    <img src="imagenes/twitter.png">
                    <a target="_blank" href="">Siguenos en Twitter </a>
                </div>
        
                
            </div>
            <div class="colum3">
                <h2>Información de Contacto</h2>
                <div class="row2">
                    <img src="imagenes/phone.png">
                    <label>+52-246-135-8661 </label>
                </div>
                <div class="row2">
                    <img src="imagenes/outlook.jpg">
                   <label>GEMUNICIPAL220@outlook.es </label>
                </div>
                
            </div>        
        </div>
        <div class="ff">
            <p>.</p>
        </div>
    
    </footer>

</body>
</html>
 <?php
    if (isset($_POST['enviar'])){
    	
		$municipio = $_POST["municipio"];
		$nombre = $_POST["nombre"];
		$cargo = $_POST["cargo"];
		$telefono = $_POST["telefono"];
		$correo = $_POST["correo"];

		$insertar = "INSERT INTO datos  VALUES('$municipio',
											   '$nombre',
											   '$cargo',
											   '$telefono',
											   '$correo')";
		$ejecutar = mysqli_query($conex,$insertar);

		if(!$ejecutar){
			echo "Error en la linea de sql";
		}
    }
?>








