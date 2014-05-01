<?php
require_once 'Autoloader.php';

$loader = new Jamm\Autoload\Autoloader();
$loader->register_namespace_dir('Kachit\Helper\Tests', __DIR__);
$loader->register_namespace_dir('Kachit\Helper', __DIR__ . '/../src');
$loader->start();

//var_dump($loader->get_namespaces());