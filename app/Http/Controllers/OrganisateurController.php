<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrganisateurController extends Controller
{
   
    public function index(){
        return view('organisateur.home');
    }

    public function statistiques(){
        return view('organisateur.statistiques');
    }
     
}
