<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        $data['pagina'] = 'Principal/Dashboard_view';
        return view('Pagina_view',$data);
    }
}
