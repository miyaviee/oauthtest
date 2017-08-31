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
$permissions = [
    'scope' => 'user_posts',
];

$url = $helper->getLoginUrl('http://localhost:8080/facebook/callback.php', $permissions);

header('Location:'.$url);
