<?php
session_start();
require_once './Modelo/Conexion.php';
require_once './Modelo/Entidades/Products.php';
require_once './Modelo/Metodos/ProductsM.php';
require_once './Modelo/Entidades/Employees.php';
require_once './Modelo/Metodos/EmployeesM.php';
class ProductsControlador
{
    private function viewAll(){
        $estM = new \Modelo\Metodos\ProductsM();
        $products = $estM->ViewAll();

        return $products;
    }

    function Principal()
    {
        $products = $this->viewAll();
        require_once './Vista/View/Products/Index.php';
    }


    function Todos()
    {
        $eM = new \Modelo\Metodos\ProductsM();
        $todos = $eM->ViewAll();

        $retVal = [];

        foreach ($todos as $t) {
            $id = $t->getIdProduct();
            $Productname = $t->getName();
            $precio = $t->getPrice();
            $imagen = $t->getImagePath();
            $estade = $t->getStatus();

            $retVal[] = [
                'id' => $id,
                'nombre' => $Productname,
                'precio' => $precio,
                'imagen' => $imagen,
                'estado' => $estade
            ];
        }
        echo json_encode($retVal);
    }
    function Insert()
    {
        $e = new \Modelo\Entidades\Products();
        $eM = new \Modelo\Metodos\ProductsM();

        $e->setName($_POST["nombreP"]);
        $e->setDescription($_POST["descriccionP"]);
        $e->setPrice($_POST["precioP"]);
        $e->setCategory($_POST["categoriaP"]);
        $e->setSupplier($_POST["proveedorP"]);
        $e->setStatus(1);

        // Guardar la imagen en la carpeta del proyecto
        $targetDir = "./Vista/filesRepository/Products/"; // Ruta de la carpeta donde se guardarán las imágenes
        $targetFile = $targetDir . basename($_FILES["imageProduct"]["name"]);

        if (move_uploaded_file($_FILES["imageProduct"]["tmp_name"], $targetFile)) {
            $e->setImagePath($targetFile);
            if ($eM->insert($e)) {
                echo json_encode(true);
            } else {
                echo json_encode(false);
            }
        } else {
            echo json_encode(false);
        }
    }

    function getInformation()
    {
        $eM = new \Modelo\Metodos\ProductsM();

        $idProduct = $_POST["idProduct"];
        $productInformation = $eM->getInformation($idProduct);
        $retVal = array();
        if ($productInformation != null) {
            foreach ($productInformation as $product) {
                $retVal[] = [
                    'id' => $product->getIdProduct(),
                    'nombreProduct' => $product->getName(),
                    'description' => $product->getDescription(),
                    'precio' => $product->getPrice(),
                    'idcategoria' => $product->getCategory(),
                    'idproveedor' => $product->getSupplier(),
                    'estado' => $product->getStatus(),
                    'imagen' => $product->getImagePath(),
                ];
            }
        }

        // Hacer algo con $retVal, como enviarlo como respuesta JSON
        echo json_encode($retVal);
    }
    function update()
    {
        $e = new \Modelo\Entidades\Products();
        $eM = new \Modelo\Metodos\ProductsM();

        $e->setIdProduct($_POST["id"]);
        $e->setName($_POST["nombre"]);
        $e->setDescription($_POST["description"]);
        $e->setPrice($_POST["precio"]);
        $e->setCategory($_POST["category"]);
        $e->setSupplier($_POST["proveedor"]);

        if ($eM->update($e)) {
            echo json_encode(true);
        } else {
            echo json_encode(false);
        }
    }

    function delete(){
        $e = new \Modelo\Entidades\Products();
        $eM = new \Modelo\Metodos\ProductsM();

        $idProduct = $_POST["idProduct"];

        if ($eM->ChangeStatus($idProduct)){
            echo json_encode(true);
        }else{
            echo json_encode(false);
        }
    }
}