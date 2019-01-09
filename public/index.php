<?php

use Phalcon\Loader;
use Phalcon\Mvc\View;
use Phalcon\Mvc\Application;
use Phalcon\Di\FactoryDefault;
use Phalcon\Mvc\Url as UrlProvider;
use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;
use Phalcon\Mvc\Router;
use Phalcon\Http\Request;
use Phalcon\Session\Adapter\Files as Session;

// Определяем некоторые константы с абсолютными путями
// для использования с локальными ресурасами
define('BASE_PATH', dirname(__DIR__));
define('APP_PATH', BASE_PATH . '/app');

include APP_PATH.'/config/config.php';

// Регистрируем автозагрузчик
$loader = new Loader();

$loader->registerDirs(
    [
        APP_PATH . '/controllers/',
        APP_PATH . '/models/',
    ]
);

$loader->register();

// Создаём контейнер DI
$di = new FactoryDefault();

// настраиваем компонент представлений
$di->set(
    'view',
    function () {
        $view = new View();
        $view->setViewsDir(APP_PATH . '/views/');
        return $view;
    }
);

$di->set(
    'request',
    new Request()
);
// Setup a base URI
$di->set(
    'url',
    function () {
        $url = new UrlProvider();
        $url->setBaseUri('/');
        return $url;
    }
);

// Настраиваем сервис для работы с БД
$di->set(
    'db',
    function () {
        return new DbAdapter(
            [
                'host'     => HOST,
                'username' => USERNAME,
                'password' => PASSWORD,
                'dbname'   => DBHAME,
                'port' => PORT
            ]
        );
    }
);

// Создание маршрутизатора
$router = new \Phalcon\Mvc\Router();

// Определение правила маршрутизации
$router->add(
    "/incidient/([0-9]+)",
    [
        "controller" => "loadpage",
        "action"     => "page",
        "pageid" => 1
    ]
);

/*$router->add(
    "/new/([0-9]+)/:params",
    [
        "controller" => "loadPage",
        "action"     => "new",
        "ndx" => 1,
        "params" => 2 //:params
    ]
);*/

/*$router->add(
    "/loadPage/page/([0-9]+)",
    [
        "controller" => "loadPage",
        "action"     => "page",
        "pageid" => 1
    ]
);*/

$di->set(
    'router',
    $router
);


// Сессии запустятся один раз, при первом обращении к объекту
$di->setShared(
    'session',
    function () {
        $session = new Session();

        $session->start();

        return $session;
    }
);

$application = new Application($di);

try {
    // Handle the request
    $response = $application->handle();

    $response->send();
} catch (\Exception $e) {
    echo 'Exception: ', $e->getMessage();
}