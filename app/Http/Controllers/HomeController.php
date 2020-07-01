<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index ()
    {
        $user = auth()->user();
        $vista = null;

        if ($user->esVendedor()) {
            $vista = view('home_vendedor');
        }
        else if ($user->esRepositor()) {
            $vista = view('home_repo');
        }
        else if ($user->esAdmin()) {
            $vista = view('home_admin');
        }
        return $vista;
    }

}
