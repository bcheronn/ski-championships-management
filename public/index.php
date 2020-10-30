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
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

require_once __DIR__ . "/../vendor/autoload.php";

try {
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
    $attributes = $matcher->match($request->getPathInfo());
    dump($attributes);

    // Initialise the response
    $response = new Response("OK");
} catch (ResourceNotFoundException $exception) {
    $response = new Response("Not Found", 404);
} catch (Exception $exception) {
    $response = new Response("An error occurred", 500);
}

// Prepare the response from the request and send it
$response->prepare($request);
$response->send();

dump($GLOBALS);
