<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>게시물 목록</title>
  <link rel="stylesheet" href={{ asset("css/style.css")}} />
</head>
<body>
  <header>
    <h1>Test_views/layout.blade.php</h1>
    <nav>
      <a href="/">Home</a>
      <a href="/posts">Posts</a>
      <a href="/">Lists</a>
    </nav>
  </header>

  <main>
    @yield('content')

  </main>

  <footer>
    @include('inc.footer')
  </footer>
</body>
</html>
