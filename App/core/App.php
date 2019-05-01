
<?php

class App
{

    protected
        $controller = 'Home',
        $method = 'index',
        $params = [];


    public function __construct()
    {
        $url = $this->parseURL();
        // controller
        // file_exists jika filenya ada
        // ada  gk file yang namanya home titik php di dalam folder controllers
        if (file_exists('../App/controllers/' . $url[0] . '.php')) {

            $this->controller = $url[0];
            unset($url[0]);
        }

        // memangil controllers
        require_once '../App/controllers/' . $this->controller . '.php';
        // instansiasi
        $this->controller = new $this->controller;


        // method
        // jika method kalau ada cek dulu
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }


        // params
        // kelola parameter
        if (!empty($url)) {
            // ambil datanya
            $this->params = array_values($url);
        }

        // jalankan controller % method, serta kirimkan params jika ada
        // untuk menjalankan controller dan method secara bersamaan
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    // memecah url
    public function parseURL()
    {
        if (isset($_GET['url'])) {
            // menghapus tanda/     
            $url = rtrim($_GET['url'], '/');
            // filter_var untuk membersihkan dari karater aneh
            $url = filter_var($url, FILTER_SANITIZE_URL);
            // perah karater
            $url = explode('/', $url);
            return $url;
        }
    }
}


?>