<?php

namespace App\Http\Controllers;

use App\Models\Appartment;
use Illuminate\Http\Request;

class ApartmentsController extends Controller
{
    public function index()
    {
        $appartments = Appartment::all();
        return view('apartments.index', compact('appartments'));
    }

    public function search() {
        $request = request()->all()['data'];
        $appartments = Appartment::where('number', $request['number'])
            ->orWhere('rooms', $request['rooms'])
            ->orWhere('floor', $request['floor'])
            ->orWhere('square', $request['square'])
            ->orWhere('price', $request['price'])
            ->orWhere('terace', $request['terace'])
            ->orWhere('total', $request['total'])
            ->orWhere('status', $request['status'])->get();
        return view('apartments.table', compact('appartments'));

    }
}
