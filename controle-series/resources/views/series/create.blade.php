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
        <div class="row">
    <div class="form-group">
         <div class="col col-8">
             <label for="nome">nome</label>
             <input type="text" class="form-control" name="nome" id="nome">
         </div>

         <div class="col col-2">
            <label for="qtd_temporadas">numero de temporadas</label>
            <input type="number" class="form-control" name="qtd_temporadas" id="qtd_temporadas">
        </div>
        
        <div class="col col-2">
            <label for="ep_por_temporadas">ep. por temporadas</label>
            <input type="number" class="form-control" name="ep_por_temporada" id="qtd_temporadas">
        </div>

    </div>

        <button class="btn btn-primary ">adicionar</button>

    </form>
    @endsection    