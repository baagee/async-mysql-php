<?php
/**
 * Created by PhpStorm.
 * User: Jenner
 * Date: 2015/7/21
 * Time: 19:17
 */
require dirname(dirname(__FILE__)) . '/vendor/autoload.php';
ini_set('memory_limit', "1024M");
set_time_limit(0);

echo microtime() . PHP_EOL;

for ($i = 0; $i < 10; $i++) {
    try {
        $async_mysql = new \Jenner\Mysql\Async();
        $async_mysql->attach(
            ['host' => '127.0.0.1', 'user' => 'root', 'password' => '', 'database' => 'test', 'port' => 3306],
            'select ID, NAME from async'
        );
        $async_mysql->attach(
            ['host' => '127.0.0.1', 'user' => 'root', 'password' => '', 'database' => 'test', 'port' => 3306],
            'select ID, NAME from async'
        );
        $result = $async_mysql->execute();
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
echo microtime() . PHP_EOL;

echo memory_get_usage() . PHP_EOL;