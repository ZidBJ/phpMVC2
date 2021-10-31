<?php

namespace app\core;


class Router
{
    protected array $routes = [];
    public Request $request;
    public Response $response;

    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }
    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    public function resolve()
    {
        // echo '<pre>';
        // var_dump($this->routes);
        // echo '</pre>';
        //////////////////
        // echo '<pre>';
        // var_dump($_SERVER);
        // echo '</pre>';
        $path =  $this->request->getPath();
        // echo '<pre>';
        // var_dump($path);
        // echo '</pre>';
        $method = $this->request->method();
        // echo '<pre>';
        // var_dump($method);
        // echo '</pre>';
        //////////////////
        // echo '<pre>';
        // var_dump($this->routes);
        // echo '</pre>';
        $callback = $this->routes[$method][$path] ?? false;

        if ($callback === false) {
            $this->response->setStatusCode(404);
            return $this->renderview('_404');
        }

        if (is_string(($callback))) {
            return $this->renderView($callback);
        }

        if (is_array(($callback))) {
            echo '<pre>';
            var_dump($callback);
            echo '</pre>';
            return '.';
            Application::$APP->controller = new $callback[0]();
            $callback[0] = Application::$APP->controller;
        }

        // echo '<pre>';
        // var_dump($callback);
        // echo '</pre>';
        return call_user_func($callback, $this->request);
    }

    // Start 44:00 ---- Need To Understand.....
    public function renderView($view, $params = [])
    {
        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view, $params);
        return str_replace('{{content}}', $viewContent,  $layoutContent);
    }

    // public function renderContent($viewContent)
    // {
    //     $layoutContent = $this->layoutContent();
    //     return str_replace('{{content}}', $viewContent,  $layoutContent);
    // }

    protected function layoutContent()
    {
        $layout = Application::$APP->controller->layout;
        ob_start();
        include_once Application::$ROOT_DIR . "/views/layouts/$layout.php";
        return ob_get_clean();
    }

    protected function renderOnlyView($view, $params)
    {

        foreach ($params as $key => $value) {
            $$key = $value;
        }
        // echo '<pre>';
        // var_dump($zz);
        // echo '</pre>';

        ob_start();
        include_once Application::$ROOT_DIR . "/views/$view.php";
        return ob_get_clean();
    }
    // End  44:00 ----
}
