<?php
/**
 * Created by PhpStorm.
 * User: yittyF
 * Date: 8/14/2017
 * Time: 5:27 PM
 */


// creating an include file
require_once __DIR__.'/vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$request = Request::createFromGlobals();
$response = new Response();
