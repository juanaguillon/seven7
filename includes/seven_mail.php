<?php





function seven_send_mail($nombre, $email, $cedula, $phone ,$ciudad, $pais, $msj)

{

  $imagen_respuesta = get_template_directory_uri() . "/images/logo_respuesta.png";

  $url_enviado = get_home_url();

  $nombre_sitio = "Seven7";

  ob_start();

  ?>

  <html>



  <head>

    <title><?php echo $nombre_sitio; ?></title>

  </head>



  <body>

    <table width="500" align="center" border="0" cellpadding="0" cellspacing="0">

      <tr>

        <td width="500" height="56" valign="top">&nbsp;</td>

      </tr>

      <tr>

        <td height="134" valign="top">

          <table width="100%" border="0" cellpadding="0" cellspacing="0">

            <tr>

              <td width="500" height="150" align="center" valign="top"><img src="<?php echo $imagen_respuesta; ?>" width="337" /></td>

            </tr>

          </table>

        </td>

      </tr>



      <tr>



        <td height="134" valign="top">

          <table width="100%" border="0" cellpadding="0" cellspacing="0">

            <tr>

              <td width="500" height="134" valign="top" style="font-Tamaño: 12px; font-family: Arial, Helvetica, sans-serif; ">

                <p align="center">Formulario enviado desde el website <a href="<?php echo $url_enviado; ?>"><?php echo $nombre_sitio; ?></a> </p>

                <table width="384" border="1" align="center" cellpadding="3" cellspacing="0" bordercolor="#000" style="font-Tamaño: 12px; font-family: Arial, Helvetica, sans-serif;">

                  <tr>

                    <td width="84"><span><strong>Nombre</strong></span></td>

                    <td width="251">

                      <span>

                        <?php echo $nombre; ?>

                      </span>

                    </td>

                  </tr>



                  <tr>

                    <td><span><strong>Email</strong></span></td>

                    <td>

                      <span>

                        <?php echo $email; ?>

                      </span>

                    </td>

                  </tr>

                  <tr>

                    <td><span><strong>Cédula</strong></span></td>

                    <td>

                      <span>

                        <?php echo $cedula; ?>

                      </span>

                    </td>

                  </tr>



                  <tr>

                    <td><span><strong>Teléfono</strong></span></td>

                    <td>

                      <span>

                        <?php echo $phone; ?>

                      </span>

                    </td>

                  </tr>

                  <tr>

                    <td><span><strong>Ciudad</strong></span></td>

                    <td>

                      <span>

                        <?php echo $ciudad; ?>

                      </span>

                    </td>

                  </tr>

                  <tr>

                    <td><span><strong>Pais</strong></span></td>

                    <td>

                      <span>

                        <?php echo $pais; ?>

                      </span>

                    </td>

                  </tr>



                  <tr>

                    <td><span><strong>Mensaje</strong></span></td>

                    <td>

                      <span>

                        <?php echo $msj; ?>

                      </span>

                    </td>

                  </tr>

                </table>



                <p>&nbsp;</p>

              </td>

            </tr>

          </table>

        </td>

      </tr>

    </table>

  </body>



  </html>

  <?php

    $mensajePrincipal = ob_get_contents();

    ob_end_clean();

    ob_start();

    ?>



  <html>



  <head>

    <title><?php echo $nombre_sitio; ?></title>

  </head>





  <body>

    <table width="500" align="center" border="0" cellpadding="0" cellspacing="0">

      <tr>

        <td width="500" height="56" valign="top">&nbsp;</td>

      </tr>

      <tr>

        <td height="268" valign="top">

          <table width="100%" border="0" cellpadding="0" cellspacing="0">

            <tr>

              <td width="337" valign="top" align="center"><img src="<?php echo $imagen_respuesta;  ?>" width="337" height="150" />

                <p style="font-family:Tahoma, Geneva, sans-serif">Su solicitud fue recibida y de inmediato será tramitada, estaremos en contacto lo más pronto posible.</p>

              </td>



            </tr>

          </table>

        </td>

      </tr>



    </table>

  </body>



  </html>



<?php

  $mensajeSecundario = ob_get_contents();

  ob_clean();

  $cabeceras = 'From: ' . get_field("email_desde", "option") .' <info@sevensiete.com>' . "\r\n";

  $cabeceras .= 'Reply-To: ' . get_field("email_desde", "option") . ' <ventasseven7@hotmail.com>' . "\r\n";

  $cabeceras .= 'X-Mailer: PHP/' . phpversion() . "\r\n";

  $cabeceras .= "Content-type: text/html; charset=UTF-8" . "\r\n";



  $subjectPrincipal = "Nuevo Formulario en: " . $nombre_sitio;

  $subjectSecundario = 'Gracias por escribirnos';



  



  mb_internal_encoding('UTF-8');

  $encoded_subject = mb_encode_mimeheader($subjectPrincipal, 'UTF-8', 'B', "\r\n", strlen('Subject: '));

  $encoded_subject2 = mb_encode_mimeheader($subjectSecundario, 'UTF-8', 'B', "\r\n", strlen('Subject: '));



  // $sending = mail( "juanaguilloncar@gmail.com", $encoded_subject, $mensajePrincipal, $cabeceras);

  $sending = mail( get_field("email_para", "option"), $encoded_subject, $mensajePrincipal, $cabeceras);

  $sending2 = mail($email, $encoded_subject2, $mensajeSecundario, $cabeceras);

  if ($sending && $sending2) {

    return "1";

  } else {

    return "0";

  }

}



function seven_mail_ajax()

{

  $nombre = $_POST["form_nombre"];

  $email = $_POST["form_email"];

  $cedula = $_POST["form_cedula"];

  $telefono = $_POST["form_telefono"];

  $ciudad = $_POST["form_ciudad"];

  $pais = $_POST["form_pais"];

  $mensaje = $_POST["form_mensaje"];



  try {

    echo seven_send_mail($nombre, $email, $cedula, $telefono, $ciudad, $pais, $mensaje);

  } catch (\Throwable $th) {

    echo $th->getMessage();

  }

  die();

}



add_action("wp_ajax_seven_mail", "seven_mail_ajax");

add_action("wp_ajax_nopriv_seven_mail", "seven_mail_ajax");

