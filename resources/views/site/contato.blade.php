@extends ('site.layouts.home.master')

@section ('conteudo')
<div class="w3-row-padding w3-padding-64 w3-container contato">
  <div class="w3-content">
    <div class="w3-container">
      <h2>Formulário de Contato</h2>
      <hr>
      @if(session()->has('message'))
      <div class="alert alert-{{ session()->get('message')['response'] }} alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session()->get('message')['message'] }}
      </div>
      @endif
    </div>

    <form class="w3-container" method="POST" action="{{ route('contato.msg.enviar') }}">
      {{ csrf_field() }}
      <p><label>Nome</label><br/>
        @if (auth()->guard('empresa')->check())
        <input class="w3-input w3-animate-input input-contato-nome" value="{{ auth()->guard('empresa')->user()->nome }}" type="text" style="width:50%" placeholder="Nome" name="nome" required></p>
        <p><label>E-mail</label><br/>
          <input class="w3-input w3-border w3-animate-input input-contato-email" value="{{ auth()->guard('empresa')->user()->email }}" type="email" style="width:50%" name="email" placeholder="E-mail" required readonly="true"></p>
          <p><label for="categoria">Motivo</label></p>
          <select class="w3-select" id="tipo" name="tipo" required>
            <option value="" disabled selected>Escolha o motivo</option>
            <option value="0">Dúvida</option>
            <option value="1">Elogio</option>
            <option value="2">Reclamação</option>
            <option value="3">Sugestão</option>
          </select><br><br>
          <p><label>Mensagem</label><br/>

            @elseif (auth()->guard('freelancer')->check())
            <input class="w3-input w3-animate-input input-contato-nome" value="{{ auth()->guard('freelancer')->user()->nome }}" type="text" style="width:50%" placeholder="Nome" name="nome" required></p>
            <p><label>E-mail</label><br/>
              <input class="w3-input w3-border w3-animate-input input-contato-email" value="{{ auth()->guard('freelancer')->user()->email }}" type="email" style="width:50%" name="email" placeholder="E-mail" required readonly="true"></p>
              <p><label for="categoria">Motivo</label></p>
              <select class="w3-select" id="tipo" name="tipo" required>
                <option value="" disabled selected>Escolha o motivo</option>
                <option value="0">Dúvida</option>
                <option value="1">Elogio</option>
                <option value="2">Reclamação</option>
                <option value="3">Sugestão</option>
              </select><br><br>
              <p><label>Mensagem</label><br/>
                @else

                <input class="w3-input w3-animate-input input-contato-nome" type="text" style="width:50%" placeholder="Nome" name="nome" required></p>
                <p><label>E-mail</label><br/>
                  <input class="w3-input w3-border w3-animate-input input-contato-email" type="email" name="email" style="width:50%" placeholder="E-mail" required></p>
                  <p><label for="categoria">Motivo</label></p>
                  <select class="w3-select" id="tipo" name="tipo" required>
                    <option value="" disabled selected>Escolha o motivo</option>
                    <option value="0">Dúvida</option>
                    <option value="1">Elogio</option>
                    <option value="2">Reclamação</option>
                    <option value="3">Sugestão</option>
                  </select><br><br>
                  <p><label>Mensagem</label><br/>
                    @endif

                    <textarea class="textarea-contato-msg" name="msg" cols="30" rows="10" style="width: 100%" placeholder="Digite sua mensagem aqui :)" required></textarea></p>
                    <hr>
                    <button type="submit" class="btn btn-default btn-default-home btn-msg-contato">Enviar</button>
                  </form>
                  {{-- @include ('site.layouts.footer') --}}
                </div>
              </div>
              @endsection

              <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
              <script>
                $(document).ready(function(){
                  $( "#home, #eventos" ).removeClass( "w3-white" );
                  $( "#contato" ).addClass( "w3-white" );
                });
              </script>