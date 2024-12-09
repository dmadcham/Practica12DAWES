<?php

// Iniciamos la sesión
session_start();

// Comprobamos que si no hay sesión iniciada. 
// Si la hay, redirige a user_page.php.
if (isset($_SESSION["user"])) {
  header("Location: user_page.php");
  exit();
}

?>

<HTML>

<HEAD>
  <TITLE>
    Acceso de clientes
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
        <H1>Identif&iacute;quese
        </H1>
        <!-- Formulario de identificación -->
        <FORM NAME="login" ACTION="verify.php" METHOD="POST">
          <TABLE>
            <TR>
              <TD ALIGN="RIGHT">
                Usuario:
              </TD>
              <TD>
                <INPUT TYPE="TEXT" NAME="user">
              </TD>
            </TR>
            <TR>
              <TD ALIGN="RIGHT">
                Contrase&ntilde;a:
              </TD>
              <TD>
                <INPUT TYPE="TEXT" NAME="pass">
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
        <!-- Fin del formulario de identificación -->
      </TD>
    </TR>
  </TABLE>
</BODY>

</HTML>