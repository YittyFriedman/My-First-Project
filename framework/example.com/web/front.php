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
use Symfony\Component\HttpKernel;

//creating a function which is a generic controller that renders a template when there is no specific logic
/*function render_template(Request $request){
    extract($request->attributes->all(), EXTR_SKIP);
    ob_start();
    include sprintf(__DIR__.'/../src/pages/%s.php', $_route);

    return new Response(ob_get_clean());
}
*/

$request = Request::createFromGlobals();
//setting the route to the correct file path
$routes = include __DIR__.'/../src/app.php';

$context = new Symfony\Component\Routing\RequestContext();
$matcher = new Symfony\Component\Routing\Matcher\UrlMatcher($routes, $context);

//adding in the getController and getArgument methods
$controllerResolver = new ControllerResolver();
$argumentResolver = new ArgumentResolver();

$framework = new Simplex\Framework($matcher, $controllerResolver, $argumentResolver);
$response = $framework->handle($request);



$response->send();