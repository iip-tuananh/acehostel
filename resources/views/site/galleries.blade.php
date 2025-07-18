@extends('site.layouts.master')

@section('title')Photos - {{ $config->web_title }}@endsection
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
    <section class="section-sub-banner bg-12" style="background-image: url({{ $banner->image->path ?? '' }})">
        <div class="awe-overlay"></div>
        <div class="sub-banner">
            <div class="container">
                <div class="text text-center">
                    <h2>Photos</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- END / SUB BANNER -->

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
    <section class="section_page-gallery">
        <div class="container">
            <div class="gallery">
                <h1 class="element-invisible">Gallery</h1>
                <!-- FILTER -->
                <div class="gallery-cat text-center">
                    <ul class="list-inline">
                        <li class="active"><a href="#" data-filter="*">All</a></li>
                        @foreach($activites as $activity)
                            <li><a href="#" data-filter=".group{{$activity->id}}">{{$activity->title}}</a></li>
                        @endforeach
                    </ul>
                </div>
                <!-- END / FILTER -->

                <!-- GALLERY CONTENT -->
                <div class="gallery-content">

                    <div class="row">
                        <div class="gallery-isotope col-4">

                            <!-- ITEM SIZE -->
                            <div class="item-size"></div>
                            <!-- END / ITEM SIZE -->
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
        </div>
    </section>
    <!-- END / GALLERY -->

@endsection

@push('scripts')


@endpush
