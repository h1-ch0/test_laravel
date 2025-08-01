{{-- <h1>components.list-layout.blade.php START</h1> --}}
{{-- <head>
  {{-- <meta charset="UTF-8" /> --}}
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  {{-- <title>게시물 목록</title> --}}
  <link rel="stylesheet" href={{ asset("css/style.css")}} />
{{-- </head> --}}
<body>
  <header>
    <nav>
      <a href="/">Home</a>
      <a href="/posts">Posts</a>
      <a href="/">Lists</a>
    </nav>
  </header>
  
  <main>
    @yield('content')
    
  </main>
  

</body>
{{-- <h1>components.list-layout.blade.php End</h1> --}}
{{-- </html> --}}
