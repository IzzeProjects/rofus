<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('client.pages.index');
    }

}
