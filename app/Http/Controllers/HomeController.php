<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class HomeController extends Controller
{

    public static function middleware(): array
    {
        return [
            'auth'
            
        ];
    }
    public function index() {
        return view('welcome');
    }
}
