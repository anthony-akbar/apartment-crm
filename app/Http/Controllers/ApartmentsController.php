<?php

namespace App\Http\Controllers;

use App\Models\Appartment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApartmentsController extends Controller
{
    public function index()
    {
        $appartments = Appartment::all();
        return view('apartments.index', compact('appartments'));
    }

    public function search() {
        $request = request()->all()['data'];
        $query = [];
        foreach ($request as $key =>$item) {
         if($item){
             $query[] = [$key , $item];
         }
        }
        $appartments = Appartment::where($query)->get();
        return view('apartments.table', compact('appartments'));

    }
}
