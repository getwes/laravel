@extends('layout')

@section('cabecalho')
series
@endsection

@section('conteudo')
    <a href="/series/criar" class="btn btn-dark mb-2">adicionar</a>

             <ul class="list-group">
                 @foreach($series as $serie)
                <li class="list-group-item"><?= $serie; ?></li>
                 @endforeach
             </ul>
@endsection             
 