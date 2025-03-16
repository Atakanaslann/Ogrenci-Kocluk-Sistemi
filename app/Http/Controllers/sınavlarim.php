<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;

class sınavlarim extends Controller
{
    public function index(){

        return view('dashboard.examination');
    }
}