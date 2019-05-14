<?php
    namespace Dependency;
    
    class Logger{
        public function __construct(\Slim\App $app)
        {
            $container = $app->getContainer();
            $container["logger"] = function($c){
                $settings = $c->get('settings')['logger'];
                
                $logger = new \Monolog\Logger($settings['name']);
                //$logger->pushProcessor(new \Monolog\Processor\UidProcessor());
                $logger->pushHandler(new \Monolog\Handler\StreamHandler($settings['path'], \Monolog\Logger::DEBUG));
                
                //customer format
                // the default date format is "Y-m-d H:i:s"
                //$dateFormat = "Y n j, g:i a";
                // the default output format is "[%datetime%] %channel%.%level_name%: %message% %context% %extra%\n"
                //$output = "%datetime% > %level_name% > %message% %context% %extra%\n";
                // finally, create a formatter
                //$formatter = new LineFormatter($output, $dateFormat);
                //$logger->setFormatter($formatter);
                return $logger;
            };
        }
        
        /*public function register(\Slim\App $app)
        {
            $container = $app->getContainer();
            $container["logger"] = function($c){
                $settings = $c->get('settings')['logger'];
                
                $logger = new \Monolog\Logger($settings['name']);
                //$logger->pushProcessor(new \Monolog\Processor\UidProcessor());
                $logger->pushHandler(new \Monolog\Handler\StreamHandler($settings['path'], \Monolog\Logger::DEBUG));
                
                //customer format
                // the default date format is "Y-m-d H:i:s"
                //$dateFormat = "Y n j, g:i a";
                // the default output format is "[%datetime%] %channel%.%level_name%: %message% %context% %extra%\n"
                //$output = "%datetime% > %level_name% > %message% %context% %extra%\n";
                // finally, create a formatter
                //$formatter = new LineFormatter($output, $dateFormat);
                //$logger->setFormatter($formatter);
                return $logger;
            };
        }*/
    }