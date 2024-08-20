@extends('layouts.master')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
<!-- Include jQuery (ensure it's included before Slick) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- magnific popup css link -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">

@section('content')

<style>
    body {
        -webkit-overflow-scrolling: touch;
    }

    body.mfp-zoom-out-cur {
        overflow: hidden;
        -webkit-overflow-scrolling: auto;
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

    .mfp-bg {
        background-color: #f37321 !important;
    }
</style>

<div
    style="height: 50%; min-height: 40%; background-image: url({{env('APP_URL')}}{{$information->header_image}}); background-size: cover;">
</div>

<div style="background-color:#eeeeef">
    <div class="page-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="text-center mx-auto py-3">
                        <h2 class="mt-0 fw-bolder">About Java Residence</h2>
                        <hr class="divider divider-black" />
                    </div>
                    <div class="row gx-4 gx-lg-5 mx-auto">
                        <div class="col-sm-12">
                            @if($information->video)
                            <div id="video_container" class="video-responsive">
                                {!! $information->video !!}
                            </div>
                            @else
                            <img class="object-contain items-center" style="width:100%;height:100%;object-fit:cover"
                                src="{{env('APP_URL')}}{{$information->image}}">
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="text-center mx-auto py-2">
                            <p>
                                {!! $information->description !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container pb-1 pt-1 px-0">
        <div class="col-sm-12">
            <div class="row no-gutters gallerys p-0 multiple-items">
                @foreach($imageInformation as $p)
                <div class="col-sm-4 py-4 gallery-item" style="height:auto!important;">
                    <a href="{{env('APP_URL')}}{{$p->image}}">
                        <img src="{{env('APP_URL')}}{{$p->image}}"
                            style="height:20rem!important;width:100%;object-fit:cover" />
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection

@section('jquery')
<!-- Include Slick JavaScript -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<!-- magnific popup jQuery script link -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
<!-- bootstrap script cdn -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function ($) {
    // Initialize Magnific Popup
    $('.gallerys').magnificPopup({
        type: 'image',
        delegate: 'a',
        gallery: {
            enabled: true
        },
        callbacks: {
            open: function() {
                // When the popup is opened, apply the styles
                $('body').addClass('mfp-zoom-out-cur');
            },
            close: function() {
                // When the popup is closed, remove the styles
                $('body').removeClass('mfp-zoom-out-cur');
            }
        }
    });

    // Initialize Slick Carousel
    $('.multiple-items').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 3,
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
                breakpoint: 768, // Mobile breakpoint
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