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
        $notNullRequest = array_filter($request);

//        dd($notNullRequest);

        $query = "SELECT * FROM appartments";

        if (count($notNullRequest)) { // not empty
            $query .= " WHERE";

            foreach($notNullRequest as $key => $value)
            {
                $query .= " $key = '$value' AND";
            }
        }
        $query = substr($query, 0, -4);
        $query .= ";";

        $appartments = DB::select($query);
        return view('apartments.table', compact('appartments'));

    }
}
