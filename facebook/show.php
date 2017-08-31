<?php

require_once __DIR__.'/../bootstrap.php';

use \Facebook\Facebook;

$fb = new Facebook([
    'app_id' => getenv('FB_ID'),
    'app_secret' => getenv('FB_SECRET'),
    'default_graph_version' => 'v2.8',
]);

$token = json_decode(file_get_contents(__DIR__.'/token.json'));
$fb->setDefaultAccessToken($token->value);

$res = $fb->get('/me/feed')->getDecodedBody();

foreach ($res['data'] as $key => $value) {
    if (!isset($value['message'])) {
        var_dump('story', $value['story']);
        continue;
    }
    var_dump('message', $value['message']);
}
