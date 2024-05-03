<?php
// extracts path from server uri string
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

// map routes to controllers
$routes = [
'/' => 'controllers/index.php',
'/login' => 'controllers/login.php'
];

// require controller
function routeToController($uri, $routes)
{
if (array_key_exists($uri, $routes)) {
require $routes[$uri];
} else {
abort();
}
}

// require error page
function abort($code = 404)
{
http_response_code($code);
require_once "views/{$code}.php";
die();
}

routeToController($uri, $routes);