@extends('site.layouts.master')

@section('title'){{ $room->name }} - Pod Room - {{ $config->web_title }}@endsection
@section('description'){{ strip_tags(html_entity_decode($config->introduction)) }}@endsection
@section('image'){{ @$room->image_back->path ?? ''}}@endsection

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
    <section class="section-sub-banner" style="background-image: url({{ $room->image_back->path ?? '' }})">
        <div class="awe-overlay"></div>
        <div class="sub-banner">
            <div class="container">
                <div class="text text-center">
                    <h2>{{ $room->name }}</h2>
                    <p>Hãy tận hưởng khoảng thời gian thật thoải mái tại khách sạn của chúng tôi.</p>
                </div>
            </div>

        </div>

    </section>
    <!-- END / SUB BANNER -->

    <!-- ROOM DETAIL -->
    <section class="section-room-detail bg-white">
        <div class="container">

            <!-- DETAIL -->
            <div class="room-detail">
                <div class="row">
                    <div class="col-lg-9">

                        <!-- LAGER IMGAE -->
                        <div class="room-detail_img">
                            @foreach($room->galleries as $gallery)
                                <div class="room_img-item">
                                    <img src="{{ $gallery->image->path ?? '' }}" alt="">
                                </div>
                            @endforeach

                        </div>
                        <!-- END / LAGER IMGAE -->

                        <!-- THUMBNAIL IMAGE -->
                        <div class="room-detail_thumbs">
                            @foreach($room->galleries as $gallery)
                                <a href="#"><img src="{{ $gallery->image->path ?? '' }}" alt=""></a>
                            @endforeach
                        </div>
                        <!-- END / THUMBNAIL IMAGE -->

                    </div>

                    <div class="col-lg-3">

                        <!-- FORM BOOK -->
                        <div class="room-detail_book">

                            <div class="room-detail_total">
                                <img src="/site/images/icon-logo.png" alt="" class="icon-logo">

                                <h6>Bắt đầu thuê từ</h6>

                                <p class="price">
                                    <span class="amout" style="font-size: 20px !important;">{{ $room->price }}</span>
                                </p>
                            </div>

                            <div class="room-detail_form">
                                <label>Diện tích</label> <span>{{ $room->area }}</span>

                                <label>Số khách tối đa</label> <span>{{ $room->maximum_occupancy }}</span>

                                <label>Giường ngủ</label> {{ $room->bedrooms }}


                                <button class="awe-btn awe-btn-13">Book Now</button>
                            </div>

                        </div>
                        <!-- END / FORM BOOK -->

                    </div>
                </div>
            </div>
            <!-- END / DETAIL -->

            <!-- TAB -->
            <div class="room-detail_tab">

                <div class="row">
                    <div class="col-md-3">
                        <ul class="room-detail_tab-header">
                            <li class="active"><a href="#overview" data-toggle="tab">Mô tả</a></li>
                            <li><a href="#amenities" data-toggle="tab">Tiện ích</a></li>
                        </ul>
                    </div>

                    <div class="col-md-9">
                        <div class="room-detail_tab-content tab-content">

                            <!-- OVERVIEW -->
                            <div class="tab-pane active fade in" id="overview">

                                <div class="room-detail_overview">
                                    <h5 class='text-uppercase'>
                                       {{ $room->name }}
                                    </h5>
                                    <p>
                                        {!! $room->description !!}
                                    </p>
                                </div>

                            </div>
                            <!-- END / OVERVIEW -->

                            <!-- AMENITIES -->
                            <div class="tab-pane fade in" id="amenities">

                                <div class="room-detail_amenities">

                                    {!! $room->amentis !!}

                                </div>

                            </div>
                            <!-- END / AMENITIES -->

                        </div>
                    </div>

                </div>

            </div>
            <!-- END / TAB -->

            <!-- COMPARE ACCOMMODATION -->
            <style>
                .room-compare_item {
                    display: flex;
                    flex-direction: column;
                    height: 100%;
                    border: 1px solid #eee;
                    box-sizing: border-box;
                    background: #fff;
                    overflow: hidden;
                }

                .room-compare_item .img {
                    width: 100%;
                    aspect-ratio: 4/3; /* hoặc dùng fixed height nếu không có support */
                    overflow: hidden;
                }

                .room-compare_item .img img {
                    width: 100%;
                    height: 100%;
                    object-fit: cover;
                    display: block;
                }

                .room-compare_item .text {
                    flex-grow: 1;
                    padding: 16px;
                    display: flex;
                    flex-direction: column;
                    justify-content: space-between;
                }

                .room-compare_item .text .awe-btn {
                    margin-top: auto;
                    align-self: flex-start;
                    font-size: 14px;
                    padding: 6px 12px;
                }

                .room-compare_item ul {
                    margin: 12px 0;
                    padding-left: 0;
                    list-style: none;
                }

                .room-compare_item ul li {
                    font-size: 14px;
                    margin-bottom: 4px;
                    line-height: 1.4;
                }

            </style>
            <div class="room-detail_compare">
                <h2 class="room-compare_title">Xem thêm các phòng khác</h2>

                <div class="room-compare_content">

                    <div class="row">
                        @foreach($otherRooms as $otherRoom)
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="room-compare_item">
                                <div class="img">
                                    <a href="{{ route('front.getRoom', $otherRoom->slug) }}"><img src="{{ $otherRoom->image->path ?? '' }}" alt=""></a>
                                </div>

                                <div class="text">
                                    <h2><a href="{{ route('front.getRoom', $otherRoom->slug) }}">{{ $otherRoom->name }}</a></h2>

                                    <ul>
                                        <li><i class="lotus-icon-size"></i>{{ $otherRoom->area }}</li>
                                        <li><i class="lotus-icon-person"></i>{{ $otherRoom->maximum_occupancy }}</li>
                                        <li><i class="lotus-icon-bed"></i> {{ $otherRoom->bedrooms }}</li>
                                    </ul>

                                    <a href="{{ route('front.getRoom', $otherRoom->slug) }}" class="awe-btn awe-btn-default">Chi tiết</a>

                                </div>

                            </div>
                        </div>
                        @endforeach
                    </div>

                </div>
            </div>
            <!-- END / COMPARE ACCOMMODATION -->

        </div>
    </section>
    <!-- END / SHOP DETAIL -->
@endsection

@push('scripts')
    <script>
    </script>
@endpush
