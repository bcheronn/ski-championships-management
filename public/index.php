<?php

/**
 * Front controller
 *
 * Entry point for the SCM app
 */

use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Router;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Loader\YamlFileLoader;

require_once __DIR__ . "/../vendor/autoload.php";

try {
    // Initialise the file loader
    $fileLocator = new FileLocator(__DIR__ . "/../config");
    $loader = new YamlFileLoader($fileLocator);

    // Initialise the request from PHP globals and the context from that request
    $request = Request::createFromGlobals();
    $context = new RequestContext();
    $context->fromRequest($request);

    // Initialise the router from the configured routes in YAML
    $router = new Router(
        new YamlFileLoader($fileLocator),
        "routes.yml",
        [],
        $context
    );

    // Find the controller in the set of routes from the URL
    $controller = $router->match($context->getPathInfo());
    dump($controller);

    // Initialise the response
    $response = new Response("OK");
} catch (ResourceNotFoundException $exception) {
    $response = new Response("Not Found", 404);
} catch (Exception $exception) {
    $response = new Response("An error occurred", 500);
} finally {
    // Prepare the response from the request and send it
    $response->prepare($request);
    $response->send();
}

dump($GLOBALS);
