<?php

require_once('slackio.class.php');

use SlackIO\slackio;

$app = new slackio();
$app->run();