<?php

require '../vendor/autoload.php';
require 'config.php';

$provider = new \MetasenseLTD\OAuth2\Client\Provider\WowProvider(
    $config
);


if (isset($_GET['code']) && $_GET['code']) {
    $token = $provider->getAccessToken("authorization_code", [
        'code' => $_GET['code']
    ]);

    $user = $provider->getResourceOwner($token);
    echo '<pre>' . var_export($user, true) . '</pre>';


} else {
    header('Location: ' . $provider->getAuthorizationUrl());
}
