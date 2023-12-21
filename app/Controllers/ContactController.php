<?php

namespace App\Controllers;

class ContactController extends Controller
{
    public function index()
    {
        return$this->view('contact');
    }

    public function store($params)
    {
        var_dump($params);
        var_dump('opa');
    }
}