<?php
    header('Content-Type: application/json');
    #aca es dond hacemos la conexion  con el modelo Categoria y la conexion
    require_once("../config/conexion.php");
    require_once("../models/Categoria.php");
    #creamos un objeto categoria en base de la clase Categoria que esta el modelo Categoria
    $categoria = new Categoria();

    $body = json_decode(file_get_contents("php://input"), true);

    #utilizamos switch para poder elejir una opcion determinada y asi ejecuar una funcion del modelo
    switch($_GET["op"]){

        case "GetAll":
            #llamamos a la funcion de la class Categoria
            #esto imprimira todos las filas con el estado = 1
            $datos=$categoria->get_categoria();
            #imprimimos los datos devultos
            echo json_encode($datos);
        break;

        case "GetId":
            #llamamos a la funcion de la class Categoria
            #esto imprimira una fila determinada con el id= x
            $datos=$categoria->get_categoria_x_id($body["cat_id"]);
            echo json_encode($datos);
        break;

        case "Insert":
            #llamamos a la funcion de la class Categoria insert
            #esto imprime un mensaje, si todo esta correcto
            $datos=$categoria->insert_categoria($body["cat_nom"],$body["cat_obs"]);
            echo json_encode("Insert Correcto");
        break;

        case "Update":
            #llamamos a la funcion de la class Categoria update
            #esto imprime un mensaje, si todo esta correcto
            $datos=$categoria->update_categoria($body["cat_id"],$body["cat_nom"],$body["cat_obs"]);
            echo json_encode("Update Correcto");
        break;

        case "Delete":
                        #llamamos a la funcion de la class Categoria delete
            #esto imprime un mensaje, si todo esta correcto
            $datos=$categoria->delete_categoria($body["cat_id"]);
            echo json_encode("Delete Correcto");
        break;
    }
?>