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


<div style="height: 50%; min-height: 40%; background-image: url('{{env('APP_URL')}}{{$contact_information->header}}'); background-size: cover;">
</div>
<div style="background-color:#eeeeef">
    <div class="pt-3">
        <div class="container">
            <div class="row py-3 px-4">
                <div class="col-sm-12">
                    <h2 class="fw-bold text-left py-4">{{$contact_information->title}}</h2>
                    <hr class="divider divider-black" style="margin: 1rem 0;" />
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