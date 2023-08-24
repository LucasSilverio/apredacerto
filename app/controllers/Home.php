<?php

namespace App\controllers;

class Home
{
    public function index()
    {
        return [
            'view' => 'login.php',
            'data' => []
        ];
    }
}