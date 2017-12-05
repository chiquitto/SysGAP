@extends ('admin.layouts.master')

@section ('cadastros')
<li class="active treeview">
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
    <li><a href="{{ route('itens.view') }}"><i class="fa fa-circle-o"></i> Itens </a></li>
    <li><a href="{{ route('pontuacoes.view') }}" style="color: #dd4b39"><i class="fa fa-circle-o"></i> Pontuações </a>
    </ul>
  </li>
  @endsection

  @section ('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Edição do item de pontuação</h1>
      <hr>
      <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i> Home </a></li>
        <li><a href="/admin/pontuacoes-view"></i> Pontuacoes </a></li>
        <li class="active"> Editar </li>
      </ol>

      <div class="row">
        <div class="col-md-8 col-md-offset-1">
          <form class="form-horizontal" role="form" method="POST" action="{{ route('pontuacao.editar') }}">
            {{ csrf_field() }}
            <input type="hidden" name="idPontuacao" value="{{ $pontuacao->id }}">
            <div class="form-group{{ $errors->has('descricao') ? ' has-error' : '' }}">
              <label for="descricao" class="col-sm-2 control-label">Descrição</label>
              <div class="col-sm-10">
                <input id="descricao" type="text" class="form-control" name="descricao" placeholder="Digite a descrição" value="{{ $pontuacao->descricao }}" required autofocus="">
              </div>
            </div>
            <div class="form-group{{ $errors->has('valor') ? ' has-error' : '' }}">
              <label for="valor" class="col-sm-2 control-label">Valor</label>
              <div class="col-sm-10">
                <input id="valor" type="number" class="form-control" name="valor" min="10" placeholder="Digite o valor" value="{{ $pontuacao->valor }}" required autofocus="">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
               <button type="submit" class="btn btn-primary"> Editar </button>
             </div>
           </div>
         </form>
       </div>
     </div>
   </section>
 </div>
 @endsection