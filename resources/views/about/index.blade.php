@extends('layouts.master')
@section('content')

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
            <div class="row no-gutters gallerys p-0 {{ count($imageInformation) > 3 ? 'multiple-items' : '' }}">
                @foreach($imageInformation as $p)
                <div class="{{ count($projectImages) < 3 ? 'col-sm-4' : '' }} py-4 px-2 gallery-item {{ count($projectImages) > 3 ? 'slick-slide' : '' }}" style="height:auto!important;">
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