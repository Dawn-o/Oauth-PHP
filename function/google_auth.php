<?php

session_start();

$_ENV = parse_ini_file('../.env');

$clientID = $_ENV['CLIENT_ID'];
$clientSecret = $_ENV['CLIENT_SECRET'];
$redirectUri = $_ENV['REDIRECT_URI'];

$tokenRevocationUrl = $_ENV['TOKEN_REVOCATION_URL'];

if (isset($_GET['logout'])) {
    $accesToken = $_SESSION['access_token'];
    if ($accessToken) {
        $revokeParams = ['token' => $accessToken];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $tokenRevocationUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($revokeParams));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $revokeResponse = curl_exec($ch);
        curl_close($ch);
    }
    session_destroy();

    Header("Location: ../index.php?message=logout_successful");
    exit;
}
if (!isset($_GET['code'])) {
    $authorizationUrl = 'https://accounts.google.com/o/oauth2/v2/auth';
    $params = [
        'response_type' => 'code',
        'client_id' => $clientID,
        'redirect_uri' => $redirectUri,
        'scope' => 'https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email',
    ];

    header("Location: " . $authorizationUrl . '?' . http_build_query($params));
    exit;
}

$accessTokenUrl = 'https://oauth2.googleapis.com/token';

$params = [
    'code' => $_GET['code'],
    'client_id' => $clientID,
    'client_secret' => $clientSecret,
    'redirect_uri' => $redirectUri,
    'grant_type' => 'authorization_code',
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $accessTokenUrl);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

$accessTokenData = json_decode($response, true);

if (isset($accessTokenData['access_token'])) {
    $_SESSION['access_token'] = $accessTokenData['access_token'];

    $userInfoUrl = 'https://www.googleapis.com/oauth2/v1/userinfo?access_token=' . $_SESSION['access_token'];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $userInfoUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $userInfo = curl_exec($ch);
    curl_close($ch);

    $userInfoData = json_decode($userInfo, true);

    $_SESSION['authenticate'] = true;

    $_SESSION['name'] = $userInfoData['name'];
    $_SESSION['email'] = $userInfoData['email'];
    $_SESSION['picture'] = $userInfoData['picture'];

    header("Location: ../public/main.php?message=login_successful");
} else {
    echo 'Error Retrieving Access Token';
}
