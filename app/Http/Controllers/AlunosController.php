<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Eastwest\Json\Exceptions\EncodeDecode;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Estado;
use App\Cidade;
use App\Fila;
use App\Perfil;
use App\Alunos;
use App\user;


date_default_timezone_set('America/Sao_Paulo');



class AlunosController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('alunos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

$mes = \Carbon\Carbon::parse($request->dt_nascimento)->format('m');
$dat_cad = date('d-m-Y');
$logado = auth()->user()->name;


$nome_r = auth::user()->name; //PEGA NOME DA PESSOA LOGADA
$ema = auth::user()->email; // Pega email da pessoa logada
$ip = getenv("REMOTE_ADDR"); //pega ip da máquina
$linha = "----------------------------------------------------------";
$request->historico = ".";

if($request->status == "")
{
    $request->status = "CADASTRADO";
}

if($request->contrato != ""
 && $request->nome_aluno != "" 
 && $request->sexo != ""
 && $request->dt_nascimento != ""
 && $request->endereco != "" 
 && $request->estado != ""
 && $request->cidade != ""
 && $request->bairro != "" 
 && $request->email != "" 
 && $request->telefone != ""
 && $request->turma != ""  
 && $request->perfil != ""
 && $request->status != ""  
 && $request->historico != ""
 && $request->obs != "")

{

$request->historico = "Cadastrado por: ".$nome_r."\r\n"." Email: ".$ema."\r\n"."Data/Horário: ".\Carbon\Carbon::parse(NOW())->format('d/m/Y H:i:s')."\r\n"."Departamento: ".$request->turma."\r\n"."Status: ".$request->status."\r\n"."Observações: ".$request->obs."\r\n"."IP: ".$ip."\r\n".$linha;

$contra = alunos::where('contrato',$request->contrato)->first();

if(!$contra)
{
        alunos::create([
        'contrato' => $request->contrato,
        'nome_aluno' => $request->nome_aluno,
        'sexo' => $request->sexo,
        'dt_nascimento' => \Carbon\Carbon::parse($request->dt_nascimento)->format('d-m-Y'),
        'mes' => $mes,
        'endereco' => $request->endereco,
        'estado' => $request->estado,
        'cidade' => $request->cidade,
        'bairro' => $request->bairro,
        'email' => $request->email,
        'telefone' => $request->telefone,
        'turma' => $request->turma,
        'perfil' => $request->perfil,
        'historico' => $request->historico,
        'dt_cadastro' => $dat_cad,
        'status' => $request->status,
        'usuario' => $logado,
        'obs' => $request->obs

        ]);

        $retorno["message"] = "Registro incluído com sucesso";
        return response()->json($retorno);
    }
    else
    {
        $retorno["message"] = "Esse contrato já existe no banco de dados";
        return response()->json($retorno);

    }
}
else
{
 $retorno["message"] = "Verifique campos em branco";
 return response()->json($retorno);

}
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contra = alunos::where('contrato',$request->contrato)->first();



    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
$logado = auth()->user()->name;
$request->historico = "Alterado: ".$logado;

if($request->contrato != ""
 && $request->nome_aluno != "" 
 && $request->sexo != ""
 && $request->dt_nascimento != ""
 && $request->endereco != "" 
 && $request->estado != ""
 && $request->cidade != ""
 && $request->bairro != ""
 && $request->email != "" 
 && $request->telefone != ""
 && $request->turma != ""  
 && $request->status != ""  
 && $request->perfil != ""
 && $request->historico != ""
 && $request->obs != "")

{


$contra = DB::table('alunos')->where('id','=',[$id])->get()->first();


if($contra)
{

    alunos::find($id)->update($request->all());

      $retorno["message"] = "Registro alterado com sucesso";
      return response()->json($retorno);
    }
    else
    {
        $retorno["message"] = "Esse contrato não está no banco de dados";
        return response()->json($retorno);

    }
}
else
{
 $retorno["message"] = "Verifique campos em branco";
 return response()->json($retorno);

}


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
      $alunos = alunos::findOrFail($id);
      $alunos->delete();

      $logado = auth()->user()->email;
      $usuario = user::where('email',$logado)->first();


      $perfil = perfil::get()->unique();
      $filas = fila::get()->unique();
            
      return redirect()->back()->with('alunos.listar',compact('bancos','filas','perfil','logado','usuario'));

        
    }

public function alunos_encaminhar(Request $request, $id)
{

$nome_r = auth::user()->name; //PEGA NOME DA PESSOA LOGADA
$ema = auth::user()->email; // Pega email da pessoa logada
$ip = getenv("REMOTE_ADDR"); //pega ip da máquina
$linha = "----------------------------------------------------------";

$data = json_decode($request->getContent());

$alunos = alunos::findOrFail($request->id);
$alunos->turma = $data[0];
$alunos->status = $data[1];
$alunos->obs = $data[2];

$alunos->historico = $alunos->historico."\r\n"."Usuario: ".$nome_r."\r\n"." Email: ".$ema."\r\n"."Data: ".Carbon::now()."\r\n"."Depart: ".$data[0]."\r\n"."Status: ".$data[1]."\r\n"."Obs: ".$data[2]."\r\n"."IP: ".$ip."\r\n".$linha;

$alunos->update();

$retorno["message"] = "Encaminhamento registrado no histórico";
return response()->json($retorno);

//return redirect()->back()->with('alunos.listar');
}

}
