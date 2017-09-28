@extends ('site.layouts.perfil.master-perfil')

@section ('conteudo')
<!-- Middle Column -->
<div class="w3-col m7">

  <div class="w3-row-padding">
    <div class="w3-col m12">
      <div class="w3-card-2 w3-round w3-white">
        <div class="w3-container w3-padding">
          <h3 class="w3-opacity">Meus Projetos</h3>
          <table class="w3-table w3-bordered">
            <tr>
              <th>Título</th>
              <th>Descrição</th>
              <th>Data de criação</th>
              <th>Status</th>
            </tr>
            @foreach ($projetos as $projeto)
            <tr>
              <td>{{ $projeto->titulo }}</td>
              <td>{{ $projeto->descricao }}</td>
              <td>{{ $projeto->created_at->format('d/m/Y') }}</td>
              <td>{{ $projeto->status }}</td>
            </tr>
            @endforeach
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- End Middle Column -->
</div>
@endsection