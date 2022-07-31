<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @livewireStyles
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Product Displayer</title>

</head>
<body class="bg-slate-200">
<main>

    {{ $slot }}

</main>
@livewireScripts
</body>
</html>
