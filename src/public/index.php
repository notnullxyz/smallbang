<?php

$redis = new Redis();
$redis->connect('smallbang-redis', 6379);
$count = $redis->dbSize();
echo "Redis has $count keys\n";


$mc = new Memcached();
$mc->setOption(Memcached::OPT_BINARY_PROTOCOL, true);
$mc->addServer('smallbang-memcached', 11211);

$mc->set('foo', 'bar');
$value = $mc->get('foo');
echo "Memcached Value for foo: $value";
