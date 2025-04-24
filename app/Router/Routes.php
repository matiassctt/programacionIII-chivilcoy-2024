<?php 

include_once "Route.php";
include_once "Router.php";

function startRouter(): Router 
{
    // Inicializamos el array de rutas
    $routes = [];
    
    // Cargamos las rutas de Dominio
    include_once "Routes/DomainRoutes.php";
    // A las rutas actuales, les sumamos las de dominio
    $routes = array_merge($routes, DomainRoutes::getRoutes());
    
    // Como las rutas en este momento son primitivas, tenemos que encapsularlas en un DTO
    $routesClass = [];
    foreach ($routes as $route) {
        // Pasamos de las rutas de tipo array a tipo DTO
        $routesClass[] = Route::fromArray($route);
    }
    
    // Retornamos un nuevo ruteador
    return new Router($routesClass);
}
