@extends('layout')

@section('cabecalho')
      adicionar serie 
@endsection

@section('conteudo')
 
    <form method="post">
        @csrf
        <div class="form-group">
            <label for="nome">name</label>
            <input type="text" class="form-control" name="nome" id="nome">
        </div>

        <button class="btn btn-primary ">adicionar</button>

    </form>
    @endsection    