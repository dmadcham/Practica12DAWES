<?php

// Iniciamos la sesión
session_start();

?>

<HTML>

<HEAD>
     <TITLE>
          Inicio
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
                         Bienvenido a la nueva forma de entender el hogar
                    </H1>
                    En Muebles Posada hacemos realidad tus deseos.
               </TD>
          </TR>
     </TABLE>
</BODY>

</HTML>