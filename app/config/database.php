<?php

return array(
  'fetch' => PDO::FETCH_CLASS,
  'default' => 'mysql',
  'connections' => array(
    'mysql' => array(
      'driver'    => 'mysql',
      'host'      => 'localhost',
      'database'  => 'krumpled',
      'username'  => 'krumpled',
      'password'  => 'krumppass',
      'charset'   => 'utf8',
      'collation' => 'utf8_unicode_ci',
      'prefix'    => '',
    )
  ),
  'migrations' => 'migrations',
  'redis' => array(
    'cluster' => false,
    'default' => array(
      'host'     => '127.0.0.1',
      'port'     => 6379,
      'database' => 0,
    )
  )
);
