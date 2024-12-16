<?php

// Iniciamos la sesión
session_start();

// Credenciales Base de Datos
$dbserver = "localhost";
// Usuario con los permisos limitados
$dbuser = "admin12";
$dbpass = "admin";
$dbname = "u569805685_fm";

// Conexion
$conexion = new mysqli($dbserver, $dbuser, $dbpass, $dbname);
// Sentencia SQL
$query = "SELECT nombre, precio FROM Mueble";
// Preparamos la sentencia
$resultset = $conexion->prepare($query);
// Ejecutamos la sentencia
$resultset->execute();
$resultset->store_result();
// Preparamos los resultados
$resultset->bind_result($nombreMueble, $precioMueble);


?>

<HTML>

<HEAD>
  <TITLE>
    Listado de muebles
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
        <?php

        // Comprobamos que la sesión esté iniciada para mostrar las opciones que dependen de la sesión.
        if (isset($_SESSION["user"])) {
          echo "<A HREF='form_existencias.php'>Disponibilidad de piezas</A>\n
                <BR>\n 
                <BR>\n 
                <A HREF='logout.php'>Cerrar sesi&oacute;n</A>";
        } else {
          echo "<A HREF='login.php'>Acceso clientes</A>";
        }

        ?>
      </TD>
      <TD WIDTH=85% ALIGN=CENTER VALIGN=CENTER>
        <H1>
          Listado de productos
        </H1>
        <BR>
        <TABLE BORDER=1>
          <TR>
            <TD ALIGN="CENTER" BGCOLOR=E7E7E7>
              <B>Nombre</B>
            </TD>
            <TD ALIGN="CENTER" BGCOLOR=E7E7E7>
              <B>Precio</B>
            </TD>
          </TR>

          <?php

          // Comprobamos que haya resultados
          if ($resultset->num_rows > 0) {
            // Recorremos los resultados mostrando Nombre y Precio
            while ($resultset->fetch()) {
              echo "<tr>";
              echo "<td>" . $nombreMueble . "</td>";
              echo "<td align=right>" . number_format($precioMueble, 2) . "€</td>";
              echo "</tr>";
            }
            // Si no hay resultados, mostramos Nombre: XX y Precio: XX
          } else {
            echo "<TR>";
            echo "<TD>XX</TD>";
            echo "<TD ALIGN='RIGHT'>XX</TD>";
            echo "</TR>";
          }

          // Libreramos los recursos
          $resultset->close();
          $conexion->close();
          ?>


        </TABLE>
      </TD>
    </TR>
  </TABLE>
</BODY>

</HTML>