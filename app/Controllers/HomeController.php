<?php

namespace App\Controllers;

class HomeController extends BaseController
{
    public function index()
    {
        if (!session()->get('logged_in')) 
        {
            return redirect()->to('/login')->send();
        } else {
            return view('home_view');
        }
    }

}
