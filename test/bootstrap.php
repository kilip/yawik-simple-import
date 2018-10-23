<?php

require __DIR__.'/../vendor/autoload.php';
$testConfig = include __DIR__ . '/config/config.php';
\CoreTest\Bootstrap::init($testConfig);
