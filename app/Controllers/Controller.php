<?php

namespace App\Controllers;

use Exception;
use League\Plates\Engine;

class Controller
{
    public function view(string $view, array $data = [])
    {
        $viewsPath = dirname(__FILE__, 2).'/Views';

        if (!file_exists($viewsPath.DIRECTORY_SEPARATOR.$view.'.php')) {
            echo "A view {$view} não existe";die();
        }

        $templates = new Engine($viewsPath);

        echo $templates->render($view, $data);
    }
}