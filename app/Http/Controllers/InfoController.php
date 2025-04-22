<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function show($service)
    {
        // Vous pouvez utiliser session pour passer des informations ou faire autre chose.
        return view('info')->with('info', $service);
    }
}
