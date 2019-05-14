<?php
    namespace Dependency;
    
    class View{
        public function __construct(\Slim\App $app)
        {
            $container = $app->getContainer();
            $container["view"] = function($c){
                $path = $c->get("settings")['view'];
                return new \Slim\Views\PhpRenderer($path);
            };
        }
    }