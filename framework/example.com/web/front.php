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
use Symfony\Component\Routing;


//creating a function which is a generic controller that renders a template when there is no specific logic
function render_template($request){
    extract($request->attributes->all(), EXTR_SKIP);
    ob_start();
    include sprintf(__DIR__.'/../src/pages/%s.php', $_routes);

    return new Response(ob_get_clean());
}

$request = Request::createFromGlobals();
$routes = include __DIR__.'/../src/app.php';

$context = new Symfony\Component\Routing\RequestContext();
$context->fromRequest($request);
$matcher = new Symfony\Component\Routing\Matcher\UrlMatcher($routes, $context);

try{
    $request->attributes->add($matcher->match($request->getPathInfo()));
    $response = call_user_func($request->attributes->get('_controller'), $request);
}
catch (\Symfony\Component\Routing\Exception\RouteNotFoundException $e){
    $response = new Response('Not Found', 404);
}
catch (Exception $e){
    $response = new Response('An error occurred', 500);
}


$response->send();