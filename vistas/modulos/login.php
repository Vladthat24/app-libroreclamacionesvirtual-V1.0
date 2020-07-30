<?php
/* include('vistas/modulos/popup.php'); */
?>
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <img src="vistas/img/plantilla/logo-dirisls-bloque copy.png" class="img-responsive" style="margin: 10px;">
        </div>
        <div class="col-lg-6" style="margin-top: 20px;">

            <strong class="text-$http_response_header" style="color: white;">“Año de la Universalización de la Salud”</strong>
        </div>

    </div>
</div>

<div class="content">


    <div class="row">

        <h1 style="color: white; text-align: center">Libro de Reclamaciones Virtual</h1>

        <div class="container">

            <form id="signupform" class="form-horizontal" role="form" action="" method="POST" autocomplete="off" enctype="multipart/form-data">
                <div class="panel panel-primary">

                    <div class="panel-heading">

                        <div class="panel-title">Reg&iacute;stra tu Reclamo - Hoja de Reclaci&oacute;n en Salud</div>

                        <!--<div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="login.php">Iniciar Sesi&oacute;n</a></div>-->

                    </div>


                    <div class="panel-body" style="margin: 8px">



                        <div id="signupalert" style="display:none" class="alert alert-danger">

                            <p>Error:</p>

                            <span></span>

                        </div>

                        <div class="form-row ">
                            <!--ENTRADA ENTIDAD-->
                            <div class="form-group col-md-5">

                                <div class="input-group">


                                    <span class="input-group-addon"><i class="fa fa-angle-double-up"></i></span>

                                    <input type="text" class="form-control input-lx" name="nuevEntidad" value="Dirección de Redes Integradas de Salud Lima Sur" readonly>

                                </div>

                            </div>
                            <!--ESPACIO-->
                            <div class="form-group col-md-2"></div>
                            <!--ENTRADA ESTABLECIMIENTO DE SALUD-->
                            <div class="form-group col-md-5">

                                <div class="input-group">


                                    <span class="input-group-addon"><i class="fa fa-angle-double-up"></i></span>
                                    <select id="nuevEstablecimientoSelectSearch" name="nuevEstablecimiento">
                                        <!-- id="nuevEntidadFun" -->
                                        <option value="">ESTABLECIMIENTO DE SALUD</option>

                                        <?php
                                        $item = null;
                                        $valor = null;

                                        $establecimiento = ControladorEstablecimiento::ctrMostrarEstablecimiento($item, $valor);

                                        foreach ($establecimiento as $key => $value) {

                                            echo '<option value="' . $value["establecimiento"] . '">' . $value["establecimiento"] . '</option>';
                                        }
                                        ?>

                                    </select>
                                    <!-- <input type="text" class="form-control input-lx" id="nuevEstablecimiento" name="nuevEstablecimiento" placeholder="Establecimiento de Salud" require> -->
                                    <input type="text" class="form-control input-lx hidden" id="codigoUnicoReclamo" name="codigoUnicoReclamo" require>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <div class="panel panel-primary">

                    <div class="panel-heading">

                        <div class="panel-title">1. IDENTIFICACION DEL USUARIO O TERCERO LEGITIMADO</div>

                        <!--<div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="login.php">Iniciar Sesi&oacute;n</a></div>-->

                    </div>


                    <div class="panel-body" style="margin: 8px">


                        <!--ENTRADA TIPO DE DOCUMENTO-->
                        <div class="form-group col-md-5">

                            <div class="input-group">


                                <span class="input-group-addon"><i class="fa fa-angle-double-up"></i></span>

                                <select class="form-control input-lx" id="nuevTipoDocumentoLigitimado" name="nuevTipoDocumentoLigitimado">

                                    <option value="">Selecionar Tipo Documento</option>

                                    <option value="DNI">DNI</option>

                                    <option value="CARNET DE EXTRANJERIA">CARNET DE EXTRANJERIA</option>
                                    <option value="PASAPORTE">PASAPORTE</option>

                                </select>

                            </div>

                        </div>

                        <!--ESPACIO-->
                        <div class="form-group col-md-2"></div>

                        <!--ENTRADA DE NUMERO DE DOCUMENO-->
                        <div class="form-group col-md-5">

                            <div class="input-group ">

                                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>

                                <input type="number" class="form-control input-lx dni" maxlength="8" id="dniLigitimado" name="dniLigitimado" placeholder="Documento de Identidad" required>


                                <span class="input-group-addon">
                                    <button type="button" id="consultarLigitimado" class="btn btn-primary btn-xs consultar">
                                        Consultar
                                    </button>
                                </span>

                            </div>

                        </div>




                        <div class="form-group col-md-5">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-building"></i></span>

                                <input type="text" class="form-control input-lx" id="nuevNombreLigitimado" name="nuevNombreLigitimado" placeholder="Nombre del Usuario" required>

                            </div>

                        </div>

                        <!--ESPACIO-->
                        <div class="form-group col-md-2"></div>

                        <div class="form-group col-md-5">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                                <input type="number" maxlength="9" class="form-control input-lx" name="nuevTelefonoLigitimado" placeholder="Telefono del usuario" required>

                            </div>

                        </div>


                        <div class="form-group col-md-5">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>

                                <input type="email" class="form-control input-lx" name="nuevEmailLigitimado" placeholder="Correo del Usuario" required>

                            </div>
                        </div>

                        <!--ESPACIO-->
                        <div class="form-group col-md-2"></div>

                        <div class="form-group col-md-5">

                            <div class="input-group">

                                <span class="input-group-addon">BUSCAR DISTRITO LIMA</i></span>

                                <select id="nuevDistritoLigitimadoSelectSearch" name="nuevDistritoLigitimado">
                                    <!-- id="nuevEntidadFun" -->
                                    <option value="">BUSCAR DISTRITO</option>

                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $distrito = ControladorDistrito::ctrMostrarDistrito($item, $valor);

                                    foreach ($distrito as $key => $value) {

                                        echo '<option value="' . $value["distrito"] . '">' . $value["distrito"] . '</option>';
                                    }
                                    ?>

                                </select>
                            </div>

                        </div>
                        <div class="form-group col-md-12">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-map-o"></i></span>

                                <input type="text" class="form-control input-lx" name="nuevDireccionLigitimado" placeholder="Dirección" required>

                            </div>

                        </div>

                    </div>

                </div>
                <div class="panel panel-primary">

                    <div class="panel-heading">

                        <div class="panel-title">2. IDENTIFICACION DE QUIEN PRESENTA EL RECLAMO (En caso de ser el usuario afectado no es necesario su llenado)</div>


                    </div>


                    <div class="panel-body" style="margin: 8px">


                        <!--ENTRADA TIPO DE DOCUMENTO-->
                        <div class="form-group col-md-5">

                            <div class="input-group">


                                <span class="input-group-addon"><i class="fa fa-angle-double-up"></i></span>

                                <select class="form-control input-lx" name="nuevTipoDocumento">

                                    <option value="">Selecionar Tipo Documento</option>

                                    <option value="DNI">DNI</option>
                                    <option value="CARNET DE EXTRANJERIA">CARNET DE EXTRANJERIA</option>
                                    <option value="PASAPORTE">PASAPORTE</option>

                                </select>

                            </div>

                        </div>

                        <!--ESPACIO-->
                        <div class="form-group col-md-2"></div>

                        <!--ENTRADA DE NUMERO DE DOCUMENO-->
                        <div class="form-group col-md-5">

                            <div class="input-group ">

                                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>

                                <input type="number" class="form-control input-lx dni" maxlength="9" id="dni" name="dni" placeholder="Documento de Identidad">


                                <span class="input-group-addon">
                                    <button type="button" id="consultar" class="btn btn-primary btn-xs consultar">
                                        Consultar
                                    </button>
                                </span>

                            </div>

                        </div>




                        <div class="form-group col-md-5">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-building"></i></span>

                                <input type="text" class="form-control input-lx" id="nuevNombre" name="nuevNombre" placeholder="Nombre del Usuario">

                            </div>

                        </div>

                        <!--ESPACIO-->
                        <div class="form-group col-md-2"></div>

                        <div class="form-group col-md-5">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                                <input type="number" maxlength="9" class="form-control input-lx" name="nuevTelefono" placeholder="Telefono del usuario">

                            </div>

                        </div>


                        <div class="form-group col-md-5">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>

                                <input type="email" class="form-control input-lx" name="nuevEmail" placeholder="Correo del Usuario">

                            </div>
                        </div>

                        <!--ESPACIO-->
                        <div class="form-group col-md-2"></div>

                        <div class="form-group col-md-5">

                            <div class="input-group">

                                <span class="input-group-addon">BUSCAR DISTRITO LIMA</span>

                                <select id="nuevDistritoSelectSearch" name="nuevDistrito">
                                    <!-- id="nuevEntidadFun" -->
                                    <option value="">BUSCAR DISTRITO</option>

                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $distrito = ControladorDistrito::ctrMostrarDistrito($item, $valor);

                                    foreach ($distrito as $key => $value) {

                                        echo '<option value="' . $value["distrito"] . '">' . $value["distrito"] . '</option>';
                                    }
                                    ?>

                                </select>

                            </div>

                        </div>

                        <div class="form-group col-md-12">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-map-o"></i></span>

                                <input type="text" class="form-control input-lx" name="nuevDireccion" placeholder="Dirección">

                            </div>

                        </div>

                    </div>

                </div>
                <div class="panel panel-primary">

                    <div class="panel-heading">

                        <div class="panel-title">3. DETALLE DEL RECLAMO</div>


                    </div>


                    <div class="panel-body" style="margin: 8px">

                        <div class="form-group col-md-12">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-indent"></i></span>

                                <textarea class="form-control" rows="4" name="nuevDescripcion" require></textarea>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="form-group col-md-12">

                    <div class="col-md-offset-3 col-md-5">

                        <button type="submit" class="btn btn-primary btn-block btn-flat">Registrar</button>

                    </div>

                </div>
                <?php
                $reclamo = new ControladorReclamo();
                $reclamo->ctrCrearReclamo();
                ?>

            </form>
        </div>
    </div>
</div>


<!--=====================================
MODAL AGREGAR ENTIDAD
======================================-->
