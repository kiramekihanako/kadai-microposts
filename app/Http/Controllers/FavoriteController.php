<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavoriteController extends Controller
{
     public function store(Request $request, $id)
    {
        \Auth::user()->favoru($id);
        return redirect()->back();
    }

    public function destroy($id)
    {
        \Auth::user()->unfavoru($id);
        return redirect()->back();
    }
}
