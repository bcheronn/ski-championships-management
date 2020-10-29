<?php

/**
 * Front controller
 *
 * Entry point for the SCM app
 */

use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Loader\YamlFileLoader;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;

require_once __DIR__ . "/../vendor/autoload.php";

// Load the routes from a YAML config file
$fileLocator = new FileLocator(__DIR__ . "/../config");
$loader = new YamlFileLoader($fileLocator);
$routes = $loader->load("routes.yml");

// Initialise the request from PHP globals and the context from that request
$request = Request::createFromGlobals();
$context = new RequestContext();
$context->fromRequest($request);

// Matches the requested URL with a route
$matcher = new UrlMatcher($routes, $context);

// Initialise the response
$response = new Response("OK");

// Prepare the response from the request and send it
$response->prepare($request);
$response->send();

dump($GLOBALS);
