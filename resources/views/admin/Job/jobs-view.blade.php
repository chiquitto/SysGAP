@extends ('admin.layouts.master')

@section ('cadastros')
<li class="treeview">
  <a href="#">
    <i class="fa fa-dashboard"></i> <span>Cadastros</span>
    <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
    <li><a href="{{ route('admins.view') }}"><i class="fa fa-circle-o"></i> Administradores</a></li>
    <li><a href="{{ route('noticias.view') }}"><i class="fa fa-circle-o"></i> Notícias </a></li>
    <li><a href="{{ route('conhecimentos.view') }}"><i class="fa fa-circle-o"></i> Conhecimentos </a></li>
    <li><a href="{{ route('itens.view') }}"><i class="fa fa-circle-o"></i> Avaliações </a></li>
    <li><a href="{{ route('pontuacoes.view') }}" ><i class="fa fa-circle-o"></i> Pontuações </a>
  </ul>
</li>
@endsection

@section ('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Lista de Jobs
    </h1>
    <hr>
    <ol class="breadcrumb">
      <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
      <li>Registros</li>
      <li class="active">Jobs</li>
    </ol>

    <div class="row">
      <div class="col-lg-10 col-md-offset-1 pesquisa-admin-view">
        <form class="form-inline" role="form" method="POST" action="">
          {{ csrf_field() }}
          <input id="pesquisa" type="text" class="form-control" name="pesquisa" placeholder="Pesquisar por nome">
          <button type="submit" class="btn btn-primary"> Pesquisar </button>
        </form>
      </div>
    </div>

    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        @if(session()->has('message'))
        <div class="alert alert-{{ session()->get('message')['response'] }} alert-dismissable">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          {{ session()->get('message')['message'] }}
        </div>
        @endif
        <table class="table table-hover table-striped">
          <thead class="thead-inverse">
            <tr>
              <th>Titulo</th>
              <th>Nivel de conhecimento</th>
              <th>Status</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody class="admin-view">
            @foreach ($jobs as $job)
            <tr>
              <td>{{ $job->titulo }}</td>
              <td>{{ $job->nivel_conhecimento_necessario }}</td>
              <td>{{ $job->status }}</td>
              <td>
                <a href="{{-- {{ route('noticia.perfil') }} --}}" class="btn btn-success">
                Mais informações</a>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </section>
  </div>
  @endsection