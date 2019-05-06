
<?php

class Controller
{
    public function view($view, $data = [])
    {
        require_once '../App/view/' . $view . '.php';
    }

    public function model($model)
    {
        require_once '../App/model/' . $model . '.php';
        return new $model;
    }
}


?>