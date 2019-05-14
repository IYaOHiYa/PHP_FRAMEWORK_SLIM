<?php
    namespace Dependency;
    
    class Db{
        public function __construct(\Slim\App $app)
        {
            $container = $app->getContainer();
            $container["db"] = function($c){
                static $ret = null;
                $dbs = $c->get('settings')['db'];
                foreach($dbs as $tag => $db){
                    try{
                        $ret[$tag] = new \PDO(sprintf("%s:host=%s;dbname=%s;charset=utf8", $db['engine'], $db['host'], $db['dbName']), $db['user'], $db['passwd']);
                        $ret[$tag]->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                        $ret[$tag]->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
                    }catch(\PDOException $e){
                        die("Error with DB:" . $e->errorMessage());
                    }
                }
                return $ret;
            };
        }
        
        /*public function register(\Slim\App $app)
        {
            $container = $app->getContainer();
            $container["db"] = function($c){
                static $ret = null;
                $dbs = $c->get('settings')['db'];
                foreach($dbs as $tag => $db){
                    try{
                        $ret[$tag] = new \PDO(sprintf("%s:host=%s;dbname=%s;charset=utf8", $db['engine'], $db['host'], $db['dbName']), $db['user'], $db['passwd']);
                        $ret[$tag]->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                        $ret[$tag]->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
                    }catch(\PDOException $e){
                        die("Error with DB:" . $e->errorMessage());
                    }
                }
                return $ret;
            };
        }*/
    }