
<?php

require 'google_auth.php';
$client->revokeToken();
header('location: public/login.php');
