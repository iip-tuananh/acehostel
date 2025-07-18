@extends('site.layouts.master')

@section('title')Pod Room - {{ $config->web_title }}@endsection
@section('description')
@endsection
@section('image')
@endsection

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
                    <h2>Pod Room</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- END / SUB BANNER -->

    <!-- ROOM -->
    <style>
        .room_item-1 {
            display: flex;
            flex-direction: column;
            height: 100%;
            border: 1px solid #eee;
            padding: 16px;
            box-sizing: border-box;
            background: #fff;
        }

        .room_item-1 .img {
            width: 100%;
            aspect-ratio: 4 / 3; /* hoặc dùng fixed height */
            overflow: hidden;
            margin-bottom: 12px;
        }

        .room_item-1 .img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .room_item-1 .desc {
            flex-grow: 1;
            font-size: 14px;
            color: #555;
            margin-bottom: 16px;
        }

        .room_item-1 .desc p {
            display: -webkit-box;
            -webkit-line-clamp: 3; /* chỉ hiển thị tối đa 3 dòng */
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            min-height: 66px;
        }

        .room_item-1 .bot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: auto;
        }

        @media (max-width: 767px) {
            .room_item-1 .bot {
                font-size: 14px; /* Giảm cỡ chữ chung */
                flex-direction: column; /* Nếu muốn các dòng xuống hàng trên màn nhỏ */
                gap: 8px;
                text-align: center;
            }

            .room_item-1 .bot .price {
                font-size: 13px; /* Cỡ chữ riêng cho giá */
            }

            .room_item-1 .bot .amout {
                font-weight: bold;
                font-size: 14px;
                color: #e91e63; /* Màu nổi bật */
            }

            .room_item-1 .bot .awe-btn {
                font-size: 13px;
                padding: 6px 12px;
            }
        }

    </style>
    <section class="section-room bg-white">
        <div class="container">

            <div class="room-wrap-1">
                <div class="row">
                    @foreach($rooms as $room)
                        <div class="col-md-6">
                            <div class="room_item-1">
                                <h2><a href="{{ route('front.getRoom', $room->slug) }}">{{ $room->name }}</a></h2>

                                <div class="img">
                                    <a href="{{ route('front.getRoom', $room->slug) }}"><img src="{{ $room->image->path ?? '' }}" alt=""></a>
                                </div>

                                <div class="desc">
                                    <p> {{ $room->intro }} </p>
                                </div>

                                <div class="bot">
                                    <span class="price">Bắt đầu thuê từ <span class="amout">{{ $room->price }}</span></span>
                                    <a href="{{ route('front.getRoom', $room->slug) }}" class="awe-btn awe-btn-13">Xem chi tiết</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>

        </div>
    </section>
    <!-- END / ROOM -->


@endsection

@push('scripts')
    <script>
    </script>
@endpush
