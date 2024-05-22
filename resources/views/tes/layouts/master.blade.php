

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <title>サイト名</title>
  <meta name="description" content="DESCRIPTION">
  <meta name="keywords" content="KEYWORD">

  <meta property="og:title" content="サイト名">
  <meta property="og:type" content="website">
  <meta property="og:description" content="DESCRIPTION">
  <meta property="og:url" content="http://localhost:8888/aisin-web/">
  <meta property="og:image" content="{{ asset('tes/img/common/ogp.png') }}">
  <meta property="og:site_name" content="サイト名">

  <link rel="stylesheet" href="{{ asset('tes/css/global.css') }}" type="text/css" media="all">
  <link href="{{ asset('tes/css/home.css') }}" rel="stylesheet" type="text/css" media="all">  <link rel="stylesheet" href="{{ asset('tes/css/print.css') }}" media="print">

  <script type="text/javascript" src="{{ asset('tes/js/jquery-3.5.1.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('tes/js/main.js') }}"></script>
  <script src="{{ asset('tes/js/home.js') }}" ></script>
  </head>

<body id="home" class="home">
  @include('tes.includes.header')
  <!-- wrapper -->
  <div class="wrapper">
    
<div class="bg-wrap">

</div>

@yield('pages')

@include('tes.includes.footer')
      </div>
  <!-- wrapper -->
</body>
</html>
