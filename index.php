<?php
//importamos los archivos de las rutas de la carpeta core
require_once './Core/RutasFijas.php';
require_once './Core/Rutas.php';

//realisamos una instacia de la clase rutas
$ruta=new Rutas();

if(isset($_GET['controlador']))//validamos y obtenemos de la urlel nombre del controlador al ser una url usamos get
{
    $controlador=$ruta->CargarControlador($_GET['controlador']);//usando la instancia de rutas llamamos al metodo cargar controlador y le pasamos el parametro que necesita y eso lo igualamos a
    if(isset($_GET['accion'])) // validamos si la accion viene cargada
    {
        $ruta->CargarAccion($controlador, $_GET['accion']);// por medio de la instancia llamados al metodo cargar accion y le pasamos por parametro la accion que obtenemos de la url
    }
    else//sino
    {
        $ruta->CargarAccion($controlador, ACCION_PRINCIPAL);//por medio de la instancia llamamos al metodo cargar la accion solo que en vez de una accion de la url enviamos la accion principal que seria ir al index
    }
}
else//sino se cumple la condicion del primir if
{
    $controlador=$ruta->CargarControlador(CONTROLADOR_PRINCIPAL);//la variable controlador se le asigna que es por medio de la instancia de ruta llamar el metodo cargar controlador y cargamos el controlador fijo que es el index
    $ruta->CargarAccion($controlador, ACCION_PRINCIPAL);//y la ruta llama al metodo de cargar accion y enviamos el controlador que declaramos anterior mente y cargamos accion principal
}
?>
