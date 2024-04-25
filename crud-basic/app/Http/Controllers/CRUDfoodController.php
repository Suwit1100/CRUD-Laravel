<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CRUDfoodController extends Controller
{
    public function view_manage()
    {
        return view('managefood');
    }
}
