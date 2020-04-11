<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
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
     * Show the admin's login screen.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the admin's dashboard.
     * view( directory.file )
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard ()
    {
        return view('admin.dashboard');
    }

    /**
     * Show the installation registries.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function instalaciones ()
    {
        return view('admin.instalaciones');
    }

    /**
     * Show the reparation registries.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function reparaciones ()
    {
        return view('admin.reparaciones');
    }
    
}
