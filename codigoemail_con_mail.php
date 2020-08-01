           $destino = 'libroreclamaciones_envio@dirislimasur.gob.pe' . ', ';
            $destino .= $correoLigitimado . ', ';
            $destino .= $correoUsuario;


            //NOTIFICACION POR CORREO
            $asunto = "LIBRO DE RECLAMACIONES VIRTUAL - DIRIS LIMA SUR";

            $message="Prueba";
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


            // configuramos la cabecera que llevara el correo
            /*             $cabeceras = 'MIME-Version: 1.0' . "\r\n" .
                'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
                'From: ymendieta@dirisls.gob.pe' . "\r\n" .
                'Reply-To: no-reply@dirislc.gob.pe' . "\r\n" .
                'X-Mailer: PHP/' . phpversion(); */

            /*             $cabeceras = "MIME-Version: 1.0\n";
            $cabeceras .= "Content-type: text/html; charset=iso-8859-1\n";
            $cabeceras .= "From: reclamaciones@dirislimasur.gob.pe <reclamaciones@dirislimasur.gob.pe>\n";
            
            $cabeceras .= "Reply-To: no-repl\n";
            $cabeceras .= "X-Priority: 1\n";
            $cabeceras .= "X-MSMail-Priority: High\n";
            $cabeceras .= "X-Mailer: Widgets.com Server"; */

            $formato = "html";
            $cabeceras  = "From: reclamaciones<no-reply@dirislimasur.gob.pe> \r\n";
            $cabeceras .= "Return-Path: <no-reply@dirislimasur.gob.pe> \r\n";
            $cabeceras .= "Reply-To: no-reply@dirislimasur.gob.pe \r\n";
            $cabeceras .= "Cc: no-reply@dirislimasur.gob.pe \r\n";
            $cabeceras .= "Bcc: no-reply@dirislimasur.gob.pe \r\n";
            $cabeceras .= "X-Sender: no-reply@dirislimasur.gob.pe \r\n";
            $cabeceras .= "X-Mailer: [Habla software de noticias v.1.0] \r\n";
            $cabeceras .= "X-Priority: 3 \r\n";
            $cabeceras .= "MIME-Version: 1.0 \r\n";
            $cabeceras .= "Content-Transfer-Encoding: 7bit \r\n";
            $cabeceras .= "Disposition-Notification-To: \"reclamaciones\" <no-reply@dirislimasur.gob.pe> \r\n";


            if($formato=="html"){
                $cabeceras.="Content-Type: text/html; charset=iso-8859-1 \r\n";
            }else{
                $cabeceras.="Content-Type: text/plain; charset=iso-8859-1 \r\n"; 
            }     

            @mail($destino, $asunto, $message, $cabeceras);
            /* if (mail($destino, $asunto, $mensaje, $cabeceras)) {
                    echo "<script>alert('Email Enviado')</script>";
                } else {
                    echo "<script>alert('Email Error')</script>";
                } */