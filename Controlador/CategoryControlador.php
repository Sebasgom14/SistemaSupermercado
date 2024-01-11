<?php
require_once './Modelo/Conexion.php';
require_once './Modelo/Entidades/Product_Categories.php';
require_once './Modelo/Metodos/CategoryM.php';
class CategoryControlador
{

    private function viewAll(){
        $estM = new \Modelo\Metodos\CategoryM();
        $category = $estM->ViewAll();

        return $category;
    }

    function Principal(){
        $category = $this->viewAll();
        require_once './Vista/View/ProductCategories/Index.php';
    }

    function checkbox(){
        $category = $this->viewAll();
        require_once './Vista/View/Inventory/Index.php';
    }



    function Todos()
    {
        $eM = new \Modelo\Metodos\CategoryM();
        $todos = $eM->ViewAll();

        $retVal = [];

        foreach ($todos as $t) {
            $id = $t->getIdCategory();
            $categoryname = $t->getCategoryName();
            $estade = $t->getStatus();

            $retVal[] = [
                'id' => $id,
                'nombre' => $categoryname,
                'estado' => $estade
            ];
        }
        echo json_encode($retVal);
    }

    function Insert()
    {
        $e = new \Modelo\Entidades\Product_Categories();
        $eM = new \Modelo\Metodos\CategoryM();

        $e->setCategoryName($_POST["nameCategory"]);
        $e->setStatus(1);

        if ($eM->insert($e)) {
            echo json_encode(true);
        } else {
            echo json_encode(false);
        }
    }

    function getInformation()
    {
        $eM = new \Modelo\Metodos\CategoryM();

        $idCategoria = $_POST["idCategory"];
        $categoryInformation = $eM->getInformation($idCategoria);
        $retVal = array();
        if ($categoryInformation != null) {
            foreach ($categoryInformation as $category) {
                $retVal[] = [
                    'id' => $category->getIdCategory(),
                    'nombreCategoria' => $category->getCategoryName(),
                ];
            }
        }
        echo json_encode($retVal);
    }

    function update()
    {
        $e = new \Modelo\Entidades\Product_Categories();
        $eM = new \Modelo\Metodos\CategoryM();

        $e->setIdCategory($_POST["idCategory"]);
        $e->setCategoryName($_POST["nameCategory"]);

        if ($eM->update($e)) {
            echo json_encode(true);
        } else {
            echo json_encode(false);
        }
    }

    function delete(){
        $e = new \Modelo\Entidades\Product_Categories();
        $eM = new \Modelo\Metodos\CategoryM();

        $idCategory = $_POST["idCategory"];

        if ($eM->ChangeStatus($idCategory)){
            echo json_encode(true);
        }else{
            echo json_encode(false);
        }
    }
}