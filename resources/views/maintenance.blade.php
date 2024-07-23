<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Java Residence</title>
    <link rel="icon" type="image/x-icon" href="{{env('APP_URL')}}{{$information->logo_favicon}}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <!--Font Awesome / Icon -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        type='text/css'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
    <link href="{{asset('assets/css/styles.css')}}" rel="stylesheet" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bs5-lightbox@1.8.3/dist/index.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- ElevateZoom -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/elevatezoom/3.0.8/jquery.elevatezoom.min.js"></script>

    <!-- Lightbox2 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>


    <style>
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

        .for-padding-left {
            width: 66.67%;
        }

        .mobile-only {}



        @media (max-width: 760px) {
            .for-padding-left {
                width: 100% !important;
            }

            .mobile-only {
                text-align: center !important;
            }
        }

        .btn:hover {
            color: #f37321 !important;
        }

        .btn-bla:hover {
            color: #ffffff !important;
        }

        .navbar::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 20px;
            /* Adjust the height of the red padding */
            background-color: #f37321;
            /* Set the color of the padding */
            z-index: -1;
            /* Ensure the pseudo-element is behind the navbar content */
        }

        .background-colored {
            background-color: rgba(0, 0, 0, 0.575);
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            width: 55%;
            /* 8/12 of the container's width */
            z-index: 0;
            /* Ensures that the background is behind the text */
        }

        .carousel-item .container {
            position: relative;
            z-index: 1;
            /* Ensures that the text is in front of the background */
        }

        .carousel-item .col-lg-8 {
            padding: 2rem;
            /* Adjust padding as needed */
        }

        .carousel-item .col-lg-8 .btn {
            margin-top: 1rem;
            /* Adjust margin as needed */
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

        .overlayer {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.9);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        .loader {
            text-align: center;
            display: block;
        }

        .logoloader {
            width: 100px;
            animation: bounce 2s infinite;
        }

        @keyframes bounce {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        #content {
            display: none;
        }

        #btn-back-to-top {
            display: none;
            position: fixed;
            bottom: 20px;
            left: 20px;
            z-index: 9999;
        }

        .ratio-16x9 {
            background: #e6e6e6 !important;
            color: black !important;
        }

        svg {
            overflow: hidden;
            vertical-align: middle;
            color: #111111 !important;
            opacity: 0 !important;
        }

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
    <section class="page-section" id="about"
        style="background-color:white;height: -webkit-fill-available;align-content: center;">
        <div class="container px-4 px-lg-5" style="align-content: center;">
            <div class="text-center mx-auto py-3">
                <img src="{{env('APP_URL')}}{{$information->logo_company}}" style="max-width:400px;width:300px;" />
                <hr class="divider divider-black" />
                <h2 class="mt-0 fw-bolder text-center">We are currently undergoing maintenance</h2>
                <h2 class="mt-0 fw-bolder text-center">We'll be back shortly. Thank you for your patience!</h2>
            </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
    <script src="{{asset('assets/js/scripts.js')}}"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </script>
    <!-- Lightbox2 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>

    <!-- elevateZoom JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/elevatezoom/3.0.8/jquery.elevatezoom.min.js"></script>

    <script>
        setTimeout(function() {
    document.getElementById('overlayer').style.display = 'none';
    document.getElementById('content').style.display = 'block';
    mybutton.style.display = "block"; // Show the back to top button when content is loaded
}, 3000);
    </script>
</body>

</html>