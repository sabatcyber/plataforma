<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\user;

class PostagemController extends Controller
{
    
  public function create()
    {
       
        $logado = auth()->user()->email;
        $usuario = user::where('email',$logado)->first();

      return view('alunos.postagem',compact('logado','usuario'));

    }


    public function localizar($nome){

    $nomes = DB::table('alunos')->where('nome_aluno', 'LIKE', "{$nome}%")->orderBy('nome_aluno', 'asc')->get();
    
    
    return response()->json($nomes); // o JSON pega todas as cidades e retorna de onde veio (alunos.create)
        }


    public function registrados($nome){

    $nomes = DB::table('users')->where('email', 'LIKE', "{$nome}%")->orderBy('email', 'asc')->get();
    
    
    return response()->json($nomes); // o JSON pega todas as cidades e retorna de onde veio (alunos.create)
        }



public function achei($id){

	$achei = DB::table('alunos')->where('id',[$id])->get();
	//$achei = alunos::findOrFail($id)->get();
    return response()->json($achei); // o JSON pega todas as cidades e retorna de onde veio (alunos.create)

}

public function qualuser($id){

  $achei = DB::table('users')->where('id',[$id])->get();
  //$achei = alunos::findOrFail($id)->get();
    return response()->json($achei); // o JSON pega todas as cidades e retorna de onde veio (alunos.create)

}


}
