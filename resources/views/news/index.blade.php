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

    @media (max-width: 768px) {
        .padding-for-phone {
            margin-top: -5rem !important;
        }
    }
</style>

<div style="height: 50%; min-height: 40%; background-image: url('{{env('APP_URL')}}{{$news_information->header_image}}'); background-size: cover;background-position: center;">
</div>

<div style="background-color:#eeeeef">
    <section class="page-section" id="portfolio" style="background-color:#eeeeef" data-aos="fade-up"
        data-aos-duration="1000">
        <div class="container px-4 px-lg-5">
            <h2 class="text-center mt-0 fw-bolder" style="color:#474443">News & Event</h2>
            <hr class="divider" style="background-color:#f37321;width:70%;max-width:10rem" />
            <div class="row gx-4 gx-lg-5 portfolio-items" style="place-content: center">
                <div class="col-sm-12">
                    <div class="row d-flex flex-wrap justify-content-center">
                        @foreach ($news as $a)
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
                                        <div style="height: 220px;">
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

    <style>
        .card {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
        }
    </style>
</div>
@endsection

@section('jquery')

@endsection