<?php

require_once __DIR__.'/../bootstrap.php';

use \Abraham\TwitterOAuth\TwitterOAuth;

$con = new TwitterOAuth(getenv('CONSUMER_KEY'), getenv('CONSUMER_SECRET'));
$token = $con->oauth('oauth/request_token');

file_put_contents(__DIR__.'/token.json', json_encode($token));

$url = $con->url('oauth/authenticate', ['oauth_token' => $token['oauth_token']]);

header('Location:'.$url);
