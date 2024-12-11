<?php

// Iniciamos la sesión
session_start();

// Comprobamos que la sesión esté iniciada correctamente. 
// En caso contrario, redirigimos a la página de inicio de sesión.
if (!isset($_SESSION["user"])) {
     header("Location: login.php");
     exit();
}

?>

<HTML>

<HEAD>
     <TITLE>
          Existencias
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
                         Disponibilidad de piezas
                    </H1>
                    Selecci&oacute;n de la pieza para la que se desea conocer su disponibilidad.
                    <BR>
                    <BR>
                    <!-- Formulario de selección de pieza -->
                    <FORM NAME="existencias" ACTION="existencias.php" METHOD="POST">
                         <TABLE>
                              <TR>
                                   <TD ALIGN="RIGHT">
                                        Escoja la pieza
                                   </TD>
                                   <TD>
                                        <SELECT NAME="pieza">
                                             <OPTION></OPTION>
                                        </SELECT>
                                   </TD>
                              </TR>
                              <TR>
                                   <TD>
                                   </TD>
                                   <TD>
                                        <INPUT TYPE="SUBMIT" NAME="SUBMIT" VALUE="Enviar">
                                   </TD>
                              </TR>
                         </TABLE>
                    </FORM>
               </TD>
          </TR>
     </TABLE>
</BODY>

</HTML>