<?php

$requestUri = $_SERVER['REQUEST_URI'];
$publicPosition = strpos($requestUri, '/public');
$publicPosition = $publicPosition === false ? 0 : $publicPosition;
$baseUrl = substr($requestUri, 0, $publicPosition + 8);

define('BASE_URL', $baseUrl);
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "my_todo");
define("DB_HOST", "localhost");
