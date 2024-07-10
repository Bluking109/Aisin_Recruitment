@extends('tes.layouts.master')
@section('title', 'News')
@section('pages')  
  <!-- News Section -->
  {{-- <section id="whatsnew" class="newsSection"> --}}
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      </ol>
      <!-- Wrapper for slides -->
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="{{ asset('website/images/aiia.png') }}" data-color="lightblue" alt="First Image">
          <div class="carousel-caption d-md-block">
            <h5>PT Aisin Indonesia Automotive</h5>
          </div>
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="{{ asset('website/images/aii.png') }}" data-color="firebrick" alt="Second Image">
          <div class="carousel-caption d-md-block">
            <h5>PT Aisin Indonesia</h5>
          </div>
        </div>
      </div>
      <!-- Controls -->
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <!-- <span class="sr-only">Previous</span> -->
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <!-- <span class="sr-only">Next</span> -->
      </a>
    </div>
  {{-- </section> --}}
  <!-- /News Section -->
  
  <!-- Main Page Section -->
  <section class="mainpageSection" id="menu1">
    <div class="inner">
      <h2>
        <span class="h2Inner">
          <span class="en">AISIN Promotes a Safe Driving Community, Indonesia</span>
        </span>
      </h2>
      <div class="pageContent">
        <p class="copy">
          Headline<br>
          HeadlineHeadline
        </p>
        <div class="moreBtn">
          <a href=""><span>Read more</span></a>
        </div>
      </div>
    </div>
  </section>
  <!-- /Main Page Section -->
  
  <!-- Main Page Section -->
  <section class="mainpageSection" id="menu2">
    <div class="inner">
      <h2>
        <span class="h2Inner">
          <span class="en">MENUNAME</span>
        </span>
      </h2>
      <div class="pageContent">
        <p class="copy">
          Headline<br>
          HeadlineHeadline
        </p>
        <div class="moreBtn">
          <a href=""><span>Read more</span></a>
        </div>
      </div>
    </div>
  </section>
  <!-- /Main Page Section -->
  
  <!-- Main Page Section -->
  <section class="mainpageSection" id="menu3">
    <div class="inner">
      <h2>
        <span class="h2Inner">
          <span class="en">MENUNAME</span>
        </span>
      </h2>
      <div class="pageContent">
        <p class="copy">
          Headline<br>
          HeadlineHeadline
        </p>
        <div class="moreBtn">
          <a href=""><span>Read more</span></a>
        </div>
      </div>
    </div>
  </section>
  <!-- /Main Page Section -->
  
  <!-- Subpage Section -->
  <section class="subpageSection" id="submenu1">
    <a href="">
      <div class="pageContent">
        <div class="txt">
          <h2>AISIN Promotes a Safe Driving Community, Indonesia</h2>
          <div class="moreBtn white">
            <div><span>Read more</span></div>
          </div>
        </div>
      </div>
    </a>
  </section>
  <!-- /Subpage Section -->
  
  <!-- Subpage Section -->
  <section class="subpageSection" id="submenu2">
    <a href="">
      <div class="pageContent">
        <div class="txt">
          <h2>MENUNAME</h2>
          <div class="moreBtn white">
            <div><span>Read more</span></div>
          </div>
        </div>
      </div>
    </a>
  </section>
  <!-- /Subpage Section -->
  
  <!-- Subpage Section -->
  <section class="subpageSection" id="other1">
    <div class="inner">
      <div class="pageContent">
        <figure class="img">
          <img src="{{ asset('tes/img/home/other1_img.jpg')}}" alt="">
        </figure>
        <div class="txt">
          <h2>AISIN Promotes a Safe Driving Community, Indonesia</h2>
          <div class="moreBtn">
            <a href="xxx" target="_blank" class="icoWin"><span>Read more</span></a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /Subpage Section -->
  
  <!-- Notice Section -->
  <section class="noticeSection" id="notice">
    <div class="inner">
      <div class="noticeHeader">
        <h2 class="noticeTtl">NOTICE</h2>
      </div><!-- /noticeHeader -->
  
      <div class="newsBlock">
        <div class="newsList">
          <div class="entryVox">
            <time datetime="0000-00-00">0000.00.00</time>
            <div class="category">Category</div>
            <div class="title">
              <a href="xxx"><span>Title</span></a>
            </div>
          </div><!-- /entryVox -->
          <div class="entryVox">
            <time datetime="0000-00-00">0000.00.00</time>
            <div class="category">Category</div>
            <div class="title">
              <a href="xxx"><span>Title</span></a>
            </div>
          </div><!-- /entryVox -->
          <div class="entryVox">
            <time datetime="0000-00-00">0000.00.00</time>
            <div class="category">Category</div>
            <div class="title">
              <a href="xxx"><span>Title</span></a>
            </div>
          </div><!-- /entryVox -->
        </div>
        <p class="moreLink"><a href="">Read more</a></p>
      </div>
    </div>
  </section>
  <!-- /Notice Section -->

@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://unpkg.com/popper.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>

<script>
  $(document).ready(function(){
    var $item = $('.carousel-item'); 
    var $wHeight = $(window).height();
    $item.eq(0).addClass('active');
    $item.height($wHeight); 
    $item.addClass('full-screen');

    $('.carousel img').each(function() {
      var $src = $(this).attr('src');
      var $color = $(this).attr('data-color');
      $(this).parent().css({
        'background-image' : 'url(' + $src + ')',
        'background-color' : $color
      });
      $(this).remove();
    });

    $(window).on('resize', function (){
      $wHeight = $(window).height();
      $item.height($wHeight);
    });

    $('.carousel').carousel({
      interval: 6000,
      pause: "false"
    });
  });
</script>
