<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/css/app.css">
  <link rel="stylesheet" href="/css/dash.css">
  <link rel="stylesheet" href="/css/proprietario.css">
  <link rel="stylesheet" href="/css/veiculo.css">
  <link rel="stylesheet" href="/css/revisao.css">
  <link rel="stylesheet" href="/css/cria_edita_mostra_veiculo.css">
  <link rel="stylesheet" href="/css/cria_edita_mostra_revisao.css">
  <link rel="stylesheet" href="/css/cria_edita_mostra_proprietario.css">

  <!-- Font awesome -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css" integrity="sha384-BY+fdrpOd3gfeRvTSMT+VUZmA728cfF9Z2G42xpaRkUGu2i3DyzpTURDo5A6CaLK" crossorigin="anonymous">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
  <title>@yield('title')</title>
  <!-- bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <!-- Bootstrap JavaScript (jQuery e Popper.js) -->
  <link rel="stylesheet" href="/js/app.js">
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>
<body class="corpo">
  <header>
    <div>
      <a class="dashboard" href="{{ route('principal.dashboard')}}">Dash</a>
    </div>
    {{-- menu responsivo --}}
    <div class="col-lg-3">
      <div class="dropdown d-lg-none">
        <button class="btn btn-secondary dropdown-toggle me-4" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          Menu
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <li><a class="dropdown-item" href="{{ route('veiculo.index')}}">Veículo</a></li>
          <li><a class="dropdown-item" href="{{ route('veiculo.create')}}">Cadastrar Veículo</a></li>
          <li><a class="dropdown-item" href="{{ route('proprietario.index')}}">Proprietário</a></li>
          <li><a class="dropdown-item" href="{{ route('proprietario.create')}}">Cadastrar Proprietário</a></li>
          <li><a class="dropdown-item" href="{{ route('revisao.create')}}">Cadastrar Revisões</a></li>
          <li><a class="dropdown-item" href="{{ route('revisao.marcasComMaisRevisoes')}}">Marcas e Revisões</a></li>
          <li><a class="dropdown-item" href="{{ route('revisao.index')}}">Revisões</a></li>
        </ul>    
      </div>
    </div>
    {{-- Menu no pc --}}
    <div class="dropdown d-none d-lg-block" >
      <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        Veículo
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <li><a class="dropdown-item" href="{{ route('veiculo.create')}}">Cadastrar Veículo</a></li>
        <li><a class="dropdown-item" href="{{ route('veiculo.index')}}">Mostrar</a></li>
      </ul>    
    </div>
    <div class="dropdown d-none d-lg-block" >
      <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        Proprietário
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <li><a class="dropdown-item" href="{{ route('proprietario.create')}}">Cadastrar</a></li>
        <li><a class="dropdown-item" href="{{ route('proprietario.index')}}">Mostrar</a></li>
      </ul>    
    </div>
    <div class="dropdown d-none d-lg-block" >
      <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        Revisões
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <li><a class="dropdown-item" href="{{ route('revisao.create')}}">Cadastrar</a></li>
        <li><a class="dropdown-item" href="{{ route('revisao.index')}}">Mostrar</a></li>
        <li><a class="dropdown-item" href="{{ route('revisao.marcasComMaisRevisoes')}}">Marcas e Revisões</a></li>
      </ul>    
    </div>
  </header>
  <main>
    @if (session('msg'))
    <div class="alert alert-danger">
      {{ session('msg') }}
    </div>
    @endif
    @if ($errors->any())
      <div class="alert alert-danger mt-4"> 
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif 
    @yield('content')
  </main>
  <footer>
    <p>&copy; 2024 Daniel</p>
    <nav>
      <a href="{{ route('principal.dashboard')}}">Página Inicial</a>
      <a href="#">Sobre Nós</a>
      <a href="#">Contato</a>
    </nav>
  </footer>

</body>
</html>