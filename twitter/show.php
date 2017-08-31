<?php

require_once __DIR__.'/../bootstrap.php';

use \Abraham\TwitterOAuth\TwitterOAuth;

$token = json_decode(file_get_contents(__DIR__.'/token.json'));

$con = new TwitterOAuth(getenv('CONSUMER_KEY'), getenv('CONSUMER_SECRET'), $token->oauth_token, $token->oauth_token_secret);

$statuses = $con->get("statuses/home_timeline", ["count" => 25, "exclude_replies" => true]);

foreach ($statuses as $key => $value) {
    var_dump($value->user->name, $value->text);
}
