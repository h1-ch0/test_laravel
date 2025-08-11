{{-- <div> --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>layout.blade.php_Document</title>
    @vite('resources/css/app.css','resources/js/app.jsx')
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex flex-col min-h-screen bg-gray-100">
    <x-FlashMessage></x-FlashMessage>
    {{-- <x-errorMessage></x-errorMessage> --}} {{-- IGNORE --}}
    <x-navbar></x-navbar> 
    <div class = "flex-1 max-w-6xl mx-auto w-full">
        {{ $slot }}
    </div>
    
    <footer class="bg-gray-800 text-white py-4 mt-8 w-full">
      @include('inc.footer')
    </footer>
  </body>
</html>

{{-- </div> --}}
