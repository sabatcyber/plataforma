<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Estado;
use App\Cidade;
use App\Turma;
use App\Perfil;
use App\Alunos;
use App\Statu;
use App\Bairro;
use Mail;
use App\user;

class PonteController extends Controller
{
   public function ponte(){

        $estados = estado::get()->unique();
        $perfil = perfil::get()->unique();
        $turmas = turma::get()->unique();
        $status = statu::get()->unique();   
        $bairro = bairro::get()->unique();

        $logado = auth()->user()->email;
        $usuario = user::where('email',$logado)->first();
     


        $dt_nasce = DB::select('select DISTINCT dt_nascimento from alunos');
        $dt_cad = DB::select('select DISTINCT dt_cadastro from alunos');
          
        
        //$matricula = rand(10,50000).time();
        $matricula = rand(10,50000);
        $procura = alunos::find($matricula);

        if($procura)
           {
            do{
                $matricula = rand(10,50000);
                $procura = alunos::find($matricula);
             } while ($procura == true);

           } 

		return view('alunos.create',compact('estados','perfil','turmas','tot_alunos','dt_nasce','dt_cad','status','matricula','bairro','logado','usuario'));

  
        }


public function cidades($id){

	    $cidades = cidade::find($id)->where('estado_id',[$id])->get();

        return response()->json($cidades); // o JSON pega todas as cidades e retorna de onde veio (alunos.create)
        }


public function pesquisar($id){

		$nomes = DB::table('estados')->where('estado', 'LIKE', "{$id}%")->orderBy('estado')->get();

        return response()->json($nomes); // o JSON pega todas as cidades e retorna de onde veio (alunos.create)
        }

public function lista(){

          $perfil = perfil::get()->unique();
          $turmas = turma::get()->unique();
          $status = statu::get()->unique();
          $bairro = bairro::get()->unique();

          $logado = auth()->user()->email;
          $usuario = user::where('email',$logado)->first();
        
        
          $dt_nasce = DB::select('select DISTINCT dt_nascimento from alunos');
          $dt_cad = DB::select('select DISTINCT dt_cadastro from alunos');
          $tot_alunos = alunos::count();

          $bancos = DB::table('alunos')->orderBy('created_at', 'desc')->paginate(5);

      return view('alunos.listar',compact('perfil','turmas','bancos','dt_nasce','dt_cad','status','listar','bairro','logado','usuario'));
}

public function pesquisa_turma($id){

        $perfil = perfil::get()->unique();
        $turmas = turma::get()->unique();
        $status = statu::get()->unique();
        $bairro = bairro::get()->unique();

        $logado = auth()->user()->email;
        $usuario = user::where('email',$logado)->first();


        $dt_nasce = DB::select('select DISTINCT dt_nascimento from alunos');
        $dt_cad = DB::select('select DISTINCT dt_cadastro from alunos');

        $bancos = DB::table('alunos')->where('turma','=',[$id])->orderBy('nome_aluno', 'desc')->paginate(5);
        $tot_turma = $bancos->count();


return view('alunos.listar',compact('perfil','turmas','bancos','tot_turma','dt_nasce','dt_cad','status','bairro','logado','usuario'));

}

public function pesquisa_per($id){

        $perfil = perfil::get()->unique();
        $turmas = turma::get()->unique();
        $status = statu::get()->unique();
        $bairro = bairro::get()->unique();

        $logado = auth()->user()->email;
        $usuario = user::where('email',$logado)->first();


        $dt_nasce = DB::select('select DISTINCT dt_nascimento from alunos');
        $dt_cad = DB::select('select DISTINCT dt_cadastro from alunos');
        
        $bancos = DB::table('alunos')->where('perfil','=',[$id])->orderBy('nome_aluno', 'desc')->paginate(5);
        $tot_def = $bancos->count();


return view('alunos.listar',compact('perfil','turmas','bancos','tot_def','dt_nasce','dt_cad','status','bairro','logado','usuario'));

}


public function pesquisa_todos($id){

        $perfil = perfil::get()->unique();
        $turmas = turma::get()->unique();
        $status = statu::get()->unique();
        $bairro = bairro::get()->unique();

        $logado = auth()->user()->email;
        $usuario = user::where('email',$logado)->first();

        $dt_nasce = DB::select('select DISTINCT dt_nascimento from alunos');
        $dt_cad = DB::select('select DISTINCT dt_cadastro from alunos');
        $tot_alunos = alunos::count();
        

        if($id != 0)
        {
        $bancos = DB::table('alunos')->where('contrato','=',[$id])->orderBy('nome_aluno', 'desc')->paginate(5);
        }
        else
        {
        $bancos = DB::table('alunos')->orderBy('nome_aluno', 'desc')->paginate(5);    
        
        }
return view('alunos.listar',compact('perfil','turmas','bancos','dt_nasce','dt_cad','status','bairro','logado','usuario'));

}

public function alunos_pesq($id)
{
        $estados = estado::get()->unique();
        $perfil = perfil::get()->unique();
        $turmas = turma::get()->unique();
        $status = statu::get()->unique();
        $bairro = bairro::get()->unique();

        $logado = auth()->user()->email;
        $usuario = user::where('email',$logado)->first();


$bancos = DB::table('alunos')->where('id','=',[$id])->get()->first();

return view('alunos.update',compact('estados','perfil','turmas','bancos','id','status','bairro','logado','usuario'));


}


public function pesquisa_nasce($id){

        $perfil = perfil::get()->unique();
        $turmas = turma::get()->unique();
        $status = statu::get()->unique();
        $bairro = bairro::get()->unique();

        $logado = auth()->user()->email;
        $usuario = user::where('email',$logado)->first();

        $dt_nasce = DB::select('select DISTINCT dt_nascimento from alunos');
        $dt_cad = DB::select('select DISTINCT dt_cadastro from alunos');


        $bancos = DB::table('alunos')->where('mes','=',[$id])->orderBy('nome_aluno', 'desc')->paginate(5);

        $tot_nasce = $bancos->count();

return view('alunos.listar',compact('perfil','turmas','bancos','tot_nasce','dt_nasce','dt_cad','status','bairro','logado','usuario'));

}

public function pesquisa_cad($id){

        $perfil = perfil::get()->unique();
        $turmas = turma::get()->unique();
        $status = statu::get()->unique();
        $bairro = bairro::get()->unique();
        $logado = auth()->user()->email;
        $usuario = user::where('email',$logado)->first();

        $dt_cad = DB::select('select DISTINCT dt_cadastro from alunos');
        $dt_nasce = DB::select('select DISTINCT dt_nascimento from alunos');
        
        $bancos = DB::table('alunos')->where('dt_cadastro','=',[$id])->orderBy('dt_cadastro', 'desc')->paginate(5);

        $tot_cad = $bancos->count();


return view('alunos.listar',compact('perfil','turmas','dt_cad','dt_nasce','bancos','tot_cad','status','bairro','logado','usuario'));

}

public function pesquisa_status($id){

        $perfil = perfil::get()->unique();
        $status = statu::get()->unique();
        $turmas = turma::get()->unique();
        $bairro = bairro::get()->unique();

        $logado = auth()->user()->email;
        $usuario = user::where('email',$logado)->first();


        $dt_cad = DB::select('select DISTINCT dt_cadastro from alunos');
        $dt_nasce = DB::select('select DISTINCT dt_nascimento from alunos');
        
        $bancos = DB::table('alunos')->where('status','=',[$id])->orderBy('nome_aluno', 'desc')->paginate(5);

        $tot_status = $bancos->count();


return view('alunos.listar',compact('perfil','status','dt_cad','dt_nasce','bancos','tot_status','turmas','bairro','logado','usuario'));

}


public function ciclo(){

        $usuarios = user::get()->unique();
        
        $logado = auth()->user()->email;
        $usuario = user::where('email',$logado)->first();
         

      return view('alunos.ciclo',compact('usuarios','logado','usuario'));
}



public function permissoes(Request $request,$id){

$usuario = user::find($id);

if($usuario)
{

if($request->cadastrar == null)
    $request->cadastrar = "NAO";

if($request->ciclo == null)
    $request->ciclo = "NAO";

if($request->detalhes == null)
    $request->detalhes = "NAO";

if($request->editar == null)
    $request->editar = "NAO";

if($request->env_email == null)
    $request->env_email = "NAO";

if($request->excluir == null)
    $request->excluir = "NAO";

if($request->historico == null)
    $request->historico = "NAO";

if($request->imprimir == null)
    $request->imprimir = "NAO";

if($request->master == null)
    $request->master = "NAO";


$usuario->cadastrar = $request->cadastrar;
$usuario->ciclo = $request->ciclo;
$usuario->detalhes = $request->detalhes;
$usuario->editar = $request->editar;
$usuario->env_email = $request->env_email;
$usuario->excluir = $request->excluir;
$usuario->historico = $request->historico;
$usuario->imprimir = $request->imprimir;
$usuario->master = $request->master;
$usuario->update();

$retorno["message"] = "Autorização concedida";
return response()->json($retorno);
}

}

public function pesquisa_bairro($id){

        $perfil = perfil::get()->unique();
        $status = statu::get()->unique();
        $turmas = turma::get()->unique();
        $bairro = bairro::get()->unique();

        $logado = auth()->user()->email;
        $usuario = user::where('email',$logado)->first();


        $dt_cad = DB::select('select DISTINCT dt_cadastro from alunos');
        $dt_nasce = DB::select('select DISTINCT dt_nascimento from alunos');
        
        $bancos = DB::table('alunos')->where('bairro','=',[$id])->orderBy('nome_aluno', 'desc')->paginate(5);

        $tot_bairro = $bancos->count();


return view('alunos.listar',compact('perfil','status','dt_cad','dt_nasce','bancos','tot_bairro','turmas','bairro','logado','usuario'));

}

public function enviar_email(Request $request, $id)
{
$data = json_decode($request->getContent());

$Mensagem = $data[0];
$Arquivo = $data[1];
$Assunto = $data[2];

Mail::send('alunos.enviar', ['Email' => $Mensagem, 'Assunto' => $Assunto], function ($m) use ($id, $Arquivo,$Assunto)
{

$m->from('sabatcyber@gmail.com', 'Igreja da Comunidade');
$m->to($id);
$m->attach($Arquivo);
$m->subject($Assunto);

});

$retorno["message"] = 'Email enviado com sucesso';
return response()->json($retorno);
//return redirect()->back()->with('alunos.enviar');
}

public function visualizar()
{

return view('alunos.enviar');

}

}
