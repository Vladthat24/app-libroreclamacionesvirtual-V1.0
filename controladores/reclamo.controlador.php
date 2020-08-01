<?php

class ControladorReclamo
{
    /* =============================================
      REGISTRO DE RECLAMO
      ============================================= */

    static public function ctrCrearReclamo()
    {

        if (isset($_POST["nuevEstablecimiento"]) || isset($_POST["nuevDescripcion"])) {



            date_default_timezone_set('America/Lima');

            $fecha = date('Y-m-d');
            $hora = date('H:i:s');

            $fechaActual = $fecha . ' ' . $hora;

            $tabla = "tap_reclamo";

            /* var_dump($_POST["nuevFecha"]); */

            $datos = array(

                "entidad" => $_POST["nuevEntidad"],
                "codigo_reclamo" => $_POST["codigoUnicoReclamo"],
                "establecimiento" => $_POST["nuevEstablecimiento"],
                "tipo_doc_ligitimado" => $_POST["nuevTipoDocumentoLigitimado"],
                "num_doc_ligitimado" => $_POST["dniLigitimado"],
                "nombre_ligitimado" => $_POST["nuevNombreLigitimado"],
                "telefono_ligitimado" => $_POST["nuevTelefonoLigitimado"],
                "email_ligitimado" => $_POST["nuevEmailLigitimado"],
                "distrito_ligitimado" => $_POST["nuevDistritoLigitimado"],
                "direccion_ligitimado" => $_POST["nuevDireccionLigitimado"],
                "tipo_doc" => $_POST["nuevTipoDocumento"],
                "num_doc" => $_POST["dni"],
                "nombre" => $_POST["nuevNombre"],
                "telefono" => $_POST["nuevTelefono"],
                "email" => $_POST["nuevEmail"],
                "distrito" => $_POST["nuevDistrito"],
                "direccion" => $_POST["nuevDireccion"],
                "descripcion" => $_POST["nuevDescripcion"],
                "fecha" => $fechaActual
            );

            $correoLigitimado = $_POST["nuevEmailLigitimado"];
            $correoUsuario = $_POST["nuevEmail"];

            $respuesta = ModeloReclamo::mdlIngresaReclamo($tabla, $datos);

            $item_ = "codigo_reclamo";
            $valor_ = $_POST["codigoUnicoReclamo"];

            $reclamo = ModeloReclamo::mdlMostrarReclamo('tap_reclamo', $item_, $valor_);

            $num_reclamo = $reclamo["id"];

            /* =============================================
              CORREOS DONDE SE ENVIARA EL FORMULARIO
            ============================================= */
            /*  $emailTo = 'libroreclamaciones_envio@dirislimasur.gob.pe' . ', '; */
            $emailTo = $correoLigitimado;
            /* $emailTo .= $correoUsuario; */

            /* =============================================
              CONFIGURACION DEL PHPMAILER 
            ============================================= */
            $subject = "LIBRO DE RECLAMACIONES-DIRIS LIMA SUR";
            $bodyEmail = "prueba";
            $EnviadoPor = "ymendieta@dirislimasur.gob.pe";
            $NombreEnviado = "libroreclamaciones";
            $host = "smtp.gmail.com";
            $port = "587";
            $SMTPAuth = "login";
            $SMTSecure = "tls";
            $password = "1597531994Vlad";

            include("vistas/bower_components/PHPMailer/src/PHPMailer.php");
            include("vistas/bower_components/PHPMailer/src/SMTP.php");
            include("vistas/bower_components/PHPMailer/src/Exception.php");

            $mail = new PHPMailer\PHPMailer\PHPMailer();

            $mail->isSMTP();


            $mail->SMTPDebug = 0;
            $mail->Host = $host;
            $mail->Port = $port;
            $mail->SMTPAuth = $SMTPAuth;
            $mail->SMTPSecure = $SMTSecure;
            $mail->Username = $EnviadoPor;
            $mail->Password = $password;

            $mail->setFrom($EnviadoPor, $NombreEnviado);

            /*             if (is_array($emailTo)) {
                foreach ($emailTo as $key => $value) {
                    $mail->addAddress($value);
                }
            } else {
                $mail->addAddress($emailTo);
            } */
            $mail->addAddress($emailTo);

            $mail->isHTML(true);
            $mail->Subject = $subject;

            $mail->Body = $bodyEmail;

            if (!$mail->send()) {
                echo '<script>alert("ERROR AL ENVIAR MENSAJE");</script>';
            }
            echo '<script>alert("MENSAJE ENVIADO");</script>';


            $mail->SMTPOptions = array(
                'ssl' => array(

                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true

                )
            );




            if ($respuesta == "ok") {

                echo '<script>

					swal({

						type: "success",
						title: "¡El Reclamo N°- 0' . $num_reclamo . ' ha sido Generado!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "https://libroreclamaciones.dirislimasur.gob.pe/";

						}

					});
				

					</script>';
            } else {
                echo '<script>

					swal({

						type: "success",
						title: "¡Error, Contactar con el Administrador!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){


					});
				

					</script>';
            }
        }
    }
}
