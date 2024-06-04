@extends('layouts.master')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
<!-- Include jQuery (ensure it's included before Slick) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/lightbox2@2.11.3/dist/css/lightbox.min.css" rel="stylesheet">

@section('content')

<style>
    .lightboxOverlay {
        position: absolute;
        top: 0;
        left: 0;
        z-index: 9999;
        background-color: #f37321 !important;
        filter: alpha(Opacity=80);
        opacity: .8;
        display: none;
    }

    .video-responsive {
        position: relative;
        padding-bottom: 56.25%;
        /* 16:9 aspect ratio */
        height: 0;
        overflow: hidden;
        max-width: 100%;
        background: #000;
    }

    .video-responsive iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
</style>

<div style="background-color:#eeeeef">
    <div class="pb-4" style="padding-top:10rem">
        <div class="container">
            <div class="col-sm-12">
                <div id="video_container" class="video-responsive">
                    @if($news->link_video)
                    {!! $news->link_video !!}
                    @else
                    <img id="video_display" class="object-contain items-center"
                        style="width:100%;height:100%;object-fit:cover" src="{{ asset('assets/img/no-video.png') }}">
                    @endif
                </div>
            </div>
            <div class="col-sm-12 pt-5">
                <div class="text-center mx-auto py-3">
                    <h2 class="mt-0 fw-bolder">{{$news->title}}</h2>
                    <hr class="divider divider-black" />
                </div>
                <p>
                    {!! $news->description !!}
                </p>
            </div>
        </div>
    </div>

    <div class="container pb-5 pt-5 px-0">
        <div class="col-sm-12">
            <div class="row">
                <div class="multiple-items">
                    @foreach($newsImages as $p)
                    <div class="col-sm-4 py-4 gallery-item">
                        <a href="{{env('APP_URL')}}{{$p->image}}" data-lightbox="gallery">
                            <img src="{{env('APP_URL')}}{{$p->image}}"
                                style="height:20rem!important;width:100%;object-fit:cover" />
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <section class="page-section" id="portfolio">
        <div class="container px-4 px-lg-5">
            <h2 class="mt-0 fw-bolder text-center" style="color:#474443">News & Event</h2>
            <hr class="divider" style="background-color:#f37321;width:70%;max-width:10rem;" />
            <div class="row gx-4 gx-lg-5 portfolio-items" style="place-content: center">
                <div class="col-sm-12">
                    <div class="row" style="text-align: -webkit-center;">
                        @foreach ($latest_news as $a)
                        <div class="col-sm-4 py-3">
                            <a href="{{ route('news.show', $a->id) }}">
                                <div class="card" style="width: 20rem; position: relative;">
                                    <div class="image-container" style="position: relative;">
                                        <img class="card-img-top" src="{{env('APP_URL')}}{{$a->image}}"
                                            alt="Card image cap">
                                        <div class="overlay">
                                            <div class="overlay-text" style="font-weight: 600">
                                                {{ $a->title }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body text-white" style="background-color:#f37321;">
                                        <p class="card-text">{{ Str::limit(strip_tags($a->description), 300) }}</p>
                                        <hr class="divider"
                                            style="background-color:#ffffff;width:100%;max-width: 100%!important;height: 0.1rem!important;" />
                                        <p class="card-text">{{ $a->created_at->format('Y-m-d') }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach

                        <style>
                            .image-container {
                                position: relative;
                            }

                            .overlay {
                                position: absolute;
                                top: 0;
                                left: 0;
                                width: 100%;
                                height: 100%;
                                background-color: rgba(0, 0, 0, 0.8);
                                display: flex;
                                justify-content: center;
                                align-items: center;
                                color: white;
                                font-size: 1.5rem;
                                text-align: center;
                                padding: 10px;
                                text-transform: uppercase;
                            }

                            .overlay-text {
                                padding: 10px;
                            }
                        </style>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection

@section('jquery')
<!-- Include Slick JavaScript -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<!-- Include Lightbox JavaScript -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/lightbox2@2.11.3/dist/js/lightbox.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $('.multiple-items').slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 3,
            arrows: false,
            autoplay: true,
            autoplaySpeed: 2000,
            responsive: [
                {
                    breakpoint: 768, // You can set this to the breakpoint you want for mobile
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });

        $('.gallery-item a').on('click', function(){
            // Remove the 'active' class from all gallery items
            $('.gallery-item').removeClass('active');

            // Add the 'active' class to the clicked item's parent
            $(this).parent().addClass('active');
        });
    });
</script>
@endsection