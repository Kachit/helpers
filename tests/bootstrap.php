<?php
require_once 'Autoloader.php';

$loader = new Jamm\Autoload\Autoloader();
$loader->register_namespace_dir('Kachit\Helper', __DIR__ . '/../src/Kachit/Helper');
$loader->register_namespace_dir('Kachit\Helper\Tests', __DIR__);
$loader->start();