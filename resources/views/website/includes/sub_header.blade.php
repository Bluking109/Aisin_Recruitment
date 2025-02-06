<section class="sub-header primary-bg-image mt-126">
    <div class="block no-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner2">
                        <div class="inner-title2">
                            <h3>{{ $title }}</h3>
                            <span>{{ $sub_title }}</span>
                        </div>
                        <div class="page-breacrumbs">
                            <ul class="breadcrumbs">
                                @foreach ($breadcrumbs as $v)
                                    <li><a href="{{ $v['url'] }}" title="">{{ $v['title'] }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
