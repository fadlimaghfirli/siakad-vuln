<?php

namespace Core;

class App
{
    protected $controller = 'HomeController';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseUrl();

        // 1. Cek Controller
        $controllerName = isset($url[0]) ? ucfirst($url[0]) . 'Controller' : $this->controller;
        $controllerFile = '../app/Controllers/' . $controllerName . '.php';

        if (file_exists($controllerFile)) {
            $this->controller = $controllerName;
            unset($url[0]);
        }

        // Instansiasi Controller dengan namespace
        $controllerClass = "\\App\\Controllers\\" . $this->controller;
        $this->controller = new $controllerClass;

        // 2. Cek Method/Fungsi di dalam Controller
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // 3. Cek Parameter tambahan (misal ID)
        $this->params = $url ? array_values($url) : [];

        // Jalankan Controller & Method, serta kirimkan parameter jika ada
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseUrl()
    {
        if (isset($_GET['url'])) {
            // Membersihkan URL dari karakter aneh
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
        return [];
    }
}
