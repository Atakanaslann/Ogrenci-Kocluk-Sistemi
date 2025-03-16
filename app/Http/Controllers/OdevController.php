<?php

namespace App\Http\Controllers;
use App\Models\Odev;
use Illuminate\Http\Request;

class OdevController extends Controller
{
    public function index(){

        $odevs = Odev::get();
        return view('odev.index', compact('odevs'));
    }

    public function create(){
        return view ('odev.create');
    }

    public function store(Request $request){
        $odev = new Odev();
        $odev->ders = $request->ders;
        $odev->konu = $request->konu;
        $odev->save();

        return redirect()->back();


    }
    public function edit($id){
        $odev = Odev::findOrFail($id);
        return view('odev.edit', compact('odevs'));

    }
}
