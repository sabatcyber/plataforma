@extends('layouts.app')


@section('alunos')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

<div>
<ul class="nav nav-tabs">
  
  <li class="nav-item">
    <a class="nav-link active" href="{{ route('ponte') }}">Cadastrar Amigo</a>
  </li>


  <li class="nav-item">
    <a class="nav-link " href="{{ route('lista') }}">Banco de amigos</a>
  </li>
  
  <li class="nav-item">
    <a class="nav-link" href="{{ route('postar') }}">Localizar/Detalhes</a>
  </li>
  
</ul>
</div>

@if ($usuario->cadastrar != 'NAO')   

<span class='msg-erro'></span>

<div class="div_pai_alunos" id="formulario" >


  <form name="formLogin" method="POST" action="">
    @csrf

  <div class="form-group">
    <label for="formGroupExampleInput">Matrícula</label>
    <input type="text" name="contrato" id="contrato" class="form-control" readonly value="{{$matricula}}">
  </div>

 <div class="form-group">
    <label for="formGroupExampleInput">Nome do Amigo</label>
    <input type="text" name="nome_aluno" id="nome_aluno" class="form-control" id="formGroupExampleInput" required>
  </div>

   <div class="form-group">
    <label for="exampleFormControlSelect2">Sexo</label>
    <select  class="form-control" name="sexo" id="sexo">
      <option></option>
      <option value="Masculino">Masculino</option>
      <option value="Feminino">Feminino</option>
    </select>
  </div>

<div class="form-group">
    <label for="formGroupExampleInput">Data de nascimento</label>
    <input type="date" name="dt_nascimento" class="form-control" >
</div>

 <div class="form-group">
    <label for="formGroupExampleInput">Endereço</label>
    <input type="text" name="endereco" class="form-control" required>
  </div>


  <div class="form-group">
    <label for="exampleFormControlSelect1">Estados</label>

@if(isset($estados))
<select class="form-control" name="estado" id="estado" onchange="pesquisar()">

    <option ></option>

        @foreach($estados as $uf)

    <option style="font-size: 15px;" data-dado="{{$uf->id}}" value="{{$uf->estado}}">{{$uf->estado}}</option>
        @endforeach
    </select>
    @endif
 </div>

  <div class="form-group">
    <label for="exampleFormControlSelect2">Cidades</label>
    <select  class="form-control" name="cidade" id="cidade">
      
    </select>
  </div>

<div class="form-group">
    <label for="exampleFormControlSelect1">Bairro</label>

@if(isset($bairro))
<select class="form-control" name="bairro" id="bairro">
    <option></option>
     @foreach($bairro as $bai)
        <option style="font-size: 15px;" value="{{$bai->nome}}">{{$bai->nome}}</option>
     @endforeach
    </select>
    @endif
 </div>




<div class="form-group">
    <label for="formGroupExampleInput">Email</label>
    <input type="email" name="email" class="form-control" required >
  </div>

<div class="form-group">
<label for="txttelefone">Telefone</label>
<input type="tel" name="telefone" id="telefone" pattern="\([0-9]{2}\)[\s][0-9]{4}-[0-9]{4,5}" class="form-control" />
<script type="text/javascript">$("#telefone").mask("(00) 0000-00009");</script>
</div>

<div class="form-group">
    <label for="exampleFormControlSelect1">Departamento</label>

@if(isset($turmas))
<select class="form-control" name="turma" id="turma">

            @foreach($turmas as $tur)

    <option style="font-size: 15px;" value="{{$tur->turma}}">{{$tur->turma}}</option>
        @endforeach
    </select>
    @endif
 </div>

<div class="form-group">
    <label for="exampleFormControlSelect1">Status</label>

@if(isset($status))
<select class="form-control" name="status" id="status">

            @foreach($status as $st)

    <option style="font-size: 15px;" value="{{$tur->status}}">{{$st->status}}</option>
        @endforeach
    </select>
    @endif
 </div>


<div class="form-group">
    <label for="exampleFormControlSelect1">Perfil</label>

@if(isset($perfil))
<select class="form-control" name="perfil" id="perfil" onchange="abreModal(this.value)">
    <option></option>
     @foreach($perfil as $per)
        <option style="font-size: 15px;" value="{{$per->perfil}}">{{$per->perfil}}</option>
     @endforeach
    </select>
    @endif
 </div>

   <div class="form-group">
    <label for="exampleFormControlTextarea1">Observações</label>
    <textarea class="form-control" name="obs" id="exampleFormControlTextarea1" rows="3" style="color: red;"></textarea>
  </div>
 
        <input type="hidden" id="P_01_01" value="">
        <input type="hidden" id="P_02_01" value="">
        <input type="hidden" id="P_03_01" value="">
        <input type="hidden" id="P_04_01" value="">


         <button type="submit" class="btn btn-primary">Salvar</button>
         <button type="reset" class="btn btn-primary">LIMPAR</button >
 

      </form>
</div>



<!-- Modal -->
<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">NÃO ADVENTISTA (SOZINHO)</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    
      <form>
  
          <input type="text" name="desbravadores"> Desbravadores
          <input type="text" name="lider"> Lider
   
      </form>

</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">NÃO ADVENTISTA (ACOMPANHADO)</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    
    
<form>
  
<input type="text" name="estudo">Estudo
<input type="text" name="pg"> Pg

    
</form>

  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ADVENTISTA (VISITANTE)</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    
<form>
  
<input type="text" name="estudo">Estudo
<input type="text" name="pg"> Pg

    
</form>

  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ADVENTISTA (DA CASA)</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    
    
<form>
  
<input type="text" name="estudo">Estudo
<input type="text" name="pg"> Pg

    
</form>

  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>


<script>
function abreModal($id) {
  

if($id == "NÃO ADVENTISTA (SOZINHO)")
{
// colocar valor padrão para todas as gets

  $("#modal1").modal({
    show: true
    
  });
//transferir valor preenchido na modal para os inputs do formulário principal
//o INPUT perfil já vai estar preenchido informando qual foi o perfil do visitante

document.getElementById('P_01_01').value = document.getElementById('M_01_01').value;

}


if($id == "NÃO ADVENTISTA (ACOMPANHADO)")
{
  $("#modal2").modal({
    show: true
   
  });
document.getElementById('P_02_01').value = document.getElementById('M_02_01').value;

}

if($id == "ADVENTISTA (VISITANTE)")
{
  $("#modal3").modal({
    show: true
  
  });
document.getElementById('P_03_01').value = document.getElementById('M_03_01').value;

}

if($id == "ADVENTISTA (DA CASA)")
{
  $("#modal4").modal({
    show: true

  });
document.getElementById('P_04_01').value = document.getElementById('M_04_01').value;

}

}
</script>

<script type="text/javascript">

  function pesquisar() {
    var dado = $('#estado option:selected').attr('data-dado'); //pega os dados da select estado não do value mas sim do data-dado

  $.get('/cidades/' + dado, function (cidades) {
  
    $('select[name=cidade]').empty();
    $.each(cidades, function (key, value) {
    $('select[name=cidade]').append('<option value=' + value.cidade + '>' + value.cidade + '</option>');
                });
            });
  }

</script>



<script type="text/javascript">

$(function(){

$('form[name="formLogin"]').submit(function(event){
event.preventDefault();

$.ajax({
 headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
url: '/alunos',
type: "post",
data: $(this).serialize(),
dataType: 'json',

success: function(response) {

    alert(response.message);
    

}

});

});

});

</script>


 <script type="text/javascript">
    $("#telefone").mask("(00) 0000-0000");
    </script>
@endif
@endsection
