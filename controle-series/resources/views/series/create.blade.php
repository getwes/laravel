@extends('layout')

@section('cabecalho')
      adicionar serie 
@endsection

@section('conteudo')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
 
    <form method="post">
        @csrf
    <div class="form-group">
         <div class="col col-8">
             <label for="nome">name</label>
             <input type="text" class="form-control" name="nome" id="nome">
         </div>

         <div class="col col-8">
            <label for="qtd_temporadas">numero de temporadas</label>
            <input type="text" class="form-control" name="qtd_temporadas" id="nome">
        </div>

    </div>

        <button class="btn btn-primary ">adicionar</button>

    </form>
    @endsection    