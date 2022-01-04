<?php

namespace App\Http\Controllers;
use App\Contato;

use Illuminate\Http\Request;

class Contato extends Controller
{
    public function index(){

           $contato = Contato::get();
        return view('app.listar', ['contato' => $contato]);
    }
}
