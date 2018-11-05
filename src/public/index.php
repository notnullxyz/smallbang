<?php

require_once '../Confessor.php';

$confessor = new Confessor();

if ($confessor->get('APP_ENV') === 'debug') {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
}

$redis = new Redis();
$redis->connect(
    $confessor->get('REDIS_HOST'),
    $confessor->get('REDIS_PORT'));

$mc = new Memcached();
$mc->setOption(Memcached::OPT_BINARY_PROTOCOL, true);
$mc->addServer(
    $confessor->get('MEMCACHED_HOST'),
    $confessor->get('MEMCACHED_PORT'));

$count = $redis->dbSize();
echo "Redis has $count keys\n";
$mc->set('foo', 'bar');
$value = $mc->get('foo');
echo "Memcached Value for foo: $value";
