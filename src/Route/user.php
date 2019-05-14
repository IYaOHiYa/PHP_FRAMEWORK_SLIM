<?php
    namespace Route;
    
    class User{
        const VIEW_FOLDER = 'User';

        public function __construct(\Slim\App $app)
        {                        
            $this->user($app);
            $this->get($app);
            $this->create($app);
        }
        
        protected function user(\Slim\App $app)
        {
            $db = $this->fdsa;
            $app->get("/user", function(\Slim\Http\Request $req, \Slim\Http\Response $resp, array $args) use($app){
                //return $resp->withStatus(400, 'Bad Request');
                $db = \Model\Fdsa::getInstance($app);
                $list = $db->getList();
                $resp->write("User page");
                $resp->write(json_encode($list));
                return $resp;
            });
        }
        
        protected function get(\Slim\App $app)
        {
            $app->get("/user/get/{id}", function(\Slim\Http\Request $req, \Slim\Http\Response $resp, array $args) use($app){
                //get fields
                //$data = $request->getQueryParams();
                
                $id = filter_var($args['id'], FILTER_SANITIZE_NUMBER_INT);
                
                if(!$id){
                    return $resp->withStatus(400, 'Bad Request');
                }

                $db = \Model\Fdsa::getInstance($app);
                $ret = $db->get($id);

                if(!$ret){
                    return $resp;
                }
                
                //$resp = $resp->withJson($ret);
                $resp->write(json_encode($ret));
                return $resp;
            });
        }
        
        protected function create(\Slim\App $app)
        {
            $app->post("/user/create", function(\Slim\Http\Request $req, \Slim\Http\Response $resp) use($app){
                //post fields
                $post = $req->getParsedBody();

                $my_data = filter_var($post['data'], FILTER_SANITIZE_STRING);
                
                if(!$my_data){
                    return $resp;
                }
                
                $db = \Model\Fdsa::getInstance($app);
                $ret = $db->create($my_data);
                if(!$ret){
                    return $resp;
                }
                return $resp->withRedirect('/user');
            });
        }
    }