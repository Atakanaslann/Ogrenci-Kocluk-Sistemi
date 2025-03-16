<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;

class DerslerimController extends Controller
{
    public function index(){

        return view('students.derslerim');
    }
}