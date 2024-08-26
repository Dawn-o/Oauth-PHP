<?php

session_start();

$env = parse_ini_file('../.env');

$clientID = $env['CLIENT_ID'];
$clientSecret = $env['CLIENT_SECRET'];
$redirectUri = $env['REDIRECT_URI'];

$tokenRevocationUrl = $env['TOKEN_REVOCATION_URL'];

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

    Header("Location: ../public/login.php");
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

    echo "Name : $userInfoData[name]";
    echo "<br />";
    echo "Email : $userInfoData[email]";
    echo "<br />";
    echo "<img src='$userInfoData[picture]' />";
    echo "<br />";
    echo "<a href='?logout'>Logout</a>";

} else {
    echo 'Error Retrieving Access Token';
}
