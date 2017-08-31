<?php

require_once __DIR__.'/../bootstrap.php';

use \Facebook\Facebook;

session_start();

$fb = new Facebook([
    'app_id' => getenv('FB_ID'),
    'app_secret' => getenv('FB_SECRET'),
    'default_graph_version' => 'v2.8',
]);

$helper = $helper = $fb->getRedirectLoginHelper();

$accessToken = $helper->getAccessToken();

file_put_contents(__DIR__.'/token.json', json_encode(['value' => $accessToken->getValue()]));

header('Location: http://localhost:8080/facebook/show.php');
