<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/vendor/autoload.php'; // これだけでOK！

$config = require 'config.php';

$auth0 = new \Auth0\SDK\Auth0([
    'domain' => $config['domain'],
    'client_id' => $config['client_id'],
    'client_secret' => $config['client_secret'],
    'redirect_uri' => $config['redirect_uri'],
]);

header('Location: ' . $auth0->login());
exit;
