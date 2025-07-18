@extends('site.layouts.master')

@section('title'){{ $config->web_title }}@endsection
@section('description'){{ strip_tags(html_entity_decode($config->introduction)) }}@endsection
@section('image'){{@$config->image->path ?? ''}}@endsection

@section('css')

@endsection


@section('content')
    <!-- BANNER SLIDER -->
    <style>
        .banner-slide {
            position: relative;
        }

        .banner-slide img {
            width: 100%;
            display: block;
        }

        .banner-slide .banner-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.3);
            z-index: 1;
        }


        .tp-caption {
            z-index: 2 !important;
            position: relative;
            color: #fff;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.6);
        }

        .slider-caption-wrap {
            z-index: 2 !important;
            text-align: center;
            color: #fff;
            line-height: 1.4;
            display: flex;
            flex-direction: column;
            gap: 32px;
        }

        .slider-caption-1 {
            font-size: 56px;
            font-weight: bold;
        }

        .slider-caption-sub-1 {
            font-size: 28px;
        }

        /* Mobile responsive */
        @media (max-width: 767px) {
            .slider-caption-1 {
                font-size: 20px;
            }

            .slider-caption-sub-1 {
                font-size: 14px;
            }

            .slider-caption-wrap {
                gap: 22px; /* vẫn đảm bảo khoảng cách rõ ràng trên mobile */
            }
        }

    </style>
    <section class="section-slider">
        <h1 class="element-invisible">Slider</h1>
        <div id="slider-revolution">
            <ul>
                @foreach($banners as $banner)
                    <li data-transition="fade" class="banner-slide">
                        <img src="{{ $banner->image->path ?? '' }}" data-bgposition="left center" data-duration="14000" data-bgpositionend="right center" alt="">
                        <div class="banner-overlay"></div>
{{--                        <div class="tp-caption sft fadeout slider-caption-sub slider-caption-1" data-x="center" data-y="240" data-speed="700" data-start="1500" data-easing="easeOutBack">--}}
{{--                            {{ $banner->title }}--}}
{{--                        </div>--}}

