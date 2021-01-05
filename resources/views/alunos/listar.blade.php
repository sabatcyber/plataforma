@extends('layouts.app')

@section('responsaveis')


<div>
<ul class="nav nav-tabs">
  
  <li class="nav-item">
    <a class="nav-link " href="{{ route('ponte') }}">Cadastrar Amigo</a>
  </li>

  <li class="nav-item">
    <a class="nav-link active" href="#">Banco de amigos</a>
  </li>
  
  <li class="nav-item">
    <a class="nav-link " href="{{ route('postar') }}">Localizar/Detalhes</a>
  </li>

</ul>
</div>

<br>


<div class="teste">
<!--DIV BOTÃO PESQUISAR POR MATRÍCULA --> 

<div class="col-md-4 offset-md-0">
<label style="margin-left:0%;"><font color="#045FB4"><b>Pesquisar amigo pela matrícula</b></font></label>
&nbsp &nbsp
        @if(isset($sla))
  <input type="text" autofocus name="chama_" id="chama_" value="{{$sla}}" size="10" style="text-align: right; background-color: #E6E6E6">
        @else
  <input type="text" autofocus name="chama_" id="chama_" size="10" style="text-align: right; background-color: #E6E6E6">
        @endif

<button type="button" class="btn btn-sm"  onclick="todos()"><img border="0" title="Pesquisar amigo pela matrícula" src="\img\luneta2.jpg" width="25" height="25">
</button>
</div>

<!--DIV TABELA DE DADOS -->

<table class="table-bordered table-striped table-responsive table-active">
  <thead>
    <tr>
          <th style="background:#CEECF5;"><center><font size=1>MAT</font></center></th>
          <th style="background:#CEECF5;"><center><font size=1>NOME</font></center></th>
  
    @if(isset($tot_nasce))
          <th style="color:red;width: 5%;background:#CEECF5;"><center><font size=1>DT_NASC - {{$tot_nasce}}</font></center>
    @else
          <th style="width: 5%; background:#CEECF5;"><center><font size=1>DT_NASC</font></center>
    @endif
    
    <select  style="width: 100%; font-size: 12px;" id="nasce" onclick="p_nasce()">
            <option style="font-size: 11px;"></option>  
            <option style="font-size: 11px;">01</option>  
            <option style="font-size: 11px;">02</option>  
            <option style="font-size: 11px;">03</option>  
            <option style="font-size: 11px;">04</option>  
            <option style="font-size: 11px;">05</option>  
            <option style="font-size: 11px;">06</option>  
            <option style="font-size: 11px;">07</option>  
            <option style="font-size: 11px;">08</option>  
            <option style="font-size: 11px;">09</option>  
            <option style="font-size: 11px;">10</option>  
            <option style="font-size: 11px;">11</option>  
            <option style="font-size: 11px;">12</option>  

  </select>
    
