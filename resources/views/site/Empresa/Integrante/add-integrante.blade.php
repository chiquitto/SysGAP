@extends ('site.layouts.perfil.master-perfil')

@section ('conteudo')
<!-- Middle Column -->
<div class="w3-col m7">

  <div class="w3-row-padding">
    <div class="w3-col m12">
      <div class="w3-card-2 w3-round w3-white">
        <div class="w3-container w3-padding form-news">
          <h3 class="w3-opacity">Adicionar integrante ao projeto</h3>
          <hr>
          <form method="POST" action="/empresa/projeto/{{ $projeto->id }}/integrante/pesquisar">
            {{ csrf_field() }}
            <h4 class="w3-opacity">Pesquisar por usuários</h4>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="categoria">Categoria:</label>
                  <select class="w3-select" id="categoria" name="categoria" required>
                    <option value="0">Freelancers</option>
                    <option value="1">Produtoras</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="nome">Nome:</label>
                  <input type="text" class="w3-input" id="nome" placeholder="Digite o nome" name="nome">
                </div>
              </div>
            </div>
            <hr>
            <input type="submit" value="Pesquisar">
          </form>
          <h4 class="w3-opacity" style="margin-top: 40px;">Listagem de freelancers</h4>
          <table class="w3-table w3-centered w3-bordered table-projetos">
            <tr>
              <th>Nome</th>
              <th>E-mail</th>
              <th>Ações</th>
            </tr>
            @foreach ($results as $result)
            <tr>
              <td><a href="" title="Ver perfil">{{ $result->nome }}</a></td>
              <td>{{ $result->email }}</td>
              <td>
                <a href="/empresa/projeto/{{ $projeto->id }}/integrante/addFreelancer/{{ $result->id }}" class="w3-button w3-blue w3-small" title="Adicionar integrante">Convidar</a></td>
              </tr>
              @endforeach
            </table>
            @if(count($results) == 0)
            <div style="text-align: center; margin-top: 10px;">
              Nenhum freelancer encontrado.
            </div>
            @endif
          </div>
        </div>
      </div>
    </div>


    <!-- End Middle Column -->
  </div>
  @endsection