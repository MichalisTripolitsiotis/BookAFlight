<?php

namespace App\Http\Controllers;

use App\Models\Booker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookerController extends Controller
{
    public function store(Request $request)
    {
        Booker::create([
            'from' => $request->from,
            'to' => $request->to,
            'departure_date' => $request->departure_date,
            'return_date' => $request->return_date,
            'adults' => $request->adults,
            'children' => $request->children,
            'kids' => $request->kids,
            'user_id' => Auth::user()->id
        ]);

        //return to somewhere
    }
}