</th>


  <th  style="width: 6%;background:#CEECF5;"><center><font size=1>TELEFONE</font></center></th>
  <th style="background:#CEECF5;"><center><font size=1>EMAIL</font></center></th>


   @if(isset($tot_bairro))
          <th style="color:red;background:#CEECF5;"><center><font size=1>BAIRRO - {{$tot_bairro}}</font></center>
      @else
          <th style="background:#CEECF5;"><center><font size=1>BAIRRO</font></center>
      @endif

      @if(isset($bairro))
          <select  style="width: 100%;font-size: 12px;" id="bai" onclick="p_bairro()">
              <option style="font-size: 11px;"></option>  
      @foreach($bairro as $bai) 
              <option style="font-size: 10px;">{{$bai->nome}}</option>
      @endforeach 
          </select>
      @endif
          </th>



  
   @if(isset($tot_status))
          <th style="color:red;background:#CEECF5;"><center><font size=1>DEP - {{$tot_status}}</font></center>
      @else
          <th style="background:#CEECF5;"><center><font size=1>STATUS</font></center>
      @endif

      @if(isset($status))
          <select  style="width: 100%;font-size: 12px;" id="tatu" onclick="p_status()">
              <option style="font-size: 11px;"></option>  
      @foreach($status as $sta) 
              <option style="font-size: 10px;">{{$sta->status}}</option>
      @endforeach 
          </select>
      @endif
          </th>


 
      @if(isset($tot_turma))
          <th style="color:red;background:#CEECF5;"><center><font size=1>DEP - {{$tot_turma}}</font></center>
      @else
          <th style="background:#CEECF5;"><center><font size=1>DEPARTAMENTO</font></center>
      @endif

      @if(isset($turmas))
          <select  style="width: 100%;font-size: 12px;" id="turma" onclick="p_turma()">
              <option style="font-size: 11px;"></option>  
      @foreach($turmas as $tur) 
              <option style="font-size: 10px;">{{$tur->turma}}</option>
      @endforeach 
          </select>
      @endif
          </th>



      @if(isset($tot_per))
          <th style="color:red;background:#CEECF5;"><center><font size=1>PERFIL - {{$tot_per}}</font></center>
      @else
          <th style="background:#CEECF5;"><center><font size=1>PERFIL</font></center>
      @endif

      @if(isset($perfil))
          <select  style="width: 100%; font-size: 12px;" id="def_per" onclick="perfil()">
          <option ></option>  
      @foreach($perfil as $per) 
          <option style="font-size: 11px;">{{$per->perfil}}</option>
      @endforeach 
          </select>
      @endif
          </th>
  
 
      @if(isset($tot_cad))
          <th style="color:red;width: 5%;background:#CEECF5;"><center><font size=1>DT_CAD - {{$tot_cad}}</font></center>
      @else
          <th style="width: 5%;background:#CEECF5;"><center><font size=1>DT_CAD</font></center>
      @endif

      @if(isset($dt_cad))
          <select  style="width: 100%; font-size: 12px;" id="cad" onclick="p_cad()">
          <option style="font-size: 11px;"></option>  
      @foreach($dt_cad as $cad) 
          <option style="font-size: 10px;">{{ Carbon\Carbon::createFromDate($cad->dt_cadastro)->format('d-m-Y') }}</option>
      @endforeach 
          </select>
      @endif
        </th>
        <th style="background:#CEECF5;"><center><font size=1>HORAS</font></center></th>
        <th style="background:#CEECF5;"><center><font size=1>SLA</font></center></th>
 
        @if ($usuario->ciclo != 'NAO')      
            <th style="background:#F3F781;"><center><font size=1>CICLO</font></center></th>
        @endif

        @if ($usuario->historico != 'NAO') 
            <th style="background:#F3F781;"><center><font size=1>HISTÓRICO</font></center></th>
        @endif
        
        @if ($usuario->env_email != 'NAO') 
            <th style="background:#F3F781;"><center><font size=1>EMAIL</font></center></th>
        @endif

        @if ($usuario->editar != 'NAO') 
            <th style="background:#F3F781;"><center><font size=1>EDITAR</font></center></th>
        @endif
            
        @if ($usuario->excluir != 'NAO') 
            <th style="background:#F3F781;"><center><font size=1>EXCLUIR</font></center></th>
        @endif    
    </tr>
</thead>


@foreach($bancos as $banco)	
<tr>    
<td ><font size=1 color='#084B8A'> <b>{{$banco->contrato}}</b> </font></td>
<td ><font size=1 color='#084B8A'> <b>{{$banco->nome_aluno}}</b> </font></td>
<td ><font size=1 color='#084B8A'> <b>{{ Carbon\Carbon::createFromDate($banco->dt_nascimento)->format('d-m-Y') }}</b> </font></td>

<td ><font size=1 color='#084B8A'> <b>{{$banco->telefone}}</b> </font></td>
<td ><font size=1 color='#084B8A'> <b>{{$banco->email}}</b> </font></td>
<td ><font size=1 color='#084B8A'> <b>{{$banco->bairro}}</b> </font></td>
<td ><font size=1 color='#084B8A'> <b>{{$banco->status}}</b> </font></td>
<td ><font size=1 color='#084B8A'> <b>{{$banco->turma}}</b> </font></td>
<td ><font size=1 color='#084B8A'> <b>{{$banco->perfil}}</b> </font></td>

