<?php

namespace App\Http\Controllers;
use App\Http\Controllers\FaqController;

use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Afficher la page FAQ.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('faq');
    }
}

