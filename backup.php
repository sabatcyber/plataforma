<script type="text/javascript">
function encaminhar($id) 
{
//$('#ciclo{{$banco->id}}').modal('hide').destroy();


var dep = document.getElementById('dep_enc').value;

var status = document.getElementById("novo_status").value;
var obs = document.getElementById("obs").value;

//var genero = {'dep' : [dep],'status':[status]};

var genero = new Array($id, dep);

  $.get('/alunos_encaminhar/' + genero, function (enviar) {
  
    $.each(enviar, function (key, value) {
    
    alert(value)
$('#ciclo{{$banco->id}}').on('hidden.bs.modal', function (e) {
  $(this)
    .find("input,textarea,select")
       .val('')
       .end()
    .find("input[type=checkbox], input[type=radio]")
       .prop("checked", "")
       .end();
})
    
                });
            });
} 

</script>




