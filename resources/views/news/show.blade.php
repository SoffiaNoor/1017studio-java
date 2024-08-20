@extends('layouts.master')

@section('content')

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
<style>
    .video-responsive {
        position: relative;
        padding-bottom: 56.25%;
        /* 16:9 aspect ratio */
        height: 0;
        overflow: hidden;
        max-width: 100%;
    }

    .video-responsive iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

    .height-for-news {
        height: 250px;
    }

    /* Target iPad Pro portrait and landscape modes */
    @media (min-width: 900px) and (max-width: 1200px) {
        .height-for-news {
            height: 320px !important;
        }
    }
</style>

<div style="background-color:#eeeeef">
    <div class="pb-4" style="padding-top:8rem">
        <div class="container">
            <div class="col-sm-12">
                @if(!empty ($news->link_video))
                <div id="video_container" class="video-responsive">
                    {!! $news->link_video !!}
                </div>
                @else
                <div>
                    <img class="object-contain items-center" style="width:100%;height:60%;object-fit:cover"
                        src="{{env('APP_URL')}}{{$news->image}}">
                </div>
                @endif
            </div>
            <div class="col-sm-12 pt-3">
                <div class="text-center mx-auto py-2">
                    <h3 class="mt-0 fw-bolder">{{$news->title}}</h3>
                    <hr class="divider divider-black" />
                </div>
                <p>
                    {!! $news->description !!}
                </p>
            </div>
        </div>
    </div>

    <div class="container pb-1 pt-1 px-2">
        <div class="col-sm-12">
            <div class="row no-gutters gallerys p-0 {{ count($newsImages) > 3 ? 'multiple-items' : '' }}">
                @foreach($newsImages as $p)
                <div class="{{ count($newsImages) < 4 ? 'col-sm-4' : '' }} py-4 px-2 gallery-item {{ count($newsImages) > 3 ? 'slick-slide' : '' }}"
                    style="height:auto!important;">
                    <a href="{{env('APP_URL')}}{{$p->image}}">
                        <img src="{{env('APP_URL')}}{{$p->image}}"
                            style="height:20rem!important;width:100%;object-fit:cover" />
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <section id="portfolio" style="background-color:#eeeeef;padding: 2rem 0;">
        <div class="container">
            <h2 class="text-center mt-0 fw-bolder" style="color:#474443">News & Event</h2>
            <hr class="divider" style="background-color:#f37321;width:70%;max-width:10rem" />
            <div class="row gx-4 gx-lg-5 portfolio-items px-2 px-lg-2" style="place-content: center">
                <div class="col-sm-12">
                    <div class="row d-flex flex-wrap justify-content-center" style="text-align: -webkit-center;">
                        @foreach ($latest_news as $a)
                        <div class="col-lg-4 col-sm-4 col-md-6 py-3 d-flex">
                            <a href="{{ route('news.show', $a->id) }}" class="d-flex w-100">
                                <div class="card" style="width: 100%; position: relative;">
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
                                        <div class="height-for-news">
                                            {!! Str::limit($a->description, 300) !!}</div>
                                        <hr class="divider"
                                            style="background-color:#ffffff;width:100%;max-width: 100%!important;height: 0.1rem!important;" />
                                        <p class="card-text">{{ $a->created_at->format('Y-m-d') }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection

@section('jquery')
<script>
    $(document).ready(function ($) {
        $('.gallerys').magnificPopup({
            type: 'image',
            delegate: 'a',
            gallery: {
                enabled: true
            },
            callbacks: {
                open: function() {
                    $('body').addClass('mfp-zoom-out-cur');
                },
                close: function() {
                    $('body').removeClass('mfp-zoom-out-cur');
                }
            }
        });

        $('.multiple-items').slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            arrows: false,
            autoplay: true,
            autoplaySpeed: 2000,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 768, 
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    });
</script>
@endsection