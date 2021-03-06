<?php

namespace app\core;
//no es necesario, Application y Controller están en la misma carpeta
//use app\core\Application;

class Controller 
{
    public string $layout = 'main';

    public function render($view, $params = [])
    {
        return Application::$app->router->renderView($view, $params);
    }

    public function setLayout($layout)
    {
        //hacemos algo
        $this->layout = $layout;
    }
}