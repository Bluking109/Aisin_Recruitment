
@extends('tes.layouts.master')
@section('title', 'News')
@section('pages')

  
  <!-- newsSection -->
  <section id="whatsnew" class="newsSection">
    <div class="newsHeader">
      <h2 class="newsTtl">
        <span class="en">News</span>
      </h2>
    </div><!-- /newsHeader -->
  
    <ul class="newsTab">
      <li><a href="javascript:void(0)" class="newsScroll active">Awards</a></li>
      <li><a href="javascript:void(0)" class="newsScroll">Events</a></li>
      <li><a href="javascript:void(0)" class="newsScroll">Others</a></li>
    </ul>
  
    <div class="newsContent">
      <div id="category1" class="newsBox active">
        <div class="newsList">
          <div class="entryVox">
            <time datetime="0000-00-00">2024.01.20</time>
            <div class="category">Awards</div>
            <div class="title">
              <a href="xxx"><span>To achieve a mobility society that is friendly</span></a>
            </div>
          </div><!-- /entryVox -->
          <div class="entryVox">
            <time datetime="0000-00-00">0000.00.00</time>
            <div class="category">Awards</div>
            <div class="title">
              <a href="xxx"><span>Title</span></a>
            </div>
          </div><!-- /entryVox -->
          <div class="entryVox">
            <time datetime="0000-00-00">0000.00.00</time>
            <div class="category">Awards</div>
            <div class="title">
              <a href="xxx"><span>Title</span></a>
            </div>
          </div><!-- /entryVox -->
        </div>
      </div>
      <!-- category1 -->
  
      <div id="category2" class="newsBox">
        <p class="empty">Article does not exist.</p>
        <p class="moreLink"><a href="">Read more</a></p>
      </div>
      <!-- category2 -->
  
      <div id="category3" class="newsBox">
        <div class="newsList">
          <div class="entryVox">
            <time datetime="0000-00-00">0000.00.00</time>
            <div class="category">Others</div>
            <div class="title">
              <a href="xxx"><span>Title</span></a>
            </div>
          </div><!-- /entryVox -->
          <div class="entryVox">
            <time datetime="0000-00-00">0000.00.00</time>
            <div class="category">Others</div>
            <div class="title">
              <a href="xxx"><span>Title</span></a>
            </div>
          </div><!-- /entryVox -->
          <div class="entryVox">
            <time datetime="0000-00-00">0000.00.00</time>
            <div class="category">Others</div>
            <div class="title">
              <a href="xxx"><span>Title</span></a>
            </div>
          </div><!-- /entryVox -->
        </div>
        <p class="moreLink"><a href="">Read more</a></p>
      </div>
      <!-- category3 -->
    </div>
    <!-- newsContent -->
  </section>
  <!-- /newsSection -->
  
  <!-- mainpageSection -->
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
  <!-- /mainpageSection -->
  
  <!-- mainpageSection -->
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
  <!-- /mainpageSection -->
  
  <!-- mainpageSection -->
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
  <!-- /mainpageSection -->
  
  <!-- subpageSection -->
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
  <!-- /subpageSection -->
  
  <!-- subpageSection -->
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
  <!-- /subpageSection -->
  
  <!-- subpageSection -->
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
  <!-- /subpageSection -->
  
  <!-- notice -->
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
  <!-- notice -->

  @endsection