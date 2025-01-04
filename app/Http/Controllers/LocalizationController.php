<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LocalizationController extends Controller
{
    public function index($idioma){ 
        App::setlocale($idioma);
        session()->put('idioma', $idioma);

        return redirect()->back();  
    }
}
