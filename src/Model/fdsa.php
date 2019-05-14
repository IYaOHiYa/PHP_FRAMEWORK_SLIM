<?php
    namespace Model;
    
    class Fdsa{
        const TB = 'fdsa';
        protected $db = null;
        
        static $instance = null;
        
        private function __construct(\Slim\App $app)
        {
            $container = $app->getContainer();
            $this->db = $container['db'];
        }
        
        static public function getInstance(\Slim\App $app)
        {
            if(!self::$instance){
                self::$instance = new self($app);
            }
            return self::$instance;
        }
        
        public function getList()
        {
            $ret = $this->db['test']->query("SELECT * FROM `fdsa`")->fetchAll();
            return $ret;
        }
        
        public function get(int $id)
        {
            $ret = $this->db['test']->query("SELECT * FROM fdsa WHERE `id` = {$id}")->fetch();
            return $ret;
        }
        
        public function create(string $data)
        {
            $tb = self::TB;
            $ret = $this->db['test']->exec("INSERT INTO {$tb} (`data`) values ('" . $data . "')");
            return $ret;
        }
    }
?>