<?php

class Router {
  protected $routes = [];
  public function registerRoute($method, $uri, $controller){
    $this->routes[] = [
      'method' => $method,
      'uri' => $uri,
      'controller' => $controller
    ];
  }

  /**
   * Load error page
   * @param int $httpCode
   * @return void
   */
   public function error($httpCode = 404){
     http_response_code($httpCode);
     loadView("error/{$httpCode}");
     exit;
   }

    /**
     *
     * Add a GET route
     *
     * @param string $uri
     * @param string $controller
     * @return void
     */

     public function get($uri, $contorller){
       $this->registerRoute('GET', $uri, $contorller);
     }
    /**
     *
     * Add a POST route
     *
     * @param string $uri
     * @param string $controller
     * @return void
     */

     public function post($uri, $contorller){
       $this->registerRoute('POST', $uri, $contorller);
     }
    /**
     *
     * Add a PUT route
     *
     * @param string $uri
     * @param string $controller
     * @return void
     */

     public function put($uri, $contorller){
       $this->registerRoute('PUT', $uri, $contorller);
     }
    /**
     *
     * Add a DELETE route
     *
     * @param string $uri
     * @param string $controller
     * @return void
     */

     public function delete($uri, $contorller){
       $this->registerRoute('DELETE', $uri, $contorller);
     }

     /**
      * Route the request
      *
      * @param string $uri
      * @param string $method
      * @return void
      */

      public function route($uri, $method ){
        foreach($this->routes as $route){
          if($route['uri'] === $uri && $route['method'] === $method){
            require basePath($route['controller']);
            return;
          }
        }
        $this->error();
      }
}

?>
