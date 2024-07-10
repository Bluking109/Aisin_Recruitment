

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <title>Satu Aisin</title>
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
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap.css" rel="stylesheet">

  <style>
    .newsSection {
      position: absolute;
      z-index: 1;
      background: rgba(255, 255, 255, 0.8); /* Semi-transparent background */
      padding: 20px;
    }

    .newsBackground {
      position: relative;
      overflow: hidden;
    }

    .newsBackground .carousel-item img {
      object-fit: cover;
      width: 100%;
      height: 400px; /* Adjust height as needed */
    }

    .newsBackground .carousel-inner {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: -1;
    }
    /* Custom CSS untuk carousel */
    h5 {
  display: inline-block;
  padding: 10px;
  background: rgb(23, 23, 76);
  border-top-left-radius: 10px;
  border-top-right-radius: 10px;
}

.full-screen {
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
}

.carousel-caption-static {
            position: absolute;
            top: 30%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 10;
            color: white;
            font-size: 2rem;
        }
  </style>
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
