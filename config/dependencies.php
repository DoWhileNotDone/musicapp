<?php

use Monolog\Logger;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\NullHandler;
use Monolog\Formatter\LineFormatter;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Capsule\Manager;

use Rakit\Validation\Validator;

$dbsettings = [
    'driver' => getenv("DB_DRIVER"),
    'host' => getenv("DB_HOST"),
    'database' => getenv("DB_NAME"),
    'username' => getenv("DB_USER"),
    'password' => getenv("DB_PASSWORD"),
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
];

$container = $app->getContainer();

$capsule = new \Illuminate\Database\Capsule\Manager;
$capsule->addConnection($dbsettings);
$capsule->setAsGlobal();
$capsule->bootEloquent();

// Service factory for the ORM
$container['db'] = function ($container) {
    return $capsule;
};

$container["logger"] = function ($container) {
    $logger = new Logger("musicapp");

    $formatter = new LineFormatter(
        "[%datetime%] [%level_name%]: %message% %context%\n",
        null,
        true,
        true
    );

    /* Log to timestamped files */
    $rotating = new RotatingFileHandler(__DIR__ . "/../logs/musicapp.log", 0, Logger::DEBUG);
    $rotating->setFormatter($formatter);
    $logger->pushHandler($rotating);

    return $logger;
};

//Add Validation
$container['validator'] = function ($container) {
    return new Validator;
};
