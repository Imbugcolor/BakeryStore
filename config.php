<?php

require_once "Facebook/autoload.php";

$FB = new \Facebook\Facebook([
    'app_id' => '396331118860917',
    'app_secret' => '92cf1e1b3232e57bf986dd7cd4e6950c',
    'default_graph_version' => 'v2.10'
]);

$helper = $FB->getRedirectLoginHelper();
