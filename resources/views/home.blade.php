@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Plataform de Ensino</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h2>SEJA BEM-VINDO</h2>
          
                    <hr>
                    
                    <a href="default.asp"><img src="./img/turma.jpg" alt="HTML tutorial" style="width:58px;height:48px;"> Cadastro de Turma</a>

                    <br>
                    
                    <a href="{{ route('cad_alunos') }}"><img src="./img/cad_aluno.jpg" alt="HTML tutorial" style="width:60px;height:50px;">Cadastro de Alunos</a>
                    <br>    
                    


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
