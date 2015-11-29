<?php

require 'src/EndpointRouter.php';
require 'src/endpoints/EndpointHandler.php';
require 'src/endpoints/SummaryEndpoint.php';
require 'src/endpoints/IPEndpoint.php';
require 'src/endpoints/RandomColorEndpoint.php';
require 'src/endpoints/TimeEndpoint.php';

header('Content-Type: application/json');

$router = new EndpointRouter();

$passiveEndpoints = array(
   new IPEndpoint('ip'),
   new TimeEndpoint('time'),
   new RandomColorEndpoint('color')
);

$activeEndpoints = array();

$summaryEndpoint = new SummaryEndpoint('summary');
$summaryEndpoint->addHandlers($passiveEndpoints);

$router->addEndpoint($summaryEndpoint);
array_walk($passiveEndpoints, array($router, 'addEndpoint'));
array_walk($activeEndpoints, array($router, 'addEndpoint'));

$url = strtok($_SERVER["REQUEST_URI"],'?');
$url = ltrim($url, '/');

echo $router->process($url, $_GET, $_POST, array(
   'ip' => $_SERVER['REMOTE_ADDR'],
   'agent' => $_SERVER['HTTP_USER_AGENT']
));