<td ><font size=1 color='#084B8A'> <b>{{ \Carbon\Carbon::parse($banco->dt_cadastro)->format('d-m-Y')}}</b> </font></td>

<td ><font size=1 color='#084B8A'> <b>{{\Carbon\Carbon::parse($banco->created_at)->format('H:i:s')}}</b> </font></td> 

<?php
 
 date_default_timezone_set('America/Sao_Paulo');
 $agora = date('Y-m-d H:i:s');
 $date1 = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $banco->created_at);
 $date2 = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $agora);
 $sla = $date2->diffInHours($date1);

 ?>

<td><font size=1 style="color:red;" > <b>{{$sla}}h</b> </font></td> 


@if ($usuario->ciclo != 'NAO') 
    <td>
    <button type="button" class="btn btn-light btn-sm" data-toggle="modal" data-target="#ciclo{{$banco->id}}"><img border="0" title="Ciclo do amor" src="\img\ciclo.jpg" width="30" height="30">
    </button>
    </td> 
@endif

@if ($usuario->historico != 'NAO') 
    <td>
    <button type="button" class="btn btn-light btn-sm" data-toggle="modal" data-target="#historico{{$banco->id}}"><img border="0" title="Histórico" src="\img\historico.png" width="25" height="25">
    </button>
    </td> 
@endif
 
 @if ($usuario->env_email != 'NAO') 
    <td>
    <button type="button" class="btn btn-light btn-sm" data-toggle="modal" data-target="#email{{$banco->id}}"><img border="0" title="Enviar email" src="\img\email.jpg" width="25" height="25">
    </button>
    </td> 
@endif

@if ($usuario->editar != 'NAO') 
    <td>
    <a href="{{ route('alunos_pesq', [$banco->id]) }}"><img border="0" title="Editar registro" src="\img\Editar.png" width="28" height="28">
    </a>
    </td> 
@endif

@if ($usuario->excluir != 'NAO') 
 <td>
<button type="button" class="btn btn-light btn-sm" data-toggle="modal" data-target="#exclusao{{$banco->id}}"><img border="0" title="Excluir amigo" src="\img\Lixeira.png" width="25" height="25">
</button>
</td>
@endif

</tr>

<div class="modal fade" id="exclusao{{$banco->id}}" tabindex="-1" role="dialog" aria-labelledby="exclusao" aria-hidden="true">
  <div class="modal-dialog modal-lg"  role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #00688B;color:#FFFAFA;">
        <img border="0" title="Excluir amigo" src="\Img\Lixeira.png" width="22" height="25"> &nbsp &nbsp 
        <h5 class="modal-title" id="exclusao{{$banco->id}}">ATENÇÃO - Tela de exclusão!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <br>
        <div class="container">
          <a href="{{ route('alunos_destroy', [$banco->id]) }}"><pre style="width: 100%;font-size: 12px; background-color: #B22222; color:#FFFAFA;"> Excluir amigo: {{$banco->nome_aluno}} - MATRÍCULA: {{$banco->contrato}}</pre></a>
        </div>
      </div>
      <div class="modal-footer" style="background-color:#D8D8D8;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="historico{{$banco->id}}" tabindex="-1" role="dialog" aria-labelledby="exclusao" aria-hidden="true">
  <div class="modal-dialog modal-lg"  role="document">
    <div class="modal-content">
      <div class="modal-header">
        <img border="0" title="Histórico do amigo" src="\Img\historico.png" width="22" height="25"> &nbsp &nbsp 
        <h5 class="modal-title" id="historico{{$banco->id}}">HISTÓRICO de tramitação!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
        <br>
        <div class="container" >
        <label for="exampleFormControlTextarea1" style="color:red;">Histórico do amigo(a): {{$banco->nome_aluno}} / Matrícula: {{$banco->contrato}}</label>
      <textarea class="form-control" rows="15">{{$banco->historico}}</textarea>
        </div>
      </div>
      <div class="modal-footer" style="background-color:#D8D8D8;">
     <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
     </div>
    </div>
  </div>
</div>



<div class="modal fade" id="ciclo{{$banco->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <img border="0" title="Ciclo de encaminhamento" src="\Img\ciclo.jpg" width="22" height="25"> &nbsp &nbsp 
        <h5 class="modal-title" id="exampleModalLabel">Ciclo de encaminhamento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
  
<form method="post" name="formEn" id="formEn" action="">
            @csrf

     <div class="form-group">
        <label for="formGroupExampleInput">Nome do amigo</label>
        <input type="text" style="color:red;" value="{{$banco->nome_aluno}} - (Mat {{$banco->contrato}}) " class="form-control">
     </div>

     <div class="form-group">
        <label for="formGroupExampleInput">Status anterior</label>
        <input type="text" style="color:red;" value="{{$banco->status}}" class="form-control">
     </div>

     <div class="form-group">
        <label for="formGroupExampleInput">Departamento anterior</label>
        <input type="text" style="color:red;" value="{{$banco->turma}}" class="form-control">
     </div>

    <div class="form-group">

    <label for="exampleFormControlSelect1">Encaminhar para o departamento</label>
          @if(isset($turmas))
      <select class="form-control" name="dep_enc" form="formEn" onchange="colhe_dep(this.value)">
            @foreach($turmas as $tur)
      <option style="font-size: 15px;" value="{{$tur->turma}}">{{$tur->turma}}</option>
            @endforeach
      </select>
          @endif
    </div>

<input type="hidden" name="departamento" id="departamento">
<input type="hidden" name="status" id="status" >
<input type="hidden" name="obss" id="obss" >


 <div class="form-group">
    <label for="exampleFormControlSelect1">Novo status do amigo</label>
          @if(isset($status))
        <select class="form-control" form="formEn" name="novo_status" onchange="colhe_status(this.value)">
            @foreach($status as $stu)
        <option style="font-size: 15px;" value="{{$stu->status}}">{{$stu->status}}</option>
            @endforeach
        </select>
            @endif
 </div>


<div class="form-group">
     <label for="exampleFormControlTextarea1">Observações</label>
     <textarea class="form-control" form="formEn" id="obs" name="obs" rows="3" onblur="colhe_obs(this.value)">
       
     </textarea>
</div>

<input type="submit" form="formEn" class="btn btn-primary" value="Encaminhar" onclick="encaminhar('{{$banco->id}}')"> 
      
      </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>



<div class="modal fade" id="email{{$banco->id}}" tabindex="-1" role="dialog" aria-labelledby="Enviar email" aria-hidden="true">
  <div class="modal-dialog modal-lg"  role="document">
    <div class="modal-content">
      <div class="modal-header">
        <img border="0" title="Enviar email" src=".\Img\email.jpg" width="22" height="25"> &nbsp &nbsp 
        <h5 class="modal-title" id="email{{$banco->id}}">Enviar email para o Amigo: {{$banco->nome_aluno}}</h5>
              
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >

<form method="post" name="formEmail" action="{{route('enviar_email',[$banco->id])}} " enctype="multipart/form-data">
@csrf

          <div >
                <label><font color="#045FB4">Mensagem</font></label>

                <div>  
                <textarea name="mensagem" id="mensagem" class="form-control"  rows="5" style="margin-left:0%"></textarea>
                </div> 
          </div>

              <br>

     <div class="form-group">
        <label for="formGroupExampleInput">Assunto:</label>
        <input type="text" name="assunto" id="assunto" value="" class="form-control">
     </div>
              <br>

          <div>
              <label><font color="#DF0101"><b>Anexar Documento</b></font></label>
              <input type="file" title="Anexar documento" name="documento" id="documento" class="form-control-file">
          </div>
              <br>

<input type="submit" form="formEmail" class="btn btn-primary" value="Enviar" onclick="enviar_email('{{$banco->email}}')" >

</form>

          
      </div>
      <div class="modal-footer" style="background-color:#D8D8D8;">
     <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
     </div>
    </div>
  </div>
</div>



@endforeach
</table>

<br>
{!! $bancos->links() !!}
</div>



<script type="text/javascript">
  
function enviar_email($ide){

msn = document.getElementById('mensagem').value;
doc = 'C:\\laragon\\www\\PLATAFORMA\\public\\img\\' + document.getElementById("documento").files[0].name; 
assunto = document.getElementById('assunto').value;

var mendoc = [msn, doc, assunto];

$.ajax({
 headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
url: '/enviar_email/' + $ide,
type: "post",
data: JSON.stringify(mendoc),
dataType: 'json',

success: function(response) {

        alert(response.message);
        //window.location.reload();
}
});

};
</script>


<script type="text/javascript">
  function colhe_dep($id){

document.getElementById('departamento').value = $id; 
text = document.getElementById('departamento').value;

  }

</script>

<script type="text/javascript">
  function colhe_status($id){

document.getElementById('status').value = $id; 
text = document.getElementById('status').value;

  }

</script>


<script type="text/javascript">
  function colhe_obs($id){

document.getElementById('obss').value = $id; 
text = document.getElementById('obss').value;

  }

</script>

<script type="text/javascript">
function encaminhar($id){

$('form[name="formEn"]').submit(function(event){
event.preventDefault();

dep = document.getElementById('departamento').value;
status = document.getElementById('status').value;
obs = document.getElementById('obss').value;

var data = [dep, status,obs];

$.ajax({
 headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
url: '/alunos_encaminhar/' + $id,
type: "post",
data: JSON.stringify(data),
dataType: 'json',

success: function(response) {

alert(response.message);
        window.location.reload();
}
});
});
};
</script>



<script type="text/javascript">

function todos()
 {

var conteudo = document.getElementById("chama_").value;

if(conteudo == "")
conteudo = 0;

location.href = "{{route('pesquisa_todos','_conteudo_')}}".replace('_conteudo_',conteudo);

}
</script>

<script>
function p_turma()
{

var conteudo = document.getElementById("turma").value;

if(conteudo != "")
{
location.href = "{{route('pesquisa_turma','_conteudo_')}}".replace('_conteudo_',conteudo);
}

}
</script>

<script>
function perfil()
{

var conteudo = document.getElementById("def_per").value;

if(conteudo != "")
{
location.href = "{{route('pesquisa_per','_conteudo_')}}".replace('_conteudo_',conteudo);
}

}
</script>


<script type="text/javascript">
function pescar($id) 
{

  $.get('/consulta/' + $id, function (cidades) {
  
    $('select[name=cidade]').empty();
    $.each(cidades, function (key, value) {
    
 $('select[name=cidade]').append('<option value=' + value.estado + '>' + value.estado + '</option>');   
                });
            });

} 

</script>

<script>
function p_nasce()
{

var conteudo = document.getElementById("nasce").value;

if(conteudo != "")
{
location.href = "{{route('pesquisa_nasce','_conteudo_')}}".replace('_conteudo_',conteudo);
}

}
</script>

<script>
function p_cad()
{

var conteudo = document.getElementById("cad").value;

if(conteudo != "")
{
location.href = "{{route('pesquisa_cad','_conteudo_')}}".replace('_conteudo_',conteudo);
}

}
</script>

<script>
function p_status()
{

var conteudo = document.getElementById("tatu").value;

if(conteudo != "")
{
location.href = "{{route('pesquisa_status','_conteudo_')}}".replace('_conteudo_',conteudo);
}

}
</script>


<script>
function p_bairro()
{

var conteudo = document.getElementById("bai").value;

if(conteudo != "")
{
location.href = "{{route('pesquisa_bairro','_conteudo_')}}".replace('_conteudo_',conteudo);
}

}
</script>


@endsection


