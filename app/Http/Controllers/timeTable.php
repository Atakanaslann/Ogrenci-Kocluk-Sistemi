<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;

class timeTable extends Controller
{
    public function index(){

        return view('dashboard.timeTable');
    }
}