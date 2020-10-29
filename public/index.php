<?php

/** Front controller */

use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Loader\YamlFileLoader;

require_once __DIR__ . "/../vendor/autoload.php";

$fileLocator = new FileLocator(__DIR__ . "/../config");
$loader = new YamlFileLoader($fileLocator);
$routes = $loader->load("routes.yml");

$request = Request::createFromGlobals();
$response = new Response();

$response->send();

dump($GLOBALS);
