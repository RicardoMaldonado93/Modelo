<?php
interface ICompra{

    public static function CargarCompra($request, $response, $args);
    public static function MostrarListado($request, $response, $args);
    public static function MostrarMarca($request, $response, $args);
}
?>