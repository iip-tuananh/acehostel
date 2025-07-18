@extends('site.layouts.master')

@section('title')About us - {{ $config->web_title }}@endsection
@section('description'){{ strip_tags(html_entity_decode($config->introduction)) }}@endsection
@section('image'){{@$config->image->path ?? ''}}@endsection

@section('css')

@endsection

@section('content')
    <!-- SUB BANNER -->
    <style>
        .section-sub-banner {
            position: relative;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            padding: 80px 0;
            color: #fff;
        }

        .awe-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.4);
            z-index: 1;
        }

        .sub-banner {
            position: relative;
            z-index: 2;
        }

        .section-sub-banner h2 {
            font-size: 36px;
            font-weight: bold;
            margin: 0;
        }

        @media (max-width: 767px) {

            .section-sub-banner h2 {
                font-size: 24px;
            }
        }

    </style>


    <section class="section-sub-banner" style="background-image: url({{ $banner->image->path ?? '' }})">
        <div class="awe-overlay"></div>
        <div class="sub-banner">
            <div class="container">
                <div class="text text-center">
                    <h2>About us</h2>
                </div>
            </div>

        </div>

    </section>
    <!-- END / SUB BANNER -->

    <!-- ABOUT -->
    <section class="section-about">
        <div class="container">

            <div class="about">

                <!-- ITEM -->
                <div class="about-item">
                    <div class="text" style="width: 100% !important;">
                        {!! $config->web_des !!}
                    </div>

                </div>
                <!-- END / ITEM -->



            </div>

        </div>
    </section>
    <!-- END / ABOUT -->
@endsection

@push('scripts')
    <script>
    </script>

@endpush
