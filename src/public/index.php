<?php
    define(APP_BASE , realpath(__DIR__));
    define(SRC_BASE , APP_BASE . '/../');
    define(PROJ_BASE, APP_BASE . '/../../');

    include(PROJ_BASE . "vendor/autoload.php");
    include(SRC_BASE . "setup.php");
    
    include(SRC_BASE . "Dependency/db.php");
    include(SRC_BASE . "Dependency/logger.php");
    include(SRC_BASE . "Dependency/view.php");
    
    include(SRC_BASE . "Route/index.php");
    include(SRC_BASE . "Route/user.php");
    
    include(SRC_BASE . "Model/fdsa.php");

    include(SRC_BASE . "Middleware/middleware.php");
    
    $app = new \Slim\App(\Setup::getSetting());
    
    //Dependency
    //(new \Dependency\Db())->register($app);
    //(new \Dependency\Logger())->register($app);
    new \Dependency\Db($app);
    new \Dependency\Logger($app);
    new \Dependency\View($app);
    
    //Route
    //(new \Route\Index())->register($app);
    //(new \Route\User())->register($app);
    new \Route\Index($app);
    new \Route\User($app);
    
    $app->add( new \Middleware\Middleware() );
    
    $app->run();