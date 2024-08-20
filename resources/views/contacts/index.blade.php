@extends('layouts.master')

@section('content')
<style>
    .custom-map {
        width: 1080px;
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


<div style="height: 50%; min-height: 40%; background-image: url('{{env('APP_URL')}}{{$contact_information->header}}'); background-size: cover;background-position: center;">
</div>
<div style="background-color:#eeeeef">
    <div class="page-section">
        <div class="container">
            <div class="row px-4">
                <div class="col-sm-12">
                    <div class="text-center mx-auto">
                        <h2 class="mt-0 fw-bolder">{{$contact_information->title}}</h2>
                        <hr class="divider divider-black" />
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row py-3 px-4">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-6">
                            {!! str_replace('<iframe', '<iframe class="custom-map"' , $information->google_map) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('jquery')

@endsection