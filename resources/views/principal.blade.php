
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Principal</title>
    
    @livewireStyles
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <script defer src="https://unpkg.com/alpinejs@3.10.3/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="http://localhost/inventariohgpt/resources/css/principal.css">



</head>
<body>
    <livewire:header></livewire:header>
    <br>
    <div class="tabla">
        <livewire:equipos-table></livewire:equipos-table>
    </div>
    
</body>

<footer>
    <x-footer></x-footer>
</footer>

</html>