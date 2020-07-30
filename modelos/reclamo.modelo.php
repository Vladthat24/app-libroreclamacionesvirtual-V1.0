<?php

require_once "conexion.php";

class ModeloReclamo
{
        /* =============================================
      MOSTRAR RECLAMO
      ============================================= */
      static public function mdlMostrarReclamo($tabla, $item, $valor)
      {
  
          if ($item != null) {
  
              $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id DESC");
  
              $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
  
              $stmt->execute();
  
              return $stmt->fetch();
          } else {
  
              $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC");
  
              $stmt->execute();
  
              return $stmt->fetchAll();
          }
  
          $stmt->close();
  
          $stmt = null;
      }
    /* =============================================
      REGISTRO DE RECLAMO
      ============================================= */

    static public function mdlIngresaReclamo($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla
        (entidad,codigo_reclamo,establecimiento,tipo_doc_ligitimado,num_doc_ligitimado,
        nombre_ligitimado,telefono_ligitimado,email_ligitimado,distrito_ligitimado,direccion_ligitimado,
        tipo_doc,num_doc,nombre,telefono,email,distrito,direccion,descripcion,fecha) 
        VALUES (:entidad,:codigo_reclamo,:establecimiento,:tipo_doc_ligitimado,:num_doc_ligitimado,
        :nombre_ligitimado,:telefono_ligitimado,:email_ligitimado,:distrito_ligitimado,:direccion_ligitimado,
        :tipo_doc,:num_doc,:nombre,:telefono,:email,:distrito,:direccion,:descripcion,:fecha)");

       
        $stmt->bindParam(":entidad", $datos["entidad"], PDO::PARAM_STR);
        $stmt->bindParam(":codigo_reclamo", $datos["codigo_reclamo"], PDO::PARAM_STR);
        $stmt->bindParam(":establecimiento", $datos["establecimiento"], PDO::PARAM_STR);
        $stmt->bindParam(":tipo_doc_ligitimado", $datos["tipo_doc_ligitimado"], PDO::PARAM_STR);
        $stmt->bindParam(":num_doc_ligitimado", $datos["num_doc_ligitimado"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre_ligitimado", $datos["nombre_ligitimado"], PDO::PARAM_STR);
        $stmt->bindParam(":telefono_ligitimado", $datos["telefono_ligitimado"], PDO::PARAM_STR);
        $stmt->bindParam(":email_ligitimado", $datos["email_ligitimado"], PDO::PARAM_STR);
        $stmt->bindParam(":distrito_ligitimado", $datos["distrito_ligitimado"], PDO::PARAM_STR);
        $stmt->bindParam(":direccion_ligitimado", $datos["direccion_ligitimado"], PDO::PARAM_STR);
        $stmt->bindParam(":tipo_doc", $datos["tipo_doc"], PDO::PARAM_STR);
        $stmt->bindParam(":num_doc", $datos["num_doc"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
        $stmt->bindParam(":distrito", $datos["distrito"], PDO::PARAM_STR);
        $stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }

 
}
