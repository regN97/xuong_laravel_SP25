<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index(){
        return view('admin.brands.index');
    }

    public function create(){
        return view('admin.brands.create');
    }
}
