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
            /*$emailTo = 'libroreclamaciones_envio@dirislimasur.gob.pe' . ', ';
            $emailTo .= $correoLigitimado . ', ';
            $emailTo .= $correoUsuario; */
            $emailTo = array('libroreclamaciones_envio@dirislimasur.gob.pe', $correoLigitimado, $correoUsuario);

            /* =============================================
              CONFIGURACION DEL PHPMAILER 
            ============================================= */
            $subject = "LIBRO DE RECLAMACIONES - DIRIS LIMA SUR";

            /*             $message  = "<html><head><meta http-equiv='Content-Type' content='text/html; charsert=utf-8'/></head><body>";
            $message .= "<table width='100%' bgcolor='#e0e0e0' cellpadding='0' cellspacing='0' border='0'>";

            $message .= "<tr><td>";

            $message .= "<table align='center' width='100%' border='0' cellpadding='0' cellspacing='0' style='max-width:650px; background-color:#fff; font-family:Verdana, Geneva, sans-serif;'>";

            $message .= "<thead>
                                <tr height='80'>
                                <th colspan='4' style='background-color:#f5f5f5; border-bottom:solid 1px #bdbdbd; font-family:Verdana, Geneva, sans-serif; color:#333; font-size:34px;' >Libro de Reclamaciones Virtual <br><a href='https://www.dirislimasur.gob.pe/'>DIRIS LIMA SUR</a></th>
                                </tr>
                             </thead>";

            $message .= "<tbody>
                                    
                        <tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
                            <td style='background-color:#00a2d1; text-align:center;'><a href='#' style='color:#fff; text-decoration:none;'>Mesa Virtual</a></td>
                            <td style='background-color:#00a2d1; text-align:center;'><a href='http://consultatramite.dirislimasur.gob.pe:8085/consulta/' style='color:#fff; text-decoration:none;'>Consulta Tramite</a></td>
                            <td style='background-color:#00a2d1; text-align:center;'><a href='#' style='color:#fff; text-decoration:none;' >Libro de Reclamaciones Virutal</a></td>
                            <td style='background-color:#00a2d1; text-align:center;'><a href='https://www.dirislimasur.gob.pe/' style='color:#fff; text-decoration:none;' >DIRIRS LIMA SUR</a></td>
                        </tr>
      
                        <tr>
                            <td colspan='4' style='padding:15px;'>
                                <hr/>        
                                <p style='font-size:20px;' align='center'><strong>Numero de Reclamo - 00" . $num_reclamo . "</strong></p> 
                                <hr/>
                                <hr/>        
                                <p style='font-size:20px;'><strong>IDENTIFICACION DEL USUARIO O TERCERO LEGITIMADO</strong></p> 
                                <hr/>
                                <p style='font-size:20px;'>Tipo Documento      : " . $_POST["nuevTipoDocumentoLigitimado"] . "</p>
                                <p style='font-size:20px;'>N&°acute de Documento     : " . $_POST["dniLigitimado"] . "</p>
                                <p style='font-size:20px;'>Nombre de Documento : " . $_POST["nuevNombreLigitimado"] . "</p>
                                <p style='font-size:20px;'>Telefono            : " . $_POST["nuevTelefonoLigitimado"] . "</p>
                                <p style='font-size:20px;'>Correo              : " . $_POST["nuevEmailLigitimado"] . "</p>
                                <p style='font-size:20px;'>Distrito            : " . $_POST["nuevDistritoLigitimado"] . "</p>
                                <p style='font-size:20px;'>Direccion           : " . $_POST["nuevDireccionLigitimado"] . "</p>
                                <hr/>
                                <p style='font-size:20px;'><strong>IDENTIFICACION DE QUIEN PRESENTA EL RECLAMO (En caso de ser el usuario afectado no es necesario su llenado) </strong></p> 
                                <hr/>
                                <p style='font-size:20px;'>Tipo Documento      : " . $_POST["nuevTipoDocumento"] . "</p>
                                <p style='font-size:20px;'>N&°acute de Documento     : " . $_POST["dni"] . "</p>
                                <p style='font-size:20px;'>Nombre de Documento : " . $_POST["nuevNombre"] . "</p>
                                <p style='font-size:20px;'>Telefono            : " . $_POST["nuevTelefono"] . "</p>
                                <p style='font-size:20px;'>Correo              : " . $_POST["nuevEmail"] . "</p>
                                <p style='font-size:20px;'>Distrito            : " . $_POST["nuevDistrito"] . "</p>
                                <p style='font-size:20px;'>Direccion           : " . $_POST["nuevDireccion"] . "</p>
                                <hr/>
                                <p style='font-size:20px;'><strong>DESCRIPCION:</strong></p>
                                <hr/>
                                <p style='font-size:20px;'>" . $_POST["nuevDescripcion"] . "</p>
                                <p style='font-size:25px;'>Direccion de Redes Integradas de Salud Lima Sur</p>
                                <img src='https://www.dirislimasur.gob.pe/wp-content/uploads/2020/07/logoemail.jpg' alt='Direccion de Redes Integradas de Salud Lima Sur' title='Dirección de Redes Integradas de Salud Lima Sur' style='height:auto; width:100%; max-width:100%;' />
                                <hr/>
                            </td>
                        </tr>
      
              </tbody>";

            $message .= "</table>";

            $message .= "</td></tr>";
            $message .= "</table>";

            $message .= "</body></html>"; */
            $message = "<html>

            <body>
            
                <table width='100%' background='#e0e0e0' cellpadding='0' cellspacing='0'>
            
                    <tr>
                        <td>
            
                            <table text-align='center' width='100%'  cellpadding='0' cellspacing='0'
                                style='max-width:650px; background-color:#fff; font-family:Verdana, Geneva, sans-serif;'>
            
                                <thead>
                                    <tr height='80'>
                                        <th colspan='4'
                                            style='background-color:#f5f5f5; border-bottom:solid 1px #bdbdbd; font-family:Verdana, Geneva, sans-serif; color:#333; font-size:34px;'>
                                            Libro de Reclamaciones Virtual <br><a href='https://www.dirislimasur.gob.pe/'>DIRIS LIMA
                                                SUR</a></th>
                                    </tr>
                                </thead>
            
                                <tbody>
            
                                    <tr text-align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
                                        <td style='background-color:#00a2d1; text-align:center;'><a href='#'
                                                style='color:#fff; text-decoration:none;'>Mesa Virtual</a></td>
                                        <td style='background-color:#00a2d1; text-align:center;'><a
                                                href='http://consultatramite.dirislimasur.gob.pe:8085/consulta/'
                                                style='color:#fff; text-decoration:none;'>Consulta Tramite</a></td>
                                        <td style='background-color:#00a2d1; text-align:center;'><a href='#'
                                                style='color:#fff; text-decoration:none;'>Libro de Reclamaciones Virutal</a></td>
                                        <td style='background-color:#00a2d1; text-align:center;'><a
                                                href='https://www.dirislimasur.gob.pe/'
                                                style='color:#fff; text-decoration:none;'>DIRIRS LIMA SUR</a></td>
                                    </tr>
            
                                    <tr>
                                        <td colspan='4' style='padding:15px;'>
                                            <hr />
                                            <p style='font-size:20px;' text-align='center'><strong>Numero de Reclamo - 00" . $num_reclamo
                . "</strong></p>
                                            <hr />
                                            <hr />
                                            <p style='font-size:20px;'><strong>IDENTIFICACION DEL USUARIO O TERCERO
                                                    LEGITIMADO</strong></p>
                                            <hr />
                                            <p style='font-size:20px;'>Tipo Documento : " . $_POST["nuevTipoDocumentoLigitimado"] .
                "</p>
                                            <p style='font-size:20px;'>N&°acute de Documento : " . $_POST["dniLigitimado"] . "</p>
                                            <p style='font-size:20px;'>Nombre de Documento : " . $_POST["nuevNombreLigitimado"] . "
                                            </p>
                                            <p style='font-size:20px;'>Telefono : " . $_POST["nuevTelefonoLigitimado"] . "</p>
                                            <p style='font-size:20px;'>Correo : " . $_POST["nuevEmailLigitimado"] . "</p>
                                            <p style='font-size:20px;'>Distrito : " . $_POST["nuevDistritoLigitimado"] . "</p>
                                            <p style='font-size:20px;'>Direccion : " . $_POST["nuevDireccionLigitimado"] . "</p>
                                            <hr />
                                            <p style='font-size:20px;'><strong>IDENTIFICACION DE QUIEN PRESENTA EL RECLAMO (En caso
                                                    de ser el usuario afectado no es necesario su llenado) </strong></p>
                                            <hr />
                                            <p style='font-size:20px;'>Tipo Documento : " . $_POST["nuevTipoDocumento"] . "</p>
                                            <p style='font-size:20px;'>N&°acute de Documento : " . $_POST["dni"] . "</p>
                                            <p style='font-size:20px;'>Nombre de Documento : " . $_POST["nuevNombre"] . "</p>
                                            <p style='font-size:20px;'>Telefono : " . $_POST["nuevTelefono"] . "</p>
                                            <p style='font-size:20px;'>Correo : " . $_POST["nuevEmail"] . "</p>
                                            <p style='font-size:20px;'>Distrito : " . $_POST["nuevDistrito"] . "</p>
                                            <p style='font-size:20px;'>Direccion : " . $_POST["nuevDireccion"] . "</p>
                                            <hr />
                                            <p style='font-size:20px;'><strong>DESCRIPCION:</strong></p>
                                            <hr />
                                            <p style='font-size:20px;'>" . $_POST["nuevDescripcion"] . "</p>
                                            <p style='font-size:25px;'>Direccion de Redes Integradas de Salud Lima Sur</p>
            <!--                                 <img src='https://www.dirislimasur.gob.pe/wp-content/uploads/2020/07/logoemail.jpg'
                                                alt='Direccion de Redes Integradas de Salud Lima Sur'
                                                title='Dirección de Redes Integradas de Salud Lima Sur'
                                                style='height:auto; width:100%; max-width:100%;' /> -->
                                            <hr />
                                        </td>
                                    </tr>
            
                                </tbody>
            
                            </table>
            
                        </td>
                    </tr>
                </table>
            
            </body>
            
            </html>";


            $EnviadoPor = "libroreclamaciones_envio@dirislimasur.gob.pe";
            $NombreEnviado = "LIBRO DE RECLAMACIONES VIRUTAL";
            $host = "smtp.gmail.com";
            $port = 587;
            $SMTPAuth = true;
            $SMTSecure = "tls";
            $password = "1597531994Vlad";

            require "vistas/bower_components/PHPMailer/PHPMailerAutoload.php";

            $mail = new PHPMailer();

            $mail->isSMTP();


            $mail->SMTPDebug = 0;
            $mail->Host = $host;
            $mail->Port = $port;
            $mail->SMTPAuth = $SMTPAuth;
            $mail->SMTPSecure = $SMTSecure;
            $mail->Username = $EnviadoPor;
            $mail->Password = $password;

            $mail->setFrom($EnviadoPor, $NombreEnviado);

            if (is_array($emailTo)) {
                foreach ($emailTo as $key => $value) {
                    $mail->addAddress($value);
                }
            } else {
                $mail->addAddress($emailTo);
            }
            /* $mail->addAddress($emailTo); */


            $mail->isHTML(true);
            $mail->Subject = $subject;

            $mail->Body = $message;

            if (!$mail->send()) {

                echo '<script>console.log("ERROR AL ENVIAR MENSAJE");</script>';
            }
            echo '<script>console.log("MENSAJE ENVIADO");</script>';

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
