<?php

//definir namespace
namespace app\core;

class Request
{
    public function getPath()
    {
        $path= $_SERVER['REQUEST_URI'] ?? '/';
        $position=strpos($path, '?');
        // echo "<pre>";
        // echo "De Request.php";
        // echo "</pre>";
        // echo "<pre>";
        // echo '$path:' . $path ;
        // echo "</pre>";
        // echo "<pre>";
        // echo '$position(?):' . $position ;
        // echo "</pre>";

        //para que compare Absolutamente igual, $position podria ser 0 y eso es diferente a false
        //no hace conversion de datos al comparar
        // wjwmplo /users?id=3&otravariable=6
        if ($position===false ){
            return $path;
           }
        return substr($path, 0, $position);

    }
    public function getMethod()
    {
        return strtolower($_SERVER["REQUEST_METHOD"]);
    }

    public function isPost()
    {
        return $this->getMethod() === 'post';
    }

    public function isGet()
    {
        return $this->getMethod() === 'get';
    }

    public function getBody()
    {
        $body = [];

        if($this->getMethod() === 'get') {
            foreach($_GET as $key => $value){
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }elseif($this->getMethod() === 'post'){
            foreach($_POST as $key => $value){
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
                        }
        }

        return $body;
    }
}