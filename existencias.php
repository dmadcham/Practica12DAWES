<?php

// Iniciamos la sesión
session_start();

// Comprobamos que la sesión esté iniciada correctamente. 
// En caso contrario, redirigimos a la página de inicio de sesión.
if (!isset($_SESSION["user"])) {
     header("Location: login.php");
     exit();
}

// Credenciales Base de Datos
$dbserver = "localhost";
// Usuario con los permisos limitados
$dbuser = "admin12";
$dbpass = "admin";
$dbname = "u569805685_fm";

// Datos recogidos del formulario
$nombrePieza = $_POST['pieza'];

// Comprobamos que el formulario no esté vacío
// Si el formulario está vacío, vuelve a la página del formulario
if (empty($nombrePieza)) {
     header("Location: form_existencias.php");
}

// Conexion
$conexion = new mysqli($dbserver, $dbuser, $dbpass, $dbname);
// Sentencia SQL para el codigo de la pieza
$query = "SELECT SUM(unidades) FROM Estante WHERE cod_pieza = (SELECT cod FROM Pieza WHERE nombre = ?)";
// Preparamos la sentencia
$resultset = $conexion->prepare($query);
$resultset->bind_param("s", $nombrePieza);
// Ejecutamos la sentencia
$resultset->execute();
$resultset->store_result();
// Preparamos los resultados
$resultset->bind_result($numeroPiezas);



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
                    <A HREF='logout.php'>Cerrar sesi&oacute;n</A>
               </TD>
               <TD WIDTH=85% ALIGN=CENTER VALIGN=CENTER>
                    <H1>
                         Informaci&oacute;n de la pieza seleccionada
                    </H1>
                    <?php
                    if ($resultset->fetch()) {
                         if ($numeroPiezas>0) {
                              echo "Hay " . $numeroPiezas . " unidades en almacén de la pieza con nombre: " . $nombrePieza . ".";
                         }else {
                         echo "No hay ninguna unidad en el almacén de la pieza con nombre: " . $nombrePieza . ".";
                         }
                    } else {
                         echo "No hay información para la pieza con nombre: " . $nombrePieza . ".";
                    }

                    // Libreramos los recursos
                    $resultset->close();
                    $conexion->close();
                    ?>

                    <BR>
               </TD>
          </TR>
     </TABLE>
</BODY>

</HTML>