@extends ('site.layouts.master')

@section ('conteudo')
<div class="w3-row-padding w3-padding-64 w3-container block-begin eventos">
  <div class="w3-content">
    <h1>Notícias / Eventos</h1>
    <hr>
    @foreach ($noticias as $noticia)
    <div class="w3-panel w3-card">
      <div class="noticia-img" style="width: 40%; float: left;">
        <img src="{{ $noticia->imagem }}" alt="Imagem teste">
      </div>
      <div class="noticia-text" style="width: 50%; float: right;">
        <h2>{{ $noticia->titulo }}</h2>
        <p>{{ substr($noticia->conteudo, 0, 200)."..." }}</p>

        <button class="w3-button w3-teal" style="background-color: #BFBDC1">Veja mais</button>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script>
  $(document).ready(function(){
    $( "#home, #contato" ).removeClass( "w3-white" );
    $( "#eventos" ).addClass( "w3-white" );

    var navHeight = $('.nav-home').height();
    $('html, body').animate({
      scrollTop: $(".block-begin").offset().top - navHeight
            }, 800); // Tempo em ms que a animação irá durar
  });
</script>