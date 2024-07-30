@extends('layouts.master')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
<!-- Include jQuery (ensure it's included before Slick) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/lightbox2@2.11.3/dist/css/lightbox.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<script src='//pchen66.github.io/js/three/three.min.js'></script>
<script src='//pchen66.github.io/js/panolens/panolens.min.js'></script>
<?php header('Access-Control-Allow-Origin: *'); ?>

<style>
    .image-container {
        height: 40rem;
    }

    .custom-map {
        width: 500px;
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
</style>

@section('content')

<div
    style="height: 50%; min-height: 40%; background-image: url({{env('APP_URL')}}{{$project->header_image}}); background-size: cover;">
</div>

<div style="background-color:#eeeeef">
    <div style="padding-top:5rem">
        <div class="container">
            <div class="row px-2">
                <div class="col-sm-12">
                    <div class="text-center mx-auto py-3">
                        <h2 class="mt-0 fw-bolder">{{$projectType->name}}</h2>
                        <hr class="divider divider-black" />
                    </div>
                    <div class="row gx-4 gx-lg-5">
                        <div class="col-lg-7 justify-content-center">
                            <div class="gallery-item">
                                <a href="{{env('APP_URL')}}{{$projectType->image}}" data-lightbox="gallery">
                                    <img src="{{env('APP_URL')}}{{$projectType->image}}"
                                        style="object-fit: cover;height:30rem!important;width:100%!important" />
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-5 py-5 py-md-0">
                            <div class="py-3" style="background-color:#f37321">
                                <div class="px-2">
                                    <h3 class="mt-0 ml-2 fw-bolder text-white">Spesifikasi</h3>
                                    <table class="table table-borderless" style="border-color: transparent!important;">
                                        <thead class="text-white">
                                            <tr>
                                                <th style="align-content: center;">Luas Bangunan
                                                </th>
                                                <th class="text-white">: {{$projectType->luas_bangunan}} m2</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-white fw-bold">
                                            <tr>
                                                <td style="align-content: center;">Luas Tanah</td>
                                                <td class="text-white">: {{$projectType->luas_tanah}} m2</td>
                                            </tr>
                                            <tr>
                                                <td style="align-content: center;">Fondasi</td>
                                                <td class="text-white">: {{$projectType->fondasi}}</td>
                                            </tr>
                                            <tr>
                                                <td style="align-content: center;">Dinding</td>
                                                <td class="text-white">: {{$projectType->dinding}}</td>
                                            </tr>
                                            <tr>
                                                <td style="align-content: center;">Plafon</td>
                                                <td class="text-white">: {{$projectType->plafon}} meter</td>
                                            </tr>
                                            <tr>
                                                <td style="align-content: center;">Kamar Tidur</td>
                                                <td class="text-white">: {{$projectType->kamar_tidur}}</td>
                                            </tr>
                                            <tr>
                                                <td style="align-content: center;">Kamar Mandi</td>
                                                <td class="text-white">: {{$projectType->kamar_mandi}}</td>
                                            </tr>
                                            <tr>
                                                <td style="align-content: center;">Carport</td>
                                                <td class="text-white">: {{$projectType->carport}}</td>
                                            </tr>
                                            <tr>
                                                <td style="align-content: center;">Air</td>
                                                <td class="text-white">: {{$projectType->air}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container pb-5 pt-5 px-0">
        <div class="col-sm-12">
            <div class="row">
                <div class="multiple-items">
                    @foreach($projectTypeImages as $p)
                    <div class="col-sm-4 py-4 px-2 gallery-item">
                        <a href="{{env('APP_URL')}}{{$p->image}}" data-lightbox="gallery">
                            <img src="{{env('APP_URL')}}{{$p->image}}"
                                style="height:20rem!important;width:100%!important;object-fit:cover" />
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <style>
        .side-by-side .gallery-item {
            display: inline-block;
            width: 32%;
            /* Adjust width as needed */
            vertical-align: top;
        }

        .side-by-side {
            text-align: center;
        }

        @media (max-width: 768px) {
            .side-by-side .gallery-item {
                display: block;
                width: 100%;
            }
        }
    </style>
    <style>
        .slick-prev,
        .slick-next {
            background: none;
            border: none;
            font-size: 24px;
            color: #000;
            /* Customize arrow color */
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            z-index: 1000;
        }

        .slick-prev {
            left: -30px;
            /* Adjust to increase the gap from the left edge of the image */
        }

        .slick-next {
            right: -30px;
            /* Adjust to increase the gap from the right edge of the image */
        }

        @media (max-width: 768px) {
            .slick-prev {
                left: 10px;
                background-color: #ffffff;
                border-radius: 20px;
                padding: 10px !important;
                filter: drop-shadow(rgba(22, 22, 22, 0.445) 3px 3px 10px);
            }

            .slick-next {
                right: 10px;
                background-color: #ffffff;
                border-radius: 20px;
                padding: 10px !important;
                filter: drop-shadow(rgba(22, 22, 22, 0.445) 3px 3px 10px);
            }
        }

        .slick-prev:hover,
        .slick-next:hover {
            color: #666;
            /* Customize hover color */
        }

        .image-container {
            position: relative;
            /* Ensure arrows are positioned relative to the container */
        }
    </style>


    @if($projectTypeImages360->isNotEmpty())
    @if(count($projectTypeImages360) > 2)
    <div class="container pb-5 pt-5 px-0">
        <div class="col-sm-12">
            <div class="row">
                <div class="grid grid-cols-6">
                    @foreach($projectTypeImages360 as $image)
                    <div class="image-container" data-image="{{ asset($image->image_360) }}"></div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="container pb-5 pt-5 px-0">
        <div class="col-sm-12">
            <div class="row">
                <div class="multiple-items2">
                    @foreach($projectTypeImages360 as $image)
                    <div class="col-sm-12 py-4">
                        <div class="image-container" data-image="{{ asset($image->image_360) }}">
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endif
    @endif
</div>

@endsection

@section('jquery')
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/lightbox2@2.11.3/dist/js/lightbox.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        // Check the number of gallery items
        var galleryItemsCount = $('.gallery-item').length;

        // Initialize Slick slider if there are 3 or more items
        @if($projectTypeImages->count() >= 3)
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
        @else
        $('.multiple-items').addClass('side-by-side');
        @endif

        $('.gallery-item a').on('click', function() {
            // Remove the 'active' class from all gallery items
            $('.gallery-item').removeClass('active');

            // Add the 'active' class to the clicked item's parent
            $(this).parent().addClass('active');
        });

        // Lightbox2 custom handling
        // Add class when Lightbox2 opens
        $(document).on('click', '[data-lightbox]', function() {
            $('body').addClass('no-scroll');
        });

        // Remove class when Lightbox2 closes
        $(document).on('click', '.lightbox', function(e) {
            if ($(e.target).hasClass('lightbox')) {
                $('body').removeClass('no-scroll');
            }
        });

        // For closing the Lightbox with the ESC key
        $(document).on('keydown', function(e) {
            if (e.key === "Escape") {
                $('body').removeClass('no-scroll');
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('.multiple-items2').slick({
            infinite: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            autoplay: false,
            swipe: false,
            draggable: false,
            prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left" style="color:#f37321"></i></button>',
            nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right" style="color:#f37321"></i></button>',
        });

        const containers = document.querySelectorAll('.image-container');
        containers.forEach(container => {
            const imageUrl = container.getAttribute('data-image');
            const viewer = new PANOLENS.Viewer({
                container: container
            });
            const panorama = new PANOLENS.ImagePanorama(imageUrl);
            viewer.add(panorama);
        });
    });
</script>


@endsection