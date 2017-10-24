@extends ('site.layouts.perfil.master-perfil')

@section ('conteudo')
<!-- Middle Column -->
<div class="w3-col m7">

  <div class="w3-row-padding">
    <div class="w3-col m12">
      @if(session()->has('message'))
      <div class="alert alert-{{ session()->get('message')['response'] }} alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session()->get('message')['message'] }}
      </div>
      @endif
      <div class="w3-card-2 w3-round w3-white">
        <div class="w3-container w3-padding">          
          <h3 class="w3-opacity">{{ $projeto->titulo }} <span class="opt-projeto">[<a href="/empresa/projeto/editar/{{ $projeto->id }}">Editar projeto</a>]</span></h3>
          <p class="w3-opacity">Descrição: {{ $projeto->descricao }}</p>
          <p class="w3-opacity">Data de criação: {{ $projeto->created_at->format('d/m/Y') }}</p>          
          <hr>
          <h4 class="w3-opacity">Gerenciar Equipe <span class="opt-projeto">[<a href="">Adicionar membro</a>]</span></h4>
          <table class="w3-table w3-centered w3-bordered table-projetos">
            <tr>
              <th>Nome</th>
              <th>E-mail</th>
              <th>Ações</th>
            </tr>
            @foreach ($freelancers as $freelancer)            
            <tr>
              <td>{{ $freelancer->nome }}</td>
              <td>{{ $freelancer->email }}</td>
              <td><a href="" class="w3-button w3-blue w3-small" title="Visualizar e editar o projeto">Enviar E-mail</a>
                <button class="w3-button w3-red w3-small" title="Finalizar o projeto">Remover</button></td>
              </tr>
              @endforeach
            </table>
          <hr>
          <h4 class="w3-opacity">Jobs do Projeto <span class="opt-projeto">[<a href="/empresa/job/novo/{{ $projeto->id }}">Criar job</a>]</span></h4>
          <table class="w3-table w3-centered w3-bordered table-projetos">
            <tr>
              <th>Título</th>
              <th>Ações</th>
            </tr>
            @foreach ($jobs as $job)
            <tr>
              <td>{{ $job->titulo }}</td>              
              <td><a href="/empresa/projeto/{{ $job->id }}" class="w3-button w3-blue w3-small" title="Visualizar e editar o projeto">Visualizar</a>
                <button class="w3-button w3-red w3-small" title="Finalizar o projeto">Finalizar</button></td>
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