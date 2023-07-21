<?php
require_once __DIR__ . '/../vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

$client = new Client();


/**
 * https://docs.guzzlephp.org/en/stable/quickstart.html
 * https://davescripts.com/php-using-guzzle-to-make-url-get-and-post-requests
 *
 * https://docs.guzzlephp.org/en/stable/request-options.html
 *
 */


// GET Request
// Prepare Request
$request = new Request('GET', 'https://www.example.com');

// Send Request
$response = $client->send($request);

// Read Response
$response_body = (string)$response->getBody();
var_dump($response_body);


// GET Request with Url Parameters
// Method 1
$request = new Request('GET', 'https://www.example.com?param1=value1&param2=value2');
$response = $client->send($request);

// Method 2
$request = new Request('GET', 'https://www.example.com');
$response = $client->send($request, [
    'query' => [
        'param1' => 'value1',
        'param2' => 'value2'
    ]
]);

// Read Response
$response_body = (string)$response->getBody();
var_dump($response_body);


// POST Request with Form Fields
// Prepare Request
$request = new Request('POST', 'https://www.example.com');

// Send Request
$response = $client->send($request, [
    'headers' => [
        'Content-Type' => 'application/x-www-form-urlencoded',
    ],
    'form_params' => [
        'field1' => 'value1',
        'field2' => 'value2'
    ]
]);

// Read Response
$response_body = (string)$response->getBody();
var_dump($response_body);


// POST Request with Raw Data
// Prepare Request
$request = new Request('POST', 'https://www.example.com');

// Send Request
$response = $client->send($request, [
    'body' => 'ABCDEF',
]);

// Read Response
$response_body = (string)$response->getBody();
var_dump($response_body);
