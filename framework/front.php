<?php
/**
 * Created by PhpStorm.
 * User: yittyF
 * Date: 8/14/2017
 * Time: 5:35 PM
 */
require_once __DIR__.'/vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$request = Request::createFromGlobals();
$response = new Response();

$map = array(
    '/hello' => __DIR__.'/hello.php',
    '/bye' => __DIR__.'/bye.php',
);

$path = $request->getPathInfo();
if(isset($map[$path])){
    ob_start();
    require $map[$path];
    $response->setContent(ob_get_clean());
}
else{
    $response->setStatusCode(404);
    $response->setContent('Not Found');
}

$response->send();