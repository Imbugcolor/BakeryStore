<?php
session_start();
require_once "config.php";
if (isset($_GET['state'])) {
    $helper->getPersistentDataHandler()->set('state', $_GET['state']);
}
try {
    $accessToken = $helper->getAccessToken();
} catch (\Facebook\Exceptions\FacebookResponseException $e) {
    echo "Response Exeption: " . $e->getMessage();
    exit();
} catch (\Facebook\Exceptions\FacebookSDKException $e) {
    echo "SDK Exeption: " . $e->getMessage();
    exit();
}

if (!$accessToken) {
    header('Location: login.php');
    exit();
}

$oAuth2Client = $FB->getOAuth2Client();
if (!$accessToken->isLongLived())
    $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);

$response = $FB->get("/me?fields=id, name, email", $accessToken);
$userData = $response->getGraphNode()->asArray();
$_SESSION['userData'] = $userData;
$_SESSION['access_token'] = (string) $accessToken;
header('Location: index.php');
exit();
