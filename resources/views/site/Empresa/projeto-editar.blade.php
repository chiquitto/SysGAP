@extends ('site.layouts.perfil.master-perfil')

@section ('conteudo')
<!-- Middle Column -->
<div class="w3-col m7">

  <div class="w3-row-padding">
    <div class="w3-col m12">
      <div class="w3-card-2 w3-round w3-white">
        <div class="w3-container w3-padding form-news">
          <h3 class="w3-opacity">Editar Projeto</h3>
          <hr>
          <form method="POST" action="{{ route('projeto.editar') }}">
            {{ csrf_field() }}
            <input type="hidden" value="{{ $projeto->id }}" name="idProjeto">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="titulo">Título do projeto:</label>
                  <input type="text" class="w3-input" id="titulo" value="{{ $projeto->titulo }}" placeholder="Digite o título" name="titulo">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="descricao">Descrição do projeto:</label>
                  <textarea class="w3-input w3-border" name="descricao" id="" cols="20" rows="10" placeholder="Digite a descrição">{{ $projeto->descricao }}</textarea>
                </div>
              </div>
            </div>
            <hr>
            <input type="submit" value="Editar">

          </form>
        </div>
      </div>
    </div>
  </div>


  <!-- End Middle Column -->
</div>
@endsection