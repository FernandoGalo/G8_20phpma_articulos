<?php
        header('Content-Type: application/json');

        require_once("../config/conexion.php");
        require_once("../models/Articulos.php");
        $Articulos = new Articulos();
        
        $body = json_decode(file_get_contents("php://input"), true);

        switch($_GET["op"]){

                case "getArticulos":
                        $datos=$Articulos->get_Articulos();
                        echo  json_encode($datos);
                break;

                case "getArticulo":
                        $datos=$Articulos->get_Articulo($body["ID"]);
                        echo  json_encode($datos);
                break;

                case "insertArticulos":
                        $datos=$Articulos->insert_Articulo($body["DESCRIPCION"],$body["UNIDAD"],$body["COSTO"],$body["PRECIO"],$body["APLICA_ISV"],$body["PORCENTAJE_ISV"],$body["ID_SOCIO"]);
                        echo  json_encode("Articulo agregado");      
                break;

                case "updateArticulos":
                        $datos=$Articulos->update_Articulo($body["ID"],$body["DESCRIPCION"],$body["UNIDAD"],$body["COSTO"],$body["PRECIO"],$body["APLICA_ISV"],$body["PORCENTAJE_ISV"],$body["ESTADO"],$body["ID_SOCIO"]);
                        echo  json_encode("Articulo actualizado");      
                break;

                case "deleteArticulos":
                        $datos=$Articulos->delete_Articulo($body["ID"]);
                        echo  json_encode("Articulo eliminado");
                break;
        }
?>