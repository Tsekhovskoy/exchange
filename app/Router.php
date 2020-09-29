<?php

/**
 * Class Router. Parse an entered link to controller name and action name. Call found action in controller
 * @package app
 */
class Router
{
    private $routes;

    public function __construct() {
        //$routesPath = ROOT.'/config/routes.php';
        $this->routes = include (ROOT.'/config/routes.php');
    }

    private function getURI() {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
        return false;
    }

    public function run() {
        $uri = $this->getURI();

        foreach ($this->routes as $uriPattern => $path) {

            if (preg_match("~$uriPattern~", $uri)) {
                $path = $path[0];
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);
                $segments = explode('/', $internalRoute);

                $controllerName = ucfirst(array_shift($segments));
                $actionName = 'action' . ucfirst(array_shift($segments));
                $parameters = $segments;

                $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';

                if (file_exists($controllerFile)) {
                    include_once ($controllerFile);
                }
                $controllerObject = new $controllerName;
                call_user_func_array([$controllerObject, $actionName], $parameters);
                break;
                }
            }
        }

}