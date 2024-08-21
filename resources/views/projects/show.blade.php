@extends('layouts.master')
@section('content')

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
                    <div class="row gx-4 gx-lg-5 pt-2">
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
                <div class="{{ count($projectImages) < 4 ? 'col-sm-4' : '' }} py-4 px-2 gallery-item {{ count($projectImages) > 3 ? 'slick-slide' : '' }}"
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
                                <img class="custom-map" style="object-fit: cover;width:100%!important"
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
                            <div class="img-fluid d-flex flex-column justify-content-end"
                                style="height:30rem!important;width:100%;object-fit:cover;background: linear-gradient(to bottom, rgba(26, 26, 26, 0.5) 0%, rgba(33, 33, 33, 0.5) 100%), url('{{env('APP_URL')}}{{$p->image}}'); background-size: cover;">
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

<script type="text/javascript">
    $(document).ready(function(){
        var galleryItemsCount = $('.gallery-item').length;

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
        } else {
            $('.multiple-items').addClass('side-by-side');
        }

        $('.gallery-item a').on('click', function(){
            $('.gallery-item').removeClass('active');
            $(this).parent().addClass('active');
        });
    });
</script>
<script>
    $(document).ready(function ($) {
        $('.gallerys').magnificPopup({
            type: 'image',
            delegate: 'a',
            gallery: {
                enabled: true
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