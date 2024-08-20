@extends('layouts.master')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
<!-- Include jQuery (ensure it's included before Slick) -->
<link href="https://cdn.jsdelivr.net/npm/lightbox2@2.11.3/dist/css/lightbox.min.css" rel="stylesheet">
<!-- magnific popup css link -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">

@section('content')
<style>
    .custom-map {
        width: 540px;
        max-width: 1080px;
        /* or any specific width you want, like 600px */
        height: 400px;
        /* or any specific height you want */
        border: 0;
    }

    @media (max-width: 767px) {

        /* Adjust the max-width value as needed for your mobile breakpoint */
        .custom-map {
            width: 100%;
            height: 300px;
            /* Adjust the height for mobile as needed */
        }
    }
</style>

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
    @media (max-width: 768px) {
        .padding-for-phone {
            margin-top: -5rem !important;
        }
    }
    
    .mfp-bg {
        background-color: #f37321 !important;
    }
</style>

<div
    style="height: 50%; min-height: 40%; background-image: url({{env('APP_URL')}}{{$project->header_image}}); background-size: cover;background-position: center;">
</div>

<div style="background-color:#eeeeef">
    <div class="page-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="text-center mx-auto">
                        <h2 class="mt-0 fw-bolder">{{$project->title}}</h2>
                        <hr class="divider divider-black" />
                    </div>
                    <div class="row gx-4 gx-lg-5">
                        <div class="col-lg-5 justify-content-center">
                            <div class="gallery-item gallerys">
                                <a href="{{env('APP_URL')}}{{$project->image}}">
                                    <img class="img-fluid pb-3"
                                        style="object-fit: cover;height:35rem!important;width: 100%;"
                                        src="{{env('APP_URL')}}{{$project->image}}" alt="..." />
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-7 py-5 py-md-0">
                            <div class="mb-2">
                                {!! $project->description !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container pb-1 pt-1 px-0">
        <div class="col-sm-12">
            <div class="row no-gutters gallerys p-0 {{ count($projectImages) > 3 ? 'multiple-items' : '' }}">
                @foreach($projectImages as $p)
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

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="text-center mx-auto py-3">
                    <h2 class="mt-0 fw-bolder">Siteplan & Location</h2>
                    <hr class="divider divider-black" />
                </div>
                <div class="row gx-4 gx-lg-5">
                    <div class="col-lg-6 justify-content-center py-2">
                        <div class="gallery-item gallerys">
                            <a href="{{env('APP_URL')}}{{$project->siteplan}}">
                                <img class="img-fluid custom-map" style="object-fit: cover;"
                                    src="{{env('APP_URL')}}{{$project->siteplan}}" alt="..." />
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 justify-content-center py-2">
                        {!! str_replace('<iframe', '<iframe class="custom-map"' , $project->location) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="text-center mx-auto py-3">
                    <h2 class="mt-0 fw-bolder">Type</h2>
                    <hr class="divider divider-black" />
                </div>
                <div class="row">
                    @foreach($projectType as $p)
                    <div class="col-sm-4 py-4 position-relative">
                        <a
                            href="{{ route('project.detail', ['id_project' => $project->id, 'id_project_type' => $p->id]) }}">
                            <div class="img-fluid"
                                style="height:30rem!important;width:100%;object-fit:cover;background: linear-gradient(to bottom, rgba(26, 26, 26, 0.5) 0%, rgba(33, 33, 33, 0.5) 100%), url('{{env('APP_URL')}}{{$p->image}}'); background-size: cover;align-content:end">
                                <div>
                                    <h4 class="mt-0 fw-bolder text-white text-center">{{$p->name}}</h4>
                                    <p class="text-white text-center mx-2">{{$p->small_description}}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
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

<script type="text/javascript">
    $(document).ready(function(){
        // Check the number of gallery items
        var galleryItemsCount = $('.gallery-item').length;

        // Initialize Slick slider if there are 3 or more items
        if (galleryItemsCount >= 3) {
            $('.multiple-items').slick({
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 3,
                arrows: false,
                autoplay: true,
                autoplaySpeed: 2000,
                responsive: [
                    {
                        breakpoint: 1024, // You can adjust this breakpoint as needed
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
        } else {
            // Add 'side-by-side' class if there are fewer than 3 items
            $('.multiple-items').addClass('side-by-side');
        }

        $('.gallery-item a').on('click', function(){
            // Remove the 'active' class from all gallery items
            $('.gallery-item').removeClass('active');

            // Add the 'active' class to the clicked item's parent
            $(this).parent().addClass('active');
        });
    });
</script>
<script>
    $(document).ready(function ($) {
        // Initialize Magnific Popup
        $('.gallerys').magnificPopup({
            type: 'image',
            delegate: 'a',
            gallery: {
                enabled: true
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
                    breakpoint: 1024, // You can adjust this breakpoint as needed
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