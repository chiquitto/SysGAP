@extends ('site.layouts.home.master')

@section ('conteudo')
<div class="w3-row-padding w3-padding-64 w3-container registro">
  <div class="w3-content">
    <div class="w3-container">
      <a href="{{ route('freelancer.login') }}">Voltar para o login</a>
      <h2>Registro Freelancer</h2>
      @if(session()->has('message'))
      <div class="alert alert-{{ session()->get('message')['response'] }} alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session()->get('message')['message'] }}
      </div>
      @endif
      @if ($errors->any())
      <div class="alert alert-danger alert-dismissable">
        @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
        @endforeach
      </div>
      @endif
      <hr>
      <form method="POST" action="{{ route('freelancer.novo') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="nome">Nome:</label>
              <input type="text" class="w3-input" id="nome" placeholder="Nome" name="nome" autofocus required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="text" class="w3-input" id="email" placeholder="E-mail" name="email" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="senha">Senha:</label>
              <input type="password" class="w3-input" id="senha" placeholder="Senha" name="senha" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="confirmaSenha">Confirmação de senha:</label>
              <input type="password" class="w3-input" id="confirmaSenha" placeholder="Senha" name="confirmaSenha" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="cpf">CPF:</label>
              <input type="text" class="w3-input cpf" placeholder="CPF" name="cpf" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="categoria">Foto de perfil:</label>
              <input id="input-1a" type="file" class="file" data-show-preview="false" name="profile_photo" required>
            </div>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-md-5">
            <div class="form-group">
              <label for="cep">CEP</label>
              <input type="text" class="w3-input cep" placeholder="CEP" name="cep" required>
              <span class="msg-cep"></span>
            </div>
          </div>
          <div class="col-md-7"></div>
        </div>
        <div class="row">
          <div class="col-md-5">
            <div class="form-group">
              <label for="logradouro">Logradouro</label>
              <input type="text" class="w3-input logradouro" placeholder="Logradouro" name="logradouro" readonly="true" required>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="logradouro">Número</label>
              <input type="number" class="w3-input numero" placeholder="Número" name="numero" min="1" required>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="complemento">Complemento</label>
              <input type="text" class="w3-input complemento" placeholder="Complemento" name="complemento">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-5">
            <div class="form-group">
              <label for="bairro">Bairro</label>
              <input type="text" class="w3-input bairro" placeholder="Bairro" name="bairro" readonly="true" required>
            </div>
          </div>
          <div class="col-md-5">
            <div class="form-group">
              <label for="cidade">Cidade</label>
              <input type="text" class="w3-input cidade" placeholder="Cidade" name="cidade" readonly="true" required>
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
              <label for="uf">UF</label>
              <input type="text" class="w3-input uf" placeholder="UF" name="uf" readonly="true" required>
            </div>
          </div>
        </div>
        <hr>
        <button type="submit" class="btn btn-default btn-default-home">Registrar</button>
      </form>
    </div>
  </div>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script>
  $(document).ready(function(){
    $( "#home, .ajuste" ).removeClass( "w3-white" );
    $( ".ajuste" ).addClass( "w3-white" );
  });
</script>