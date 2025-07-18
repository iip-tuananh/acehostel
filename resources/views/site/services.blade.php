@extends('site.layouts.master')

@section('title')Dịch vụ - {{ $config->web_title }}@endsection
@section('description'){{ strip_tags(html_entity_decode($config->introduction)) }}@endsection
@section('image'){{@$config->image->path ?? ''}}@endsection


@section('css')

@endsection

@section('content')
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
    <!-- SUB BANNER -->
    <section class="section-sub-banner" style="background-image: url({{ $banner->image->path ?? '' }})">
        <div class="awe-overlay"></div>
        <div class="sub-banner">
            <div class="container">
                <div class="text text-center">
                    <h2>Services</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- END / SUB BANNER -->

    <!-- ROOM -->
    <section class="section-room bg-white">
        <div class="container">

            <div class="room-wrap-2">
                @foreach($services as $index => $service)
                        <div class="room_item-2 {{ $index % 2 == 0 ? '' : 'img-right' }}">

                            <div class="img">
                                <a href="#"><img src="{{ $service->image->path ?? '' }}" alt=""></a>
                            </div>

                            <div class="text">
                                <h2><a href="#">{{ $service->name }}</a></h2>
                                <p>
                                    {{ $service->description }}
                                </p>
                            </div>
                        </div>
                @endforeach
            </div>

        </div>
    </section>
    <!-- END / ROOM -->

@endsection

@push('scripts')


@endpush
