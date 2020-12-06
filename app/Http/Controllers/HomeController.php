<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Estado;
use App\Cidade;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function cad_alunos(){

        $estados = DB::table('estados')->get(['id','estado'])->unique();

        return view('alunos', ['estados'=> $estados]);

        }



    public function cidades($id){

        $produto = cidade::find($id)->where('estado_id',[$id])->get();

        return response()->json($produto);
        }


public function responsaveis(){

       return view('responsaveis');
        }
    

}
