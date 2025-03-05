<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'username' => session()->get('username'),
            'role' => session()->get('role')
        ];
        return view('home', $data);
    }
}
