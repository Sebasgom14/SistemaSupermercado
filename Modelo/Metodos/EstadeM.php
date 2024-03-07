<?php

namespace Modelo\Metodos;
use Modelo\Conexion;
use Modelo\Entidades\Estade;
class EstadeM
{
    function ViewAll(){
        $retVal = array();
        $conexion = new Conexion();

        $sql = "SELECT * FROM ESTADES WHERE ESTADE=1;";
        $resultado = $conexion->Ejecutar($sql);

        if (mysqli_num_rows($resultado) > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                $e = new Estade();
                $e->setIdEstade($fila["ID_ESTADE"]);
                $e->setNameEstade($fila["NAMEESTADE"]);
                $e->setEstade($fila["ESTADE"]);
                $retVal[] = $e;
            }
        } else
            $retVal = null;
        $conexion->Cerrar();
        return $retVal;
    }
}