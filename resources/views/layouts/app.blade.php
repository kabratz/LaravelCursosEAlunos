{{-- resources/views/layouts/app.blade.php --}}

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão de Alunos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    @include('layouts.header')


    <div class="container">
        @include('layouts.breadcrumb')
        
        @yield('content')
    </div>
    @include('layouts.footer')

</body>

</html>