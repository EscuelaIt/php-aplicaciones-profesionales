<?php

  require '../vendor/autoload.php';

  use Dotenv\Dotenv;

  $dotenv = Dotenv::createImmutable('../');
  $dotenv->load();

  echo '---';
  echo $_ENV["DB_USER"];
  echo $_ENV["DB_PASSWORD"];
  exit;

  $router = new AltoRouter();

  $router->map( 'GET', '/', 'FrontController#home', 'home' );
  $router->map( 'GET', '/otra/carpeta', 'FrontController#otraCarpeta' );
  $router->map( 'GET', '/producto/[i:id]', 'FrontController#producto' );
  $router->map( 'GET', '/manuales/nuevo', 'ManualController#insert' );
  $router->map( 'POST', '/manuales/nuevo', 'ManualController#save' );
  $router->map( 'GET', '/manuales/[*:slug]/editar', 'ManualController#edit' );
  $router->map( 'POST', '/manuales/[*:slug]/editar', 'ManualController#edit' );
  $router->map( 'GET', '/manuales/[*:slug]', 'ManualController#single' );
  $router->map( 'POST', '/manuales/buscar', 'ManualController#search' );

  
  $match = $router->match();

  if ($match === false) {
      open404Error();
  } else {
      callController($match);
  }

  function open404Error() {
    header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
    $controllerObject = new App\Controllers\FrontController;
    $controllerObject->error404();
  }

  function callController($match) {
    list( $controller, $action ) = explode( '#', $match['target'] );
      $controller = 'App\\Controllers\\' . $controller;
      if ( method_exists($controller, $action)) {
          $controllerObject = new $controller;
          call_user_func_array(array($controllerObject,$action), $match['params']);
      } else {
          open404Error();
      }
  }

