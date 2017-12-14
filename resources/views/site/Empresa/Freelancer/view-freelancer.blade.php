<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="UTF-8">
  <title>SysGAP - Visualização de Perfil</title>
  <meta name="viewport" content="width=device-width, user-scalable=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  {{-- Icones Google --}}
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  {{-- Bower_components --}}
  <link href="/bower_resources/bootstrap-fileinput/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
  {{-- Css Home --}}
  <link rel="stylesheet" href="/site-assets/css/perfil.css">
  {{-- Css Geral --}}
  <link rel="stylesheet" href="/site-assets/css/style.css" />
  {{-- Css W3C --}}
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
  html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif;}
</style>
</head>
<body class="w3-theme-l5">
  @include ('site.layouts.perfil.nav-perfil')
  <!-- Page Container -->
  <div id="" class="w3-container w3-content" style="max-width:1400px;margin-top:80px">
    <!-- The Grid -->
    <div class="w3-row">
      <!-- Left Column -->
      <div class="w3-col m3">
        <!-- Profile -->
        <div class="w3-card-2 w3-round w3-white">
          <div class="w3-container">
           <h4 class="w3-center"><a href="{{ route('view.perfil-freelancer', $freelancer->id) }}">Perfil Freelancer</a></h4>
           <p class="w3-center"><img src="{{ asset('storage') . '/freelancers/perfil/' . $freelancer->foto_perfil }}" class="w3-circle" style="height:130px;width:130px" alt="Imagem da freelancer"></p>
           <hr>
           <div style="text-align: center;">
             <p title="Nome de usuário">{{ $freelancer->nome }}</p>
             <p title="E-mail">{{ $freelancer->email }}</p>
             <p title="Data de cadastro">{{ $freelancer->created_at->format('d/m/Y') }}</p>
           </div>
           <div class="w3-row">
            <center>
              <button class="w3-button w3-block w3-green w3-section" title="Accept">Enviar E-mail</button>
            </center>
          </div>
        </div>
      </div>
      <br>

      <!-- Accordion -->
      <div class="w3-card-2 w3-round">
        <div class="w3-white groups">
          <button onclick="myFunction('Demo2')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-calendar-check-o fa-fw w3-margin-right"></i> Avaliações</button>
          <div id="Demo2" class="w3-hide w3-container">
            <hr>
            <p><a href="">Avaliações recebidas</a></p>
            <p><a href="">Avaliações feitas</a></p>
          </div>
          <button onclick="myFunction('Demo3')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-circle-o-notch fa-fw w3-margin-right"></i> Portfólio</button>
          <div id="Demo3" class="w3-hide w3-container">
           <div class="w3-row-padding">
            <hr>
            @if(auth()->guard('empresa')->check())
            <p><a href="/empresa/pesquisa/perfil-freelancer/portifolios/{{ $freelancer->id }}">Ver portfólio</a></p>
            @else
            <p><a href="/freelancer/pesquisa/perfil-freelancer/portifolios/{{ $freelancer->id }}">Ver portfólio</a></p>
            @endif
          </div>
        </div>
      </div>
    </div>
    <br>

    <!-- Interests -->
    <div class="w3-card-2 w3-round w3-white w3-hide-small">
      <div class="w3-container">
        @if(auth()->guard('empresa')->check())
        <p>Conhecimentos <span class="opt-tec">[<a href="/empresa/pesquisa/perfil-freelancer/conhecimentos/{{ $freelancer->id }}">Ver detalhes</a>]</span></p>
        @else
        <p>Conhecimentos <span class="opt-tec">[<a href="/freelancer/pesquisa/perfil-freelancer/conhecimentos/{{ $freelancer->id }}">Ver detalhes</a>]</span></p>
        @endif
        <p>
          <p>
            @foreach ($freelancer->conhecimentos as $conhecimento)
            <span class="w3-tag w3-small w3-theme-l{{ rand(1, 5) }}">{{ $conhecimento->titulo }}</span>
            @endforeach
          </p>
        </p>
      </div>
    </div>
    <br>
    <!-- End Left Column -->
  </div>
  <!-- Middle Column -->
  <div class="w3-col m7">
    <div class="w3-row-padding">
      <div class="w3-col m12">
        @if(count($noticias) > 0)
        @foreach($noticias as $noticia)
        <div class="w3-container w3-card-2 w3-white w3-round" style="margin-left: 16px; margin-right: 16px;"><br>
          <span class="w3-right w3-opacity">{{ $noticia->created_at->diffForHumans() }} {{-- 1 min --}}</span>
          <h4>{{ $noticia->titulo }}</h4><br>
          <hr class="w3-clear">
          <p>{{ $noticia->conteudo }}</p>
          <div class="w3-row-padding" style="margin:0 -16px">
            <div class="w3-half">
              <img src="{{ asset('storage')  . '/freelancers/posts/' . $freelancer->id . '/' . $noticia->imagem  }}" style="width:100%" alt="Imagem do Post" class="w3-margin-bottom">
            </div>
          </div>
        </div>
        @endforeach
        @else
        <div class="w3-container w3-card-2 w3-white w3-round" style="margin-left: 16px; margin-right: 16px;">
          <h4>Nenhum post feito por este usuário!</h4>
        </div>
        @endif

        <!-- End Middle Column -->
      </div>
    </div>
  </div>
  <!-- Right Column -->
  @include ('site.layouts.perfil.aside-right')
  <br>
  <!-- End Right Column -->
</div>
<!-- End Grid -->
</div>
<!-- End Page Container -->
</div>
<br>
<!-- Snackbar cadastro de Job -->
{{-- <div class="snackbar">Job cadastrado com sucesso.</div> --}}
@include ('site.layouts.perfil.footer')
@include ('site.layouts.perfil.scripts')