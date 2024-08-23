<?php
require_once '../vendor/autoload.php';
$clientID = '1056127719912-ln3teempv4gemjf57ns2f9a3pcgom6v5.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'http://localhost/Oauth/public/login.php';

$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");
