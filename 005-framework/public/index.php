<?php

//envez de incluir el archivo con require 
require_once __DIR__ . '/../vendor/autoload.php';
//usando application.php
use app\core\Application;

try {
    //echo "1 antes de DotEnv\n";
    $dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
    //echo "2 DotEnv\n";
    $dotenv->load();
    //echo "3 cargo DotEnv\n";
}
 catch(Error $ex){
        echo $ex->getMessage();
}



$config = [
    'db' => [
        'dsn'=> $_ENV['DSN'],
        'user'=> $_ENV['USUARIO'],
        'password'=> $_ENV['PASSWORD'],
    ]
];


//echo "Hello Framework";
//Application :inicializacion de componente bases de framework
//$app = new app\core\Application();
$app = new Application(dirname(__DIR__), $config);

//echo __DIR__;
//echo "<br>";
//esta es la ruta padre en mi caso hasta 005-framework
//echo dirname(__DIR__);

//definiciones , crear rutas
//$router= new Router();

//se define funcion() anonima llamada callback
//esto se puede mejorar con "Composicion" (una clase puede componer a otra clase)
// por lo que cambia a $app->router->get
//y ya no se necesita la definicion de crear ruta 
//router->get('/', function(){
//$app->router->get('/005-framework/', function(){
//    return "Hola Mundo";
//}); 

/*$app->router->get('/005-framework/public/','home');
$app->router->get('/005-framework/contact','contact');
$app->router->post('/005-framework/contact',function(){
return "Procesando información";
});*/

$app->router->get('/005-framework/public/',[\app\controllers\SiteController::class, 'home']);
$app->router->get('/005-framework/contact',[\app\controllers\SiteController::class, 'contact']);
$app->router->post('/005-framework/contact',[\app\controllers\SiteController::class, 'handleContact']);

$app->router->get('/005-framework/register',[\app\controllers\AuthController::class, 'register']);
$app->router->post('/005-framework/register',[\app\controllers\AuthController::class, 'register']);

$app->router->get('/005-framework/login',[\app\controllers\AuthController::class, 'login']);
$app->router->post('/005-framework/login',[\app\controllers\AuthController::class, 'login']);


//ejecuta todo lo que tienen framework
$app->run();

//$app->request