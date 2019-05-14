<?php
    namespace Route;
    
    class Index{
        const VIEW_FOLDER = 'Index';
        
        public function __construct(\Slim\App $app)
        {
            $this->index($app);
        }
        
        /*public function register(\Slim\App $app)
        {
            $this->index($app);
        }*/
        
        protected function index(\Slim\App $app)
        {
            $app->get("/", function(\Slim\Http\Request $req, \Slim\Http\Response $resp, array $args){
                //return $res->withStatus(400, 'Bad Request');
                $this->logger->info("Someone enter index", ["IP" => $_SERVER['REMOTE_ADDR']]);
                //$resp->write('Index page');
                
                //Middleware send args
                echo $req->getAttribute("From middleware");
                
                $data = [
                    'ip' => $_SERVER['REMOTE_ADDR'],
                    'title' => 'My First Slim Project',
                ];
                return $this->view->render($resp, self::VIEW_FOLDER . '/index.phtml', $data);
            });
        }
    }