<?php

// Iniciamos la sesión
session_start();

// Credenciales Base de Datos
$dbserver = "localhost";
// Usuario con los permisos limitados
$dbuser = "admin12";
$dbpass = "admin";
$dbname = "u569805685_fm";

// Datos recogidos del formulario
$nombrePieza = $_POST["pieza"];

// Conexion
$conexion = new mysqli($dbserver, $dbuser, $dbpass, $dbname);
// Sentencia SQL
$query = "SELECT unidades FROM Estante WHERE cod_pieza = (SELECT cod FROM Pieza WHERE nombre = ?)";
// Preparamos la sentencia
$resultset = $conexion->prepare($query);
$resultset->bind_param("s", $nombrePieza);
// Ejecutamos la sentencia
$resultset->execute();
$resultset->store_result();
// Preparamos los resultados
$resultset->bind_result($numPiezas);


?>

<HTML>

<HEAD>
     <TITLE>
          Disponibilidad de pieza
     </TITLE>
</HEAD>

<BODY>
     <TABLE HEIGHT=15% WIDTH=100%>
          <TR>
               <TD BGCOLOR="FFFFDD" ALIGN=CENTER VALIGN=CENTER>
                    <H1>
                         Muebles Posada
                    </H1>
               </TD>
          </TR>
     </TABLE>
     <TABLE HEIGHT=85% WIDTH=100%>
          <TR>
               <TD WIDTH=15% BGCOLOR="DDFFFF" VALIGN=CENTER>
                    <A HREF="index.php">Principal</A>
                    <BR>
                    <BR>
                    <A HREF="listado.php">Productos</A>
                    <BR>
                    <BR>
                    <A HREF='form_existencias.php'>Disponibilidad de piezas</A>
                    <BR>
                    <BR>
                    <A HREF='login.php'>Acceso clientes</A>
                    <?php

                    // Comprobamos que la sesión esté iniciada para mostrar la opción "Cerrar Sesión".
                    if (isset($_SESSION["user"])) {
                         echo "<BR>\n 
                              <BR>\n 
                              <A HREF='logout.php'>Cerrar sesi&oacute;n</A>";
                    }

                    ?>
               </TD>
               <TD WIDTH=85% ALIGN=CENTER VALIGN=CENTER>
                    <H1>
                         Informaci&oacute;n de la pieza seleccionada
                    </H1>
                    <?php
                    
                    // Comprobamos que haya resultados
                    if ($resultset->num_rows>0) {
                         $resultset->fetch();
                         echo "Hay ".$numPiezas." unidades en almac&eacute;n de la pieza con nombre: ".$nombrePieza.".";
                    }

                    ?>
                    
                    <BR>
               </TD>
          </TR>
     </TABLE>
</BODY>

</HTML>