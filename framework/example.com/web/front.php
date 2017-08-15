<?php
/**
 * Created by PhpStorm.
 * User: yittyF
 * Date: 8/14/2017
 * Time: 5:35 PM
 */
require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Route;


$request = Request::createFromGlobals();
$routes = include __DIR__.'/../src/app.php';

$context = new Symfony\Component\Routing\RequestContext();
$context->fromRequest($request);
$matcher = new Symfony\Component\Routing\Matcher\UrlMatcher($routes, $context);

try{
    extract($matcher->match($request->getPathInfo(), EXTR_SKIP));
    ob_start();
    include sprintf(__DIR__.'/../src/pages/%s.php', $_route);

    $response = new Response(ob_get_clean());
}
catch (\Symfony\Component\Routing\Exception\RouteNotFoundException $e){
    $response = new Response('Not Found', 404);
}
catch (Exception $e){
    $response = new Response('An error occured', 500);
}

$response->send();