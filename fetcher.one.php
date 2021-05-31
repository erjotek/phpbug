<?php

require_once __DIR__ . '/vendor/autoload.php';

use Anthill\Fetchers\TestFetcher;
use Anthill\Parsers\TestParser;

define('SSH_IP', '127.0.0.1');
define('SSH_USER', 'testuser');
define('SSH_PASS', 'testpass');

$fetcher = new TestFetcher();
$fetcher->fetch();

// todo remove this line
new TestParser();

echo "finish";
