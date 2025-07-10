<!DOCTYPE html>
<html>
<head><title>@yield('title')</title></head>
<body>
<nav>
  <a href="{{ route('gastos.index') }}">Gastos</a> |
  <a href="{{ route('categorias.index') }}">Categorias</a> |
  <a href="{{ route('gastos.relatorio') }}">Relatório</a>
</nav>
@if(session('success')) <div>{{ session('success') }}</div> @endif
@yield('content')
</body>
</html>
