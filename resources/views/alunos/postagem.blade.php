@extends('layouts.app')

@section('postagem')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

<div>
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link " href="{{ route('ponte') }}">Cadastrar Amigo</a>
  </li>

   <li class="nav-item">
    <a class="nav-link " href="{{ route('lista') }}">Banco de amigos</a>
  </li>
    
  <li class="nav-item">
    <a class="nav-link active" href="{{ route('postar') }}">Localizar/Detalhes</a>
  </li>

</ul>
</div>
<br>

@if ($usuario->detalhes != 'NAO')   


<div style="padding: 20px">
	
<form class="form-group" method="POST" action="">
    @csrf 

<label for="txt">Nome do aluno</label>
<input type="text" class="form-control" value="" name="nome" id="nome" autofocus onkeyup="pesquisar(this.value)">

<div class="form-group">
    
    <select  class="form-control" name="retorno" id="retorno"  multiple="" onclick="pegar(this.value)" >
      
    </select>
    <br>
    
<input type="text" class="form-control" value="" name="teste" id="teste" readonly >
<input type="text" class="form-control" value="" name="contrato" id="contrato" readonly >

<input type="text" class="form-control" value="" name="quem" id="quem" readonly >
<input type="text" class="form-control" value="" name="sexo" id="sexo" readonly >
<input type="text" class="form-control" value="" name="dt_nascimento" id="dt_nascimento" readonly >
<input type="text" class="form-control" value="" name="endereco" id="endereco" readonly >
<input type="text" class="form-control" value="" name="estado" id="estado" readonly >
<input type="text" class="form-control" value="" name="cidade" id="cidade" readonly >
<input type="text" class="form-control" value="" name="bairro" id="bairro" readonly >

<input type="text" class="form-control" value="" name="email" id="email" readonly >
<input type="text" class="form-control" value="" name="telefone" id="telefone" readonly >
<input type="text" class="form-control" value="" name="turma" id="turma" readonly >
<input type="text" class="form-control" value="" name="status" id="status" readonly >

<textarea class="form-control" name="obs" id="obs" rows="5" style="color:#DF7401" readonly></textarea>
<textarea class="form-control" name="historico" id="historico" rows="15" style="color:#DF7401" readonly></textarea>

<hr>

  </div>
</form>

</div>


<script type="text/javascript">

  function pesquisar(nome) {
  

  $.get('/postagem/' + nome, function (alunos) {
  
    $('select[name=retorno]').empty();

    $.each(alunos, function (key, value) {
    $('select[name=retorno]').append('<option value=' + value.id + '>' + value.nome_aluno + '</option>');
	
                });
            });
  }

</script>


<script type="text/javascript">
	function pegar(id){

var qual = document.getElementById('teste').value = document.getElementById('retorno').value;


 $.get('/achei/' + qual, function (alunos) {
  
    $.each(alunos, function (key, value) {
    document.getElementById('contrato').value = 'Contrato: '+value.contrato;
    document.getElementById('quem').value = 'Nome: '+value.nome_aluno;
    document.getElementById('sexo').value = 'Sexo: '+ value.sexo;
    document.getElementById('dt_nascimento').value = 'Nascimento: '+ value.dt_nascimento;
    document.getElementById('endereco').value =  'Endereço: '+ value.endereco;
    document.getElementById('estado').value =  'Estado: '+ value.estado;
    document.getElementById('cidade').value =  'Cidade: '+ value.cidade;
    document.getElementById('bairro').value =  'Bairro: '+ value.bairro;
    document.getElementById('email').value =  'Email: '+ value.email;
    document.getElementById('telefone').value =  'Telefone: '+ value.telefone;
    document.getElementById('turma').value =  'Depart.atual: '+ value.turma;
    document.getElementById('status').value =  'Status.atual: '+ value.status;
    document.getElementById('obs').value =  'Observações: '+ value.obs;
    document.getElementById('historico').value =  'Histórico: '+ value.historico;

                });
            });

	}
	

</script>

@endif
@endsection