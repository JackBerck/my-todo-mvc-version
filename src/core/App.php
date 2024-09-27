<?php

class App
{
    protected $controller = 'Home'; // default controller
    protected $method = 'index'; // default method
    protected $params = []; // default params

    public function __construct()
    {
        $url = $this->parseURL(); // panggil method parseURL

        // controller
        if (file_exists('../src/controllers/' . $url[0] . '.php')) {
            $this->controller = $url[0]; // jika file controller ditemukan, timpa controller default dengan controller yang diakses
            unset($url[0]); // hilangkan elemen pertama dari array
        }
        require_once '../src/controllers/' . $this->controller . '.php'; // panggil file controller yang diakses
        $this->controller = new $this->controller; // instansiasi class controller

        // method
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1]; // jika method ditemukan, timpa method default dengan method yang diakses
                unset($url[1]); // hilangkan elemen kedua dari array
            }
        }

        // params
        if (!empty($url)) {
            $this->params = array_values($url); // jika parameter ada, maka jadikan array
        }

        // jalankan controller & method, serta kirimkan params jika ada
        call_user_func_array([$this->controller, $this->method], $this->params); // panggil controller & method, serta kirimkan params jika ada
    }

    public function parseURL()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/'); // hilangkan tanda / di akhir URL
            $url = filter_var($url, FILTER_SANITIZE_URL); // bersihkan URL dari karakter-karakter aneh
            $url = explode('/', $url); // pecah URL berdasarkan tanda /
            return $url; // kembalikan nilai array URL
        }
    }
}
