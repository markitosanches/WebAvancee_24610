<?php
namespace App\Routes;

class Route {

    private static $routes = [];

    public static function get($url, $controller){
        self::$routes[] = ['url' => $url, 'controller' => $controller, 'method' => 'GET'];
    }

    public static function post($url, $controller){
        self::$routes[] = ['url' => $url, 'controller' => $controller, 'method' => 'POST'];
    }

    public static function dispatch(){
        // echo "<pre>";
        // var_dump(self::$routes);
        //  echo "</pre>";
        // echo "<pre>";
        // var_dump($_SERVER);
        // echo "</pre>";
         $url = $_SERVER['REQUEST_URI'];
         $urlSegments = explode('?',$url);
        //  print_r($urlSegments);
        //  die();
         $urlPath = $urlSegments[0];
         $method = $_SERVER['REQUEST_METHOD'];

        foreach(self::$routes as $route){
            // echo BASE.$route['url']." == ".$url;
            // echo " && ".$route['method']." == ".$method."<hr/>";
            if(BASE.$route['url'] == $urlPath && $route['method'] == $method) {
                $controllerSegments = explode('@', $route['controller']);
                //print_r($controllerSegments);
                $controllerName = 'App\\Controllers\\'.$controllerSegments[0];
                $methodName = $controllerSegments[1];
                $controllerInstance = new $controllerName();

                if($method == 'GET'){
                    if(isset($urlSegments[1])){
                        parse_str($urlSegments[1], $queryParams);
                        $controllerInstance->$methodName($queryParams);
                    }else{
                        $controllerInstance->$methodName();
                    }
                    
                }elseif($method == 'POST'){
                    if(isset($urlSegments[1])){
                        parse_str($urlSegments[1], $queryParams);
                        $controllerInstance->$methodName($_POST, $queryParams);
                    }else{
                     $controllerInstance->$methodName($_POST);
                     }
                }
            return;
            }
        }

        http_response_code(404);
        echo "404 Not Found";

    }
}

?>

