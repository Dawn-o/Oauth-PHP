<?php
require_once '../vendor/autoload.php';
$clientID = '<CLIENT_ID>';
$clientSecret = '<CLIENT_SECRET>';
$redirectUri = '<REDIRECT_URI>';

$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");
