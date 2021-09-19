<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Sign;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $dipendenti = Employee::all();
        $timbrate = Sign::all();

        return view ('home', compact('dipendenti','timbrate'));
    }
}
