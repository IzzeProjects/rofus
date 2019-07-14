<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Models\Member;

class IndexController extends Controller
{

    private $members;

    /**
     * IndexController constructor.
     * @param $members
     */
    public function __construct(Member $members)
    {
        $this->members = $members;
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $members = $this->members->with(['images'])->orderBy('id', 'desc')->get();
        return view('client.pages.index', compact('members'));
    }

}