{{--                        <div class="tp-caption sfb fadeout slider-caption slider-caption-sub-1" data-x="center" data-y="280" data-speed="700" data-easing="easeOutBack"  data-start="2000">--}}
{{--                            {{ $banner->intro }}--}}
{{--                        </div>--}}

                        <div class="tp-caption slider-caption-wrap" data-x="center" data-y="center" data-speed="700" data-start="1500" data-easing="easeOutBack">
                            <div class="slider-caption-1">{{ $banner->title }}</div>
                            <div class="slider-caption-sub-1">{{ $banner->intro }}</div>
                        </div>

                    </li>
                @endforeach

            </ul>
        </div>

    </section>
    <!-- END / BANNER SLIDER -->

    <!-- ACCOMD ODATIONS -->
    <style>
        .accomd-modations-slide_1 {
            display: flex;
            flex-wrap: wrap;
            gap: 24px;
        }

        .accomd-modations-room_1 {
            flex: 1 1 calc(33.333% - 24px);
            display: flex;
            flex-direction: column;
            /*border: 1px solid #ddd;*/
            background: #fff;
            box-sizing: border-box;
        }

        .accomd-modations-room_1 .img {
            position: relative;
            padding-top: 66.66%;
            overflow: hidden;
        }

        .accomd-modations-room_1 .img img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }


        .accomd-modations-room_1 .text {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            padding: 8px;
            box-sizing: border-box;
        }

        .accomd-modations-room_1 .wrap-price {
            margin: 0 -8px -8px;
            padding: 0 8px;
            height: 50px;
            border-top: 1px solid #9a9a9a;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-sizing: border-box;
        }


        .accomd-modations-room_1 .desc {
            font-size: 14px;
            color: #555;
            line-height: 1.5;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            min-height: 66px;
        }



        .wrap-price {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 12px;
            margin-top: 16px;
            border-top: 1px solid #ddd;
        }

        .wrap-price .price {
            color: #A21820 !important; /* đỏ nổi bật */
            font-weight: bold;
            font-size: 1.2rem;
            margin: 0;
        }

        .wrap-price a {
            padding: 6px 12px;
            border: 1px solid #333;
            border-radius: 4px;
            color: #A21820;
            font-size: 0.9rem;
            text-decoration: none;
            transition: 0.2s;
        }

        .wrap-price a:hover {
            background-color: #333;
            color: #fff;
        }

    </style>
    @foreach($categoriesSpecial as $cateSpecial)
        <section class="section-accommo_1">
            <div class="container">

                <div class="accomd-modations_1">

                    <h2 class="heading">{{ $cateSpecial->name }}</h2>

                    <div class="accomd-modations-content_1" >

                        <div class="accomd-modations-slide_1" >
                            @foreach($cateSpecial->rooms as $room)
                                <div class="accomd-modations-room_1">

                                    <div class="img">
                                        <a href="{{ route('front.getRoom', $room->slug) }}"><img src="{{ $room->image->path ?? '' }}" alt=""></a>
                                    </div>

                                    <div class="text" style="margin-top: 0 !important;">
                                        <h2><a href="{{ route('front.getRoom', $room->slug) }}">{{ $room->name }}</a></h2>
                                        <p class="desc">
                                            {{ $room->intro }}
                                        </p>
                                        <div class="wrap-price">
                                            <p class="price">
                                                {{ $room->price }}
                                            </p>
                                            <a href="{{ route('front.getRoom', $room->slug) }}" class="awe-btn awe-btn-default">Chi tiết</a>
                                        </div>

                                    </div>

                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>

            </div>
        </section>

    @endforeach
    <!-- END / ACCOMD ODATIONS -->

    <section class="ot-about mt60">
        <div class="container">
            <div class="content">
                <div class="row">
                    <div class="col col-xs-12 col-lg-6 col-lg-offset-3">
                        <div class="ot-heading mb40 row-20 text-center">
                            <h2>{{ $about->title_2 }}</h2>
                            <p class="sub pr10 pl10">
                                {{ $about->title_1 }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="img-hover-box mb40">
                    <div class="img">
                        <img class="img-responsive" src="{{ $about->image->path ?? '' }}" alt="">
                    </div>
                </div>
                <div class="text-center mt40 mb30 featured">
                    <p class="font-hind f-500 f20"> {{ $about->intro_text }} </p>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-10 col-sm-offset-1">
                        <div class="details">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12">
                                    <p class="font-hind f16 pr15">
                                       {{ $about->body_text }}
                                    </p>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- OUR BEST -->
    <section class="ot-out-best mt60">
        <div class="container">
            <div class="content">
                <div class="row">
                    <div class="col col-xs-12 col-lg-6 col-lg-offset-3">
                        <div class="ot-heading mb40 row-20 text-center">
                            <h2>Tiện ích</h2>
                        </div>
                    </div>
                </div>
                <div class="owl-single owl-best" data-single_item="false" data-desktop="6"
                     data-small_desktop="4"
                     data-tablet="3" data-mobile="2"
                     data-nav="true"
                     data-pagination="false">


                    @foreach($amenities as $amenity)
                        <div class="item text-center">
                            <img class="img-responsive mb10" src="{{ $amenity->image->path ?? '' }}" alt="icon">
                            <span class="font-hind f-500">{{ $amenity->title }}</span>
                        </div>

                    @endforeach

                </div>
            </div>
        </div>
    </section>
    <!-- END / OUR BEST -->

    <style>
        .room-item-style-2 {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .room-item-style-2 .outer {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .room-item-style-2 img {
            height: 520px;
            object-fit: cover;
            width: 100%;
        }

        .room-item-style-2 .bgr {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 20px;
            background-color: #000;
            color: #fff;
        }

        .room-item-style-2 .info p {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            min-height: 66px;
        }

    </style>

    <style>
        @media (max-width: 767px) {
            .room-item-style-2 {
                margin-bottom: 20px !important;
            }

            .room-item-style-2 img {
                height: 180px !important;
                object-fit: cover !important;
            }

            .room-item-style-2 .bgr {
                padding: 16px !important;
                font-size: 14px !important;
            }

            .room-item-style-2 .title {
                font-size: 16px !important;
            }

            .room-item-style-2 .info p {
                font-size: 13px !important;
                -webkit-line-clamp: 4 !important;
            }

            .room-item-style-2 .awe-btn {
                font-size: 13px !important;
                padding: 8px 12px !important;
            }

            .owl-item {
                padding-left: 8px !important;
                padding-right: 8px !important;
            }
        }

    </style>
    <section class="ot-accomd-modations">
        <div class="container">
            <div class="content">
                <div class="row">
                    <div class="col-xs-12 col-lg-6 col-lg-offset-3">
                        <div class="ot-heading pt80 pb30 text-center row-20">
                            <h2 class="mb15">Dịch vụ</h2>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12">
                        <div class="ot-accomd-modations-content owl-single"
                             data-single_item="false"
                             data-desktop="1"
                             data-small_desktop="1"
                             data-tablet="2"
                             data-mobile="1"
                             data-nav="false"
                             data-pagination="false">
                            <div class="row">
                                @foreach($services as $service)
                                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                                        <div class="item room-item-style-2 mb30 text-center">
                                            <div class="outer">
                                                <a href="javascript:void(0)"><img class="img-responsive img-full"
                                                                 src="{{ $service->image->path ?? '' }}" alt=""></a>
                                                <div class="bgr pt20 pb20">
                                                    <div class="details">
                                                        <h4 class="title upper"><a href="javascript:void(0)">{{ $service->name }}</a></h4>

                                                        <div class="info">
                                                            <p class="mt20 mb40">{{ $service->description }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach

                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- GALLERY -->
    <style>
        .gallery_item {
            position: relative;
            width: 100%;
            aspect-ratio: 4 / 3; /* hoặc dùng padding trick nếu không có aspect-ratio */
            overflow: hidden;
            background-color: #eee;
        }

        .gallery_item img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* quan trọng để đồng đều */
            display: block;
        }

        /* Container isotope/grid */
        .isotope-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 16px;
        }

    </style>
    <section class="section-gallery bg-white">

        <div class="gallery  no-padding">
            <h2 class="heading text-center">Photo</h2>

            <!-- FILTER -->
            <div class="gallery-cat text-center">
                <ul class="list-inline">
                    <li class="active"><a href="javascript:void(0)" data-filter="*">All</a></li>
                    @foreach($activites as $activity)
                        <li><a href="javascript:void(0)" data-filter=".group{{$activity->id}}">{{$activity->title}}</a></li>
                    @endforeach
                </ul>
            </div>
            <!-- END / FILTER -->

            <!-- GALLERY CONTENT -->
            <div class="gallery-content hover-img">
                <div class="row">
                    <div class="gallery-isotope col-6 pd-0">

                        <!-- ITEM SIZE -->
                        <div class="item-size"></div>
                        <!-- END / ITEM SIZE -->
                        <!-- ITEM -->
                        <div class="isotope-container">
                            @foreach($allImageGallery as $gallery)
                                <div class="item-isotope group{{$gallery->activity_id }}">
                                    <div class="gallery_item">
                                        <a  href="{{ $gallery->image->path ?? '' }}" class="gallery-popup mfp-image" title="{{ $gallery->activity->title ?? '' }}">
                                            <img src="{{ $gallery->image->path ?? '' }}" alt="">
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>


                    </div>
                </div>
            </div>
            <!-- GALLERY CONTENT -->

        </div>
    </section>
    <!-- END / GALLERY -->
@endsection
@push('scripts')

@endpush
