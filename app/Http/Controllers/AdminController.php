<?php

namespace App\Http\Controllers;

use App\Helpers;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Show the application admin.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        dd(Helpers::getModels());
        return view('admin.index', [
            'title' => 'Admin',
        ]);
    }
}
