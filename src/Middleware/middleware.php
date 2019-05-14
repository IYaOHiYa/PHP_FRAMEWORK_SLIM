<?php
    namespace Middleware;
    
    class Middleware{
        public function __invoke($req, $resp, $next)
        {
            $resp->getBody()->write("Before<br /><br />");
            $req = $req->withAttribute("From middleware", 'this is from middleware');
            $resp = $next($req, $resp);
            $resp->getBody()->write("<br /><br />After");
            return $resp;
        }
    }