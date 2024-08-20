@extends('layouts.master')
<script src='//pchen66.github.io/js/three/three.min.js'></script>
<script src='//pchen66.github.io/js/panolens/panolens.min.js'></script>
<?php header('Access-Control-Allow-Origin: *'); ?>

@section('content')
<style>
    .image-container {
        height: 40rem;
    }

    .slick-prev,
    .slick-next {
        background: none;
        border: none;
        font-size: 24px;
        color: #000;
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        z-index: 1000;
    }

    .slick-prev {
        left: -30px;
    }

    .slick-next {
        right: -30px;
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
    }

    .image-container {
        position: relative;
    }
</style>
<div
    style="height: 50%; min-height: 40%; background-image: url({{env('APP_URL')}}{{$project->header_image}}); background-size: cover;background-position: center;">
</div>

<div style="background-color:#eeeeef">
    <div class="page-section">
        <div class="container">
            <div class="row px-2">
                <div class="col-sm-12">
                    <div class="text-center mx-auto">
                        <h2 class="mt-0 fw-bolder">{{$projectType->name}}</h2>
                        <hr class="divider divider-black" />
                    </div>
                    <div class="row gx-4 gx-lg-5">
                        <div class="col-lg-7 justify-content-center">
                            <div class="gallery-item gallerys">
                                <a href="{{env('APP_URL')}}{{$projectType->image}}">
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

    <div class="container pb-1 pt-1 px-0">
        <div class="col-sm-12">
            <div class="row no-gutters gallerys p-0 {{ count($projectTypeImages) > 3 ? 'multiple-items' : '' }}">
                @foreach($projectTypeImages as $p)
                <div class="col-sm-4 py-4 px-2 gallery-item" style="height:auto!important;">
                    <a href="{{env('APP_URL')}}{{$p->image}}">
                        <img src="{{env('APP_URL')}}{{$p->image}}"
                            style="height:20rem!important;width:100%;object-fit:cover" />
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    @if($projectTypeImages360->isNotEmpty())
    @if(count($projectTypeImages360) > 2)
    <div class="container pb-2 pt-2 px-0">
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
    <div class="container pb-2 pt-2 px-0">
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
<script type="text/javascript">
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