<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EvenementController extends Controller
{
    public function index(){
        return view ('organisateur.evenement');
    }
}
