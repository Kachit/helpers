<?php
/* @var Composer\Autoload\ClassLoader $autoloader */
$autoloader = include __DIR__ . '/../vendor/autoload.php';
$autoloader->add('Kachit\Helper\Tests', __DIR__);
$autoloader->add('Kachit\Helper\Testable', __DIR__);