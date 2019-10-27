<!DOCTYPE html>
<html lang="ru">
  <head>
  	  <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link href="css/sticky-footer-navbar.css" rel="stylesheet">
      <link rel="shortcut icon" href="book_bookmark.png" type="image/x-icon">
  	  <title>Записная книжка</title>
      <script src="js/forms.js"></script>
  </head>
   @yield('content')
   <footer class="footer">
      <div class="container">
        <span class="text-muted">&#169 В. С. Зайцев, 2019</span>
      </div>
    </footer>

  </body>
</html>