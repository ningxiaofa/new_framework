<?php

namespace core;

class Kernel
{
    static public $classMap = [];

    // route && mvc
    static public function run()
    {
        $uri = $_SERVER['REQUEST_URI'];
        // http://localhost:8100/index.php?index/index
        // http://localhost:8100/index.php/index/index
        // 这里可使用?或者/均可，这里使用?
        $uri = explode('?', $uri);

        $controller = 'index';
        $action = 'index';

        if($uri[1] ?? false){
            $uris = explode('/', $uri[1]);
            $controller = $uris[0];
            if($uris[1] ?? false){
                $action = $uris[1];  
            }
        }
        
        $controller = ucfirst($controller) . 'Controller';
        $controllerClass = '\http\controllers\\' . $controller;
        $actionName = 'action' . ucfirst($action);
        
        try {
            (new $controllerClass)->$actionName();
        } catch (\Throwable $th) {
            $errMsg = $th->getMessage();
            require_once dirname(__DIR__) . '/http/views/error/404.php';
            exit(1);
        }
    }

    static function load($class)
    {
        if (isset(self::$classMap[$class])) {
            return true;
        } else {
            $class = serializePath('/' . $class); // e.g.: core\lib\Route --> /core/lib/Route
            $file = serializePath(APP . $class . '.php', '\\', '/'); 
            if (is_file($file)) {
                include $file;
                self::$classMap[$class] = $class;
            } else {
                return false;
            }
            return true;
        }
    }
}
