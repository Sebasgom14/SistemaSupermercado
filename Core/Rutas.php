<?php

class Rutas
{
    function CargarControlador($controlador) // recibe de parametro un cadena de carcateres la cual vienes desde la url del navegador
    {
        $nombreControlador= ucwords(strtolower($controlador))."Controlador"; // se fuerza a que la primera letra sea mayuscula con el metodo ucwords y las demas letras minisculas con strtolower y se contatena controlador para asi ocultar el verdadero nombre del controlador
        $archivoControlador="./Controlador/".ucwords(strtolower($controlador))."Controlador.php"; // con esta variable se utiliza para poder llamar el archivo que se encuentra en la carpeta del controlador

        if (!is_file($archivoControlador)) // is file valida si el archivo existe o no y nos regresa un boleano por eso se utiliza el ! al inicio para que nos devuelva un false en vez de un true
        { // si nos devuelve un false es decir que no existe hace lo siguiente
            $nombreControlador="IndexControlador";//cambia el valor del nombre del controlador porque ya que intenta acceder a algo que no existe entonces nos manda al index
            $archivoControlador=RUTA_FIJA;// y como no existe la ruta lo que se utiliza es la constante que se definio en el archivo de rutas fijas para ir a esa ruta
        }
        //si en el if manda un verdadero entonces se ejecuta lo siguiente

        require_once $archivoControlador; // se importa de la carpeta controlador el controlador que se solicita y se puede importar en cualquier lado del codigo lo cual es algo muy potente
        $controladorObjeto= new $nombreControlador();// se crea una instancia de nombre controlador para convertirlo en un objeto y retornarlo
        return $controladorObjeto; // retornamos la instancia anterior y asi enviamos un objeto
    }

    function CargarAccion($controlador,$accion)//recibe como parametros dos caracteres el controlador y la accion que debe tener ese controlador
    {
        if ( isset($accion)&& method_exists($controlador, $accion))//validamos si la accion viene desde la url y si el metodo existe en el controlador y contiene esa accion o esa funcion
        {//si lo anterior se cumple
            $controlador->$accion();// y el controlador llama a la accion que contiene
        }
        else // y sino
        {
            require_once RUTA_FIJA;// se importa la ruta fija
            $controlador= new IndexControlador();// se crea una instacia de la clase IndexControlador
            $controlador->Index();// se llama al metodo index que esta en index controlador
        }
    }
}

?>