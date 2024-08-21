<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Java Residence</title>
    <link rel="icon" type="image/x-icon" href="{{env('APP_URL')}}{{$information->logo_favicon}}" />

    <!-- Icons for Footer -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Font used for this Java Residence -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <!-- Font Awesome / Icon -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        type='text/css'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- CSS Style used for this Java Residence -->
    <link href="{{asset('assets/css/styles.css')}}" rel="stylesheet">
    <!-- Library Animation used for this web -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <!-- Magnific Popup for Gallery -->
    <link rel="stylesheet" href="{{asset('assets/magnific-popup/magnific-popup.css')}}">
    <!-- Slick for Gallery -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/slick/slick.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- ElevateZoom-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/elevatezoom/3.0.8/jquery.elevatezoom.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />

    <style>
        .navbar::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 20px;
            background-color: #f37321;
            z-index: -1;
        }

        .dropdown-menu {
            display: block;
            opacity: 0;
            padding: 0;
            max-height: 0;
            overflow: hidden;
            transition: all .3s ease-in;
            left: 50%;
            text-align: center;
            background: #ffffff;
            border: none;
            border-radius: 0%;
        }

        .dropdown-menu.show {
            max-height: 500px;
            opacity: 1;
            padding: 0.5rem 0;
        }

        @media (min-width: 768px) and (max-width: 1024px) {
            .dropdown-menu {
                max-width: 100%;
                left: 10%;
                border-radius: 5px;
            }

            .dropdown-menu .dropdown-item {
                font-size: 1.2rem;
            }

            .nav-item.dropdown {
                place-content: flex-start;
            }

            .navbar-nav .dropdown-menu {
                position: static;
                float: left !important;
                width: 100% !important;
            }

            .dropdown-menu {
                transform: none !important;
            }
        }

        @media (min-width: 768px) {
            .centering-text {
                text-align-last: center;
            }
        }

        svg {
            overflow: hidden;
            vertical-align: middle;
            color: #111111 !important;
            opacity: 0 !important;
        }
    </style>
</head>

@php
use Illuminate\Support\Str;
@endphp

<body id="page-top" style="font-family: Montserrat">
    <div id="overlayer" class="overlayer">
        <div class="loader" id="loader">
            <img src="{{env('APP_URL')}}{{$information->logo_header}}" alt="Logo" class="logoloader">
        </div>
    </div>

    <button type="button" class="btn btn-floating btn-lg rounded-5"
        style="background-color:#d85909;color:white;width: 50px;height: 50px;" id="btn-back-to-top">
        <i class="fas fa-arrow-up"></i>
    </button>

    <nav class="navbar navbar-expand-lg navbar-light fixed-top pt-3 pb-3" id="mainNav" style="background-color:#f37321">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="/"><img src="{{env('APP_URL')}}{{$information->logo_header}}"
                    style="max-width:100px;width:80px;" /></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse"
                style="border: none" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive"
                aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto my-2 my-lg-0">
                    <li class="nav-item" style="place-content: center;"><a class="nav-link" href="/">Home</a></li>
                    <li class="nav-item dropdown" style="place-content: center;">
                        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            Project
                        </a>
                        <div class="dropdown-menu dropdown-menu-end animate slideIn text-white fw-bold"
                            aria-labelledby="navbarDropdown">
                            @foreach($projects as $project)
                            <a class="dropdown-item" href="{{ route('projects.show', ['id' => $project->id]) }}">{{
                                $project->title }}</a>
                            @endforeach
                        </div>
                    </li>
                    <li class="nav-item" style="place-content: center;"><a class="nav-link" href="/contact_us">Contact
                            Us</a></li>
                    <li class="nav-item" style="place-content: center;"><a class="nav-link" href="/news">News</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="position-fixed bottom-0 end-0 mb-3 me-3" style="z-index: 999">
        <a title="Chat Whatsapp" href="{{$information->link_wa}}" target="_blank"
            class="d-inline-block rounded-full transition-all transform hover:scale-110 hover:rotate-12">
            <img class="object-cover object-center" style="width:70px;height:70px"
                src="{{ asset('assets/img/whatsapp.png') }}" alt="Saya mau pesan">
        </a>
    </div>
    @yield('content')

    <section class="py-2" id="developed_by" style="background-color:#eeeeef;text-align: center;">
        <div class="container">
            <div class="row" style="align-items: center;">
                <div class="col-sm-4 py-2 centering-text">
                    <h5 class="mb-2" style="font-weight: 400;font-size: 12pt">Developed & Constructed by :</h5>
                </div>
                <div class="col-sm-4 py-2 centering-text">
                    <img src="{{asset('assets/img/Mup3.png')}}" style="width:80%" />
                </div>
                <div class="col-sm-4 py-2 centering-text">
                    <img src="{{asset('assets/img/Muk3.png')}}" style="width:75%" />
                </div>
            </div>
        </div>
    </section>

    @if(!empty($information->footer_image))
    <footer
        style="background-image: url({{env('APP_URL')}}{{$information->footer_image}}); background-size: cover; background-attachment: fixed; position: relative;background-position:center"
        id="contactForm">
        <div class="footer-overlay"
            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.7); z-index: 1;">
        </div>
        <div class="container" style="position: relative; z-index: 2;">
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-5" style="align-content: center;">
                            <img src="{{env('APP_URL')}}{{$information->logo_header}}" class="px-3 py-2 my-1"
                                style="width:50%" />
                            <div class="col-sm-12 px-3 pb-3">
                                <p class="text-white fw-bold">{{$information->name}}</p>
                                <table class="table table-borderless" style="border-color: transparent!important;">
                                    <tbody>
                                        <tr>
                                            <td class="py-0"><i class="bi bi-geo-alt-fill text-white"></i></td>
                                            <td class="text-white py-0">{{$information->address}}</td>
                                        </tr>
                                        <tr>
                                            <td class="py-0" style="align-content: center;">
                                                <i class="bi bi-telephone-fill text-white"></i>
                                            </td>
                                            <td class="text-white py-0" style="color:white!important">{!!
                                                \App\Helpers\PhoneFormatter::formatPhoneNumber($information->phone) !!}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="text-white pb-1">
                                    <thead>
                                        <tr>
                                            <th style="font-weight: 500!important">Follow us:</th>
                                            @if(!empty($information->instagram))
                                            <th>
                                                <a target="_blank" href="{{$information->instagram}}" class="ml-2">
                                                    <img src="{{asset('assets/img/Logo ig.png')}}"
                                                        class="social-icon" />
                                                </a>
                                            </th>
                                            @endif
                                            @if(!empty($information->youtube))
                                            <th>
                                                <a target="_blank" href="{{$information->youtube}}" class="ml-2">
                                                    <img src="{{asset('assets/img/Logo yt.png')}}"
                                                        class="social-icon" />
                                                </a>
                                            </th>
                                            @endif
                                            @if(!empty($information->facebook))
                                            <th>
                                                <a target="_blank" href="{{$information->facebook}}" class="ml-2">
                                                    <img src="{{asset('assets/img/Logo fb.png')}}"
                                                        class="social-icon" />
                                                </a>
                                            </th>
                                            @endif
                                            @if(!empty($information->tiktok))
                                            <th>
                                                <a target="_blank" href="{{$information->tiktok}}" class="ml-2">
                                                    <img src="{{asset('assets/img/Logo tiktok.png')}}"
                                                        class="social-icon" />
                                                </a>
                                            </th>
                                            @endif
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        <div class="col-sm-2">
                        </div>
                        <div class="col-sm-5 my-3">
                            <h5 class="text-white pl-2 pb-0 fw-bold my-0">Brocure & Contact Form :</h5>
                            <p class="text-white pl-2 pb-0 my-0">Fill form to get the brochure</p>
                            <div class="row" style="place-content: center">
                                @if(session('success'))
                                <div class="alert alert-success m-2"
                                    style="color:white;font-weight:bold;background:#31a72b!important">
                                    {{ session('success') }}
                                </div>
                                @if(session('brochureUrl'))
                                <script>
                                    window.open("{{ session('brochureUrl') }}", '_blank');
                                </script>
                                @endif
                                @endif
                                @if(session('error'))
                                <div class="alert alert-danger m-2"
                                    style="color:white;background:#cd2a2a;font-weight:bold">
                                    {{ session('error') }}
                                </div>
                                @endif
                                <form method="POST" action="{{ route('footerForm.store') }}" class="row g-2 mt-2"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-floating">
                                            <input class="form-control form-control-sm" id="name" name="name"
                                                type="text" placeholder="Enter your Name..."
                                                data-sb-validations="required" required />
                                            <label for="name" class="fw-bold"
                                                style="color:#495057; font-size: small;">Nama<span
                                                    style="color:red">*</span></label>
                                            <div class="invalid-feedback" data-sb-feedback="name:required">A name is
                                                required.</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-floating">
                                            <input class="form-control form-control-sm" id="handphone" name="handphone"
                                                type="phone" placeholder="62 987 654 321"
                                                data-sb-validations="required,handphone" required />
                                            <label for="handphone" class="fw-bold"
                                                style="color:#495057; font-size: small;">Handphone<span
                                                    style="color:red">*</span></label>
                                            <div class="invalid-feedback" data-sb-feedback="handphone:required">A
                                                handphone is required.</div>
                                            <div class="invalid-feedback" data-sb-feedback="handphone:email">Handphone
                                                is not valid.</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-floating">
                                            <input class="form-control form-control-sm" id="email" name="email"
                                                type="email" placeholder="example@gmail.com"
                                                data-sb-validations="required,email" required />
                                            <label for="email" class="fw-bold"
                                                style="color:#495057; font-size: small;">Email<span
                                                    style="color:red">*</span></label>
                                            <div class="invalid-feedback" data-sb-feedback="email:required">An email is
                                                required.</div>
                                            <div class="invalid-feedback" data-sb-feedback="email:email">Email is not
                                                valid.</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-floating">
                                            <input class="form-control form-control-sm" id="subject" name="subject"
                                                type="text" placeholder="Enter your subject..." />
                                            <label for="subject" class="fw-bold"
                                                style="color:#495057; font-size: small;">Subject</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-floating">
                                            <textarea class="form-control form-control-sm" name="message" id="message"
                                                type="text" placeholder="Enter your message here..."
                                                style="height: 4rem;" data-sb-validations="required"
                                                required></textarea>
                                            <label for="message" class="fw-bold"
                                                style="color:#495057; font-size: small;">Message<span
                                                    style="color:red">*</span></label>
                                            <div class="invalid-feedback" data-sb-feedback="message:required">A message
                                                is required.</div>
                                        </div>
                                    </div>
                                    <div class="col-8 d-grid">
                                        <button class="btn btn-sm py-1 fw-bold"
                                            style="background-color:white;color:#f37321;width:50%" id="submitButton"
                                            type="submit"><span>SUBMIT</span></button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="text-center text-white py-2">
                        © {{ date('Y') }} Copyright PT. Mitra Usaha Propertindo All Right reserved
                    </div>
                </div>
            </div>
        </div>
    </footer>
    @else
    <footer style="background:#f37321" id="contactForm">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-5" style="align-content: center;">
                            <img src="{{env('APP_URL')}}{{$information->logo_header}}" class="px-3 py-2 my-1"
                                style="width:50%" />
                            <div class="col-sm-12 px-3 pb-3">
                                <p class="text-white fw-bold">{{$information->name}}</p>
                                <table class="table table-borderless" style="border-color: transparent!important;">
                                    <tbody>
                                        <tr>
                                            <td class="py-0"><i class="bi bi-geo-alt-fill text-white"></i></td>
                                            <td class="text-white py-0">{{$information->address}}</td>
                                        </tr>
                                        <tr>
                                            <td class="py-0" style="align-content: center;">
                                                <i class="bi bi-telephone-fill text-white"></i>
                                            </td>
                                            <td class="text-white py-0" style="color:white!important">{!!
                                                \App\Helpers\PhoneFormatter::formatPhoneNumber($information->phone) !!}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="text-white pb-1">
                                    <thead>
                                        <tr>
                                            <th style="font-weight: 500!important">Follow us:</th>
                                            @if(!empty($information->instagram))
                                            <th>
                                                <a target="_blank" href="{{$information->instagram}}" class="ml-2">
                                                    <img src="{{asset('assets/img/Logo ig.png')}}"
                                                        class="social-icon" />
                                                </a>
                                            </th>
                                            @endif
                                            @if(!empty($information->youtube))
                                            <th>
                                                <a target="_blank" href="{{$information->youtube}}" class="ml-2">
                                                    <img src="{{asset('assets/img/Logo yt.png')}}"
                                                        class="social-icon" />
                                                </a>
                                            </th>
                                            @endif
                                            @if(!empty($information->facebook))
                                            <th>
                                                <a target="_blank" href="{{$information->facebook}}" class="ml-2">
                                                    <img src="{{asset('assets/img/Logo fb.png')}}"
                                                        class="social-icon" />
                                                </a>
                                            </th>
                                            @endif
                                            @if(!empty($information->tiktok))
                                            <th>
                                                <a target="_blank" href="{{$information->tiktok}}" class="ml-2">
                                                    <img src="{{asset('assets/img/Logo tiktok.png')}}"
                                                        class="social-icon" />
                                                </a>
                                            </th>
                                            @endif
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        <div class="col-sm-2">
                        </div>
                        <div class="col-sm-5 my-3">
                            <h5 class="text-white pl-2 pb-0 fw-bold my-0">Brocure & Contact Form :</h5>
                            <p class="text-white pl-2 pb-0 my-0">Fill form to get the brochure</p>
                            <div class="row" style="place-content: center">
                                @if(session('success'))
                                <div class="alert alert-success m-2"
                                    style="color:white;font-weight:bold;background:#31a72b!important">
                                    {{ session('success') }}
                                </div>
                                @if(session('brochureUrl'))
                                <script>
                                    window.open("{{ session('brochureUrl') }}", '_blank');
                                </script>
                                @endif
                                @endif
                                @if(session('error'))
                                <div class="alert alert-danger m-2"
                                    style="color:white;background:#cd2a2a;font-weight:bold">
                                    {{ session('error') }}
                                </div>
                                @endif
                                <form method="POST" action="{{ route('footerForm.store') }}" class="row g-2 mt-2"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-floating">
                                            <input class="form-control form-control-sm" id="name" name="name"
                                                type="text" placeholder="Enter your Name..."
                                                data-sb-validations="required" required />
                                            <label for="name" class="fw-bold"
                                                style="color:#495057; font-size: small;">Nama<span
                                                    style="color:red">*</span></label>
                                            <div class="invalid-feedback" data-sb-feedback="name:required">A name is
                                                required.</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-floating">
                                            <input class="form-control form-control-sm" id="handphone" name="handphone"
                                                type="phone" placeholder="62 987 654 321"
                                                data-sb-validations="required,handphone" required />
                                            <label for="handphone" class="fw-bold"
                                                style="color:#495057; font-size: small;">Handphone<span
                                                    style="color:red">*</span></label>
                                            <div class="invalid-feedback" data-sb-feedback="handphone:required">A
                                                handphone is required.</div>
                                            <div class="invalid-feedback" data-sb-feedback="handphone:email">Handphone
                                                is not valid.</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-floating">
                                            <input class="form-control form-control-sm" id="email" name="email"
                                                type="email" placeholder="example@gmail.com"
                                                data-sb-validations="required,email" required />
                                            <label for="email" class="fw-bold"
                                                style="color:#495057; font-size: small;">Email<span
                                                    style="color:red">*</span></label>
                                            <div class="invalid-feedback" data-sb-feedback="email:required">An email is
                                                required.</div>
                                            <div class="invalid-feedback" data-sb-feedback="email:email">Email is not
                                                valid.</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-floating">
                                            <input class="form-control form-control-sm" id="subject" name="subject"
                                                type="text" placeholder="Enter your subject..." />
                                            <label for="subject" class="fw-bold"
                                                style="color:#495057; font-size: small;">Subject</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-floating">
                                            <textarea class="form-control form-control-sm" name="message" id="message"
                                                type="text" placeholder="Enter your message here..."
                                                style="height: 4rem;" data-sb-validations="required"
                                                required></textarea>
                                            <label for="message" class="fw-bold"
                                                style="color:#495057; font-size: small;">Message<span
                                                    style="color:red">*</span></label>
                                            <div class="invalid-feedback" data-sb-feedback="message:required">A message
                                                is required.</div>
                                        </div>
                                    </div>
                                    <div class="col-8 d-grid">
                                        <button class="btn btn-sm py-1 fw-bold"
                                            style="background-color:white;color:#f37321;width:50%" id="submitButton"
                                            type="submit"><span>SUBMIT</span></button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="text-center text-white py-2">
                        © {{ date('Y') }} Copyright PT. Mitra Usaha Propertindo All Right reserved
                    </div>
                </div>
            </div>
        </div>
    </footer>
    @endif

    <script src="{{asset('assets/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/slick/slick.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('assets/js/scripts.js')}}"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- elevateZoom JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/elevatezoom/3.0.8/jquery.elevatezoom.min.js"></script>

    @yield('jquery')

    <script>
        AOS.init();

        var toTopButton = document.getElementById("to-top-button");

        window.onscroll = function () {
            if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
                toTopButton.classList.remove("d-none");
            } else {
                toTopButton.classList.add("d-none");
            }
        }

        function goToTop() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        document.addEventListener("DOMContentLoaded", function () {
            var myCarousel = document.querySelector('#carouselExampleSlidesOnly')
            var carousel = new bootstrap.Carousel(myCarousel, {
                interval: 3000, // Adjust the interval as needed (in milliseconds)
                wrap: true
            })
        });

        document.addEventListener('DOMContentLoaded', function () {
            const portfolioItems = document.querySelectorAll('.portfolio-item');
            const loadMoreBtn = document.getElementById('loadMoreBtn');
            let visibleItems = 6;
            let totalDisplayedItems = 0;

            // Initially hide all items beyond visibleItems
            portfolioItems.forEach((item, index) => {
                if (index >= visibleItems) {
                    item.style.display = 'none';
                } else {
                    totalDisplayedItems++;
                }
            });
                // Initially hide the Load More button if there are 6 or fewer portfolio items
                if (portfolioItems.length <= 6) {
                    loadMoreBtn.style.display = 'none';
                }

            loadMoreBtn.addEventListener('click', function () {
                let newlyDisplayedItems = 0;

                // Show next batch of items or remaining items if less than a full batch
                for (let i = totalDisplayedItems; i < portfolioItems.length && newlyDisplayedItems < 6; i++) {
                    portfolioItems[i].style.display = 'block';
                    totalDisplayedItems++;
                    newlyDisplayedItems++;
                }

                // Hide Load More button if all items are displayed
                if (totalDisplayedItems >= portfolioItems.length) {
                    loadMoreBtn.style.display = 'none';
                }
            });
        });

        document.addEventListener('DOMContentLoaded', function () {
            const checkbox = document.getElementById('flexCheckChecked');
            const submitButton = document.getElementById('submitButton');

            checkbox.addEventListener('change', function () {
                if (checkbox.checked) {
                    submitButton.disabled = false;
                } else {
                    submitButton.disabled = true;
                }
            });
        });
    </script>

    <script>
        let mybutton = document.getElementById("btn-back-to-top");

        window.onscroll = function() {
            scrollFunction();
        };

        function scrollFunction() {
            if (
                document.body.scrollTop > 20 ||
                document.documentElement.scrollTop > 20
            ) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }

        mybutton.addEventListener("click", backToTop);

        function backToTop() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }

        setTimeout(function() {
            document.getElementById('overlayer').style.display = 'none';
            document.getElementById('content').style.display = 'block';
            mybutton.style.display = "block"; // Show the back to top button when content is loaded
        }, 3000);
    </script>
</body>

</html>