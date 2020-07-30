$(document).ready(function () {

    $("#nuevDistritoLigitimadoSelectSearch").select2();
    $("#nuevDistritoSelectSearch").select2();
    $("#nuevEstablecimientoSelectSearch").select2();
    /* $("modalAgregarFuncionarioVisita").modal('show'); */
    $('#pop').fadeIn(300);
})

function codigoUnicoReclamo(length) {
    var result           = '';
    var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = characters.length;
    for ( var i = 0; i < length; i++ ) {
       result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    return result;
 }



/*=============================================
 CAPTURANDO LA CATEGORIA PARA ASIGNAR CÓDIGO - NUEVA
 =============================================*/
$("#nuevEstablecimientoSelectSearch").change(function () {

    var codigoReclamo=codigoUnicoReclamo(10);
    console.log(codigoReclamo);
    $("#codigoUnicoReclamo").val(codigoReclamo);
})

/*=============================================
 CAPTURANDO LA TIPO DE DOCUMENTO PARA ASIGNAR CÓDIGO - NUEVA
 =============================================*/
$("#nuevTipoDocumentoLigitimado").change(function () {

    var tipoDocumento = $('#nuevTipoDocumentoLigitimado option:selected').html();
    /* console.log(tipoDocumento); */
    if (tipoDocumento !== "DNI") {
        $(".dni").removeAttr("maxlength");
    } else {
        $(".dni").val('');
        $(".dni").attr("maxlength", "8");
    }

})


/*=============================================
 CAPTURANDO LA CATEGORIA PARA ASIGNAR CÓDIGO - EDITAR
 =============================================*/
$("#editarCategoria").change(function () {

    var idCategoria = $(this).val();

    var datos = new FormData();
    datos.append("idCategoria", idCategoria);

    $.ajax({

        url: "ajax/ticket.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {

            if (!respuesta) {

                var nuevoCodigo = idCategoria + "0001";
                $("#editarCodigo").val(nuevoCodigo);

            } else {

                var nuevoCodigo = Number(respuesta["codigo"]) + 1;
                $("#editarCodigo").val(nuevoCodigo);

            }

        }

    })

})


