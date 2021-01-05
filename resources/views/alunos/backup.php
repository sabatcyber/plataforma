
<script type="text/javascript">

function encaminhar($id){

$('form[name="formEn"]').submit(function(event){
event.preventDefault();

dep = document.getElementById('departamento').value;
status = document.getElementById('status').value;
obs = document.getElementById('obs').value;


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

    
}

});

});

};

</script>



<?


public function alunos_encaminhar(Request $request, $id)
{

 $data = json_decode($request->getContent());

$alunos = alunos::findOrFail($request->id);
$alunos->turma = $data[0];
$alunos->status = $data[1];
$alunos->obs = $data[2];
$alunos->historico = $alunos->historico.$data[2];

//$alunos->historico = $alunos->historico."\r\n"."Utilizador:".$nome_r."\r\n"." Email:".$ema."\r\n"." Data/Horário:".\Carbon\Carbon::parse(NOW())->format('d/m/Y H:i:s')."\r\n"."Departamento:".$request->dep_enc."\r\n"."Status:".$request->novo_status."\r\n"."Observações:".$request->obs."\r\n"."IP:".$ip;

$alunos->update();


$retorno["message"] = "Verificar dados salvos";
 return response()->json($retorno);

//return redirect()->back()->with('alunos.listar');
//return ;

}


}


<script type="text/javascript">
  function colhe_dep($id){

document.getElementById('departamento').value = $id; 
text = document.getElementById('departamento').value;

  }

</script>



<input type="hidden" name="departamento" id="departamento">
<input type="hidden" name="status" id="status" >

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



<input type="submit" form="formEn" class="btn btn-primary" onclick="encaminhar('{{$banco->id}}')">Encaminhar 


<form method="get" name="formEn" id="formEn" action="">

