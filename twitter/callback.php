<?php

require_once __DIR__.'/../bootstrap.php';

use \Abraham\TwitterOAuth\TwitterOAuth;

$token = json_decode(file_get_contents(__DIR__.'/token.json'));

$get = $_GET;

if ($get['oauth_token'] != $token->oauth_token) {
    var_dump('Error');exit;
}

$con = new TwitterOAuth(getenv('CONSUMER_KEY'), getenv('CONSUMER_SECRET'), $token->oauth_token, $token->oauth_secret);
$token = $con->oauth('oauth/access_token', $get);

file_put_contents(__DIR__.'/token.json', json_encode($token));

header('Location: http://localhost:8080/twitter/show.php');
