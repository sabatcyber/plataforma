@extends('layouts.app')

@section('responsaveis')

<div>
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link" href="{{ route('cad_alunos') }}">Alunos</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="#">Responsaveis</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Turmas</a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled" href="#">Desativado</a>
  </li>
</ul>
</div>

<br>
  
  

@endsection