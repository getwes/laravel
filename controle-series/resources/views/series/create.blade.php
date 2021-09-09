@extends('layout')

@section('cabecalho')
    Adicionar Série
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
        <div class="col col-8">
            <label for="nome" class="">Nome</label>
            <input type="text" class="form-control" name="nome" id="nome">
        </div>

        <div class="col col-2">
            <label for="qtd_Temporadas" class="">N° temporadas</label>
            <input type="number" class="form-control" name="qtd_Temporadas" id="qtd_Temporadas">
        </div>

        <div class="col col-2">
            <label for="ep_por_temporada" class="">Ep. por temporada</label>
            <input type="number" class="form-control" name="ep_por_temporada" id="ep_por_temporada">
        </div>

    </div>
    <button class="btn btn-primary mt-2">Adicionar</button>
</form>
@endsection