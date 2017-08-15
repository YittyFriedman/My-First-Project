<?php
/**
 * Created by PhpStorm.
 * User: yittyF
 * Date: 8/15/2017
 * Time: 4:35 PM
 */
use Symfony\Component\Routing;

$routes = new Routing\RouteCollection();
$routes->add('hello', new Symfony\Component\Routing\Route('/hello/{name}', array('name'=> 'World')));
$routes->add('bye',new Routing\Route('/bye'));

return $routes;

