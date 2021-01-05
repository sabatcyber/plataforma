@extends('layouts.app')

@section('ciclo')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>


<div style="padding: 20px">
  
<form class="form-group" id="formPer" name="formPer" method="POST" action="">
    @csrf 

<label for="txt">Registrados no site</label>

<input type="text" class="form-control" value="" id="regis" onkeyup="pesquisar(this.value)" autofocus>

<div class="form-group">
    
    <select  class="form-control" id="retorno" multiple onclick="pegar(this.value)" >
    </select>
    <br>
    
<input type="text" class="form-control" value="" id="quem" readonly >

<br>
<!-- Default checkbox -->
<div class="form-check">
  <input class="form-check-input" type="checkbox" name="master" id="master" onclick="todos()" />
  <label class="form-check-label" for="flexCheckDefault">
    Master
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="checkbox" name="cadastrar" id="cadastrar" />
  <label class="form-check-label" for="flexCheckDefault">
    Cadastrar amigo
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="checkbox" name="ciclo" id="ciclo"  />
  <label class="form-check-label" for="flexCheckDefault">
    Encaminhar amigo
  </label>
</div>


  <div class="form-check">
  <input class="form-check-input" type="checkbox" name="detalhes" id="detalhes" />
  <label class="form-check-label" for="flexCheckDefault">
    Detalhes do amigo
  </label>
</div>

  <div class="form-check">
  <input class="form-check-input" type="checkbox" name="editar" id="editar" />
  <label class="form-check-label" for="flexCheckDefault">
    Editar registro
  </label>
</div>

  <div class="form-check">
  <input class="form-check-input" type="checkbox" name="excluir" id="excluir" />
  <label class="form-check-label" for="flexCheckDefault">
    Excluir registro
  </label>
</div>

  <div class="form-check">
  <input class="form-check-input" type="checkbox" name="historico" id="historico" />
  <label class="form-check-label" for="flexCheckDefault">
    Visualizar histórico
  </label>
</div>

  <div class="form-check">
  <input class="form-check-input" type="checkbox" name="imprimir" id="imprimir" />
  <label class="form-check-label" for="flexCheckDefault">
    Imprimir relatórios
  </label>
</div>

  <div class="form-check">
  <input class="form-check-input" type="checkbox" name="env_email" id="env_email" />
  <label class="form-check-label" for="flexCheckDefault">
    Enviar email
  </label>
</div>


 <input type="hidden" id="identidade" value="" >
<br>
 <button type="submit" class="btn btn-primary" >Permitir</button>
 <button type="button" class="btn btn-sencundary" ><a href="{{ route('home') }}">Voltar</a></button>

</form>

</div>


<script type="text/javascript">

  function pesquisar(nome) {
  

  $.get('/registrados/' + nome, function (alunos) {
  
    $('select[id=retorno]').empty();

    $.each(alunos, function (key, value) {
    $('select[id=retorno]').append('<option value=' + value.id + '>' + value.name + '</option>');
    
    document.getElementById('identidade').value = value.id; 
                });
            });
  }

</script>


<script type="text/javascript">
  function pegar(id){


var qual = document.getElementById('retorno').value;

 $.get('/achei_user/' + qual, function (usuarios) {
  
    $.each(usuarios, function (key, value) {
    document.getElementById('quem').value = 'Email: '+value.email;
    
if(value.cadastrar == 'on')
   {
    document.getElementById("cadastrar").checked = true;
}
else
{
   document.getElementById("cadastrar").checked = false; 
}


if(value.ciclo == 'on')
    {

    document.getElementById("ciclo").checked = true;
    }
    else
    {
     document.getElementById("ciclo").checked = false; 
    }


if(value.detalhes == 'on')
    {
      document.getElementById("detalhes").checked = true;
    }
    else
    {
      document.getElementById("detalhes").checked = false;

    }


if(value.editar == 'on')
    {
      document.getElementById("editar").checked = true;
    }
    else
    {
      document.getElementById("editar").checked = false;

    }

if(value.env_email == 'on')
     { 
      document.getElementById("env_email").checked = true;
      }
      else
      {
      document.getElementById("env_email").checked = false;

      }

if(value.excluir == 'on')
     { 
      document.getElementById("excluir").checked = true;
      }
      else
      {
      document.getElementById("excluir").checked = false;

      }

if(value.historico == 'on')
     { 
      document.getElementById("historico").checked = true;
      }
      else
      {
      document.getElementById("historico").checked = false;

      }

if(value.imprimir == 'on')
     { 
      document.getElementById("imprimir").checked = true;
      }
      else
      {
      document.getElementById("imprimir").checked = false;

      }

if(value.master == 'on')
     { 
      document.getElementById("master").checked = true;
      }
      else
      {
      document.getElementById("master").checked = false;

      }
                });
            });

  }
  

</script>


<script type="text/javascript">

$(function(){

$('form[name="formPer"]').submit(function(event){
event.preventDefault();

var id = document.getElementById('identidade').value;

$.ajax({
 headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
url: "/permissoes/" + id,
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
  function todos()
  {

if(document.getElementById('master').checked == 1)
{

document.getElementById('cadastrar').checked = 1;
document.getElementById('ciclo').checked = 1;
document.getElementById('detalhes').checked = 1;
document.getElementById('editar').checked = 1;
document.getElementById('env_email').checked = 1;
document.getElementById('excluir').checked = 1;
document.getElementById('historico').checked = 1;
document.getElementById('imprimir').checked = 1;
}
else
{
document.getElementById('cadastrar').checked = 0;
document.getElementById('ciclo').checked = 0;
document.getElementById('detalhes').checked = 0;
document.getElementById('editar').checked = 0;
document.getElementById('env_email').checked = 0;
document.getElementById('excluir').checked = 0;
document.getElementById('historico').checked = 0;
document.getElementById('imprimir').checked = 0;

}

  }

</script>

@endsection
