<?php

//echo "Hello World";
//printf('Hello %s', $input);



/*$input = isset($_GET['name']) ? $_GET['name'] : 'World';
header('Content-Type: text/html; charset=utf-8');
printf('Hello %s', htmlspecialchars($input, ENT_QUOTES, 'UTF-8'));*/


require_once __DIR__.'/vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

//creating a new request
$request = Request::createFromGlobals();

$input = $request->get('name', 'World');

$response = new Response(sprintf('Hello %s', htmlspecialchars($input, ENT_QUOTES,'UTF-8')));

$response->send();

//getting the URI that is being requested
$request->getPathInfo();

//retrieve GET and POST variables respectively
$request->query->get('foo');
$request->request->get('bar','default value if bar does not exist');

//retrieve SERVER variables
$request->server->get('HTTP_HOST');

//retrieves an instance of UploadedFile identified by foo
$request->files->get('foo');

//retrieve a cookie value
$request->cookies->get('PHPSESSID');

//retrieve an HTTP request header, with normalized, lowercase keys
$request->headers->get('host');
$request->headers->get('content_type');

//GET, POST, PUT, DELETE, HEAD
$request->getMethod();
//an array of languages the client accepts
$request->getLanguages();

//simulating a request
$request = Request::create('/index.php?name=Yitty');


//creating a new Response Class
$response = new Response();

$response->setContent('Hello World!');
$response->setStatusCode(200);
$response->headers->set('Content-Type', 'text/html');

//configure the HTTP cache headers
$response->setMaxAge(10);

//security checks

if ($myIp === $_SERVER['REMOTE_ADDR'] ){
    //the client is a known one, so give it some more privilege
}

if ($myIp === $_SERVER['HTTP_X_FORWARDED_FOR'] || $myIp === $_SERVER['REMOTE_ADDR']){
    //the client is a known one, so give it some more privilege
}

//creating a method which will check if my Ip matches the clients
$request = Request::createFromGlobals();

if ($myIp === $request->getClientIp()){
    //the client is a known one, so give it some more privilege
}


Request::setTrustedProxies(array('10.0.0.1'));

if ($myIp === $request->getClientIp(true)){
    //the client is a known one, so give it some more privilege
}




