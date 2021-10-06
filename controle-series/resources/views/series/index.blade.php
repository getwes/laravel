@extends('layout')

@section('cabecalho')
series
@endsection

@section('conteudo')
@if(!empty("$mensagem"))
<div class="alert alert-success">
 {{$mensagem}}
</div>
@endif
    <a href="{{route('form_criar_serie')}}" class="btn btn-dark mb-2">adicionar</a>

             <ul class="list-group">
                 @foreach($series as $serie)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span id="nome-serie-{{ $serie->id }}">{{ $serie->nome }}</span>

                    <div class="input-group w-50" hidden id="input-nome-serie-{{ $serie->id }}">
                        <input type="text" class="form-control" value="{{ $serie->nome }}">
                        <div class="input-group-append">
                            <button class="btn btn-primary" onclick="editarSerie({{ $serie->id }})">
                                <i class="fas fa-check"></i>
                            </button>
                            @csrf
                        </div>
                    </div>
                    <span class="d-flex">
                        <button class="btn btn-info btn-sm mr-1" onclick="toggleInput({{ $serie->id }})">
                            <i class="fas fa-edit"></i>
                        </button>
                        <a href="/series/{{ $serie->id }}/temporadas" class="btn btn-info btn-sm mr-1">
                            <i class="fas fa-external-link-alt"></i>
                        </a>
                    <form method="post" action="/series/{{ $serie->id}}"
                         onsubmit="return confirm('Tem certeza que deseja remover {{ addslashes( $serie->nome )}}?')">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger btn-sm">
                            <i class="far fa-trash-alt"></i></button>
                    </form>
                </li>
                 @endforeach
             </ul>

             <script>
              function toggleInput(serieId) {
    const nomeSerieEl = document.getElementById(`nome-serie-${serieId}`);
    const inputSerieEl = document.getElementById(`input-nome-serie-${serieId}`);
    if (nomeSerieEl.hasAttribute('hidden')) {
        nomeSerieEl.removeAttribute('hidden');
        inputSerieEl.hidden = true;
    } else {
        inputSerieEl.removeAttribute('hidden');
        nomeSerieEl.hidden = true;
    }
}
     function editarSerie(serieId) {
         let formData = new formData();
       const nome = document
        .querySelector(`#input-nome-serie-${serieId} > input`)
        .value;
        const token = document.querySelector('input[name="_token"]').value;
        formData.append('nome', nome);
        formData.append('_token', token);
    //alert(nome);
    //enviar para uma rota
       const url = `/series/${serieId}/editanome`;
    //fazer uma requisição para url
       fetch(url, {
           body: formData,
           method: 'POST'
       }).then(() => {
        toggleInput(serieId);
        document.getElementById(`nome-serie-${serieId}`).textContent = nome;
    });
}
         </script> 
@endsection             
 