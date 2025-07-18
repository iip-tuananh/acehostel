@extends('site.layouts.master')
@section('title')Contact - {{ $config->web_title }}@endsection
@section('description'){{ strip_tags(html_entity_decode($config->introduction)) }}@endsection
@section('image'){{ @$config->image->path ?? '' }}@endsection

@section('css')
    <style>
        .invalid-feedback {
            display: none;
            width: 100%;
            margin-top: 0.25rem;
            font-size: 100%;
            color: #dc3545;
        }

        .d-block
        {
            display: block !important;
        }
    </style>

    <style>
        .send-success-message {
            display: flex;
            align-items: center;
            background-color: #e6ffed;     /* nền xanh nhạt */
            border: 1px solid #71d58b;      /* viền xanh tươi */
            color: #2d6a4f;                 /* chữ xanh đậm */
            padding: 12px 16px;
            border-radius: 8px;
            font-size: 1rem;
            gap: 12px;                      /* khoảng cách icon - text */
            box-shadow: 0 2px 6px rgba(0,0,0,0.05);
            margin-bottom: 10px;
        }

        .send-success-message i {
            font-size: 1.4rem;
        }

        .send-success-message p {
            margin: 0;
            line-height: 1.4;
        }
    </style>
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
                    <h2>Contact</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- END / SUB BANNER -->

    <!-- CONTACT -->
    <section class="section-contact" ng-controller="AboutPage">
        <div class="container">
            <div class="contact">
                <div class="row">

                    <div class="col-md-6 col-lg-5">

                        <div class="text">
                            <h2>Contact</h2>
                            <p>{{ $config->introduction }}</p>
                            <ul>
                                <li><i class="icon lotus-icon-location"></i> {{ $config->address_company }}</li>
                                <li><i class="icon lotus-icon-phone"></i> {{ $config->hotline }}</li>
                                <li><i class="icon fa fa-envelope-o"></i> {{ $config->email }} </li>
                            </ul>
                        </div>


                    </div>

                    <div class="col-md-6 col-lg-6 col-lg-offset-1">
                        <div class="contact-form">
                            <form id="form-contact">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="text" class="field-text"  name="name" placeholder="Họ tên *">
                                        <div class="invalid-feedback d-block" ng-if="errors['name']"><% errors['name'][0] %></div>

                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="field-text" name="phone" placeholder="Số điện thoại *">
                                        <div class="invalid-feedback d-block" ng-if="errors['phone']"><% errors['phone'][0] %></div>
                                    </div>
                                    <div class="col-sm-12">
                                        <textarea cols="30" rows="10" name="message"  class="field-textarea" placeholder="Tin nhắn *"></textarea>
                                        <div class="invalid-feedback d-block" ng-if="errors['message']"><% errors['message'][0] %></div>
                                    </div>
                                    <div class="col-sm-12" ng-if="sendSuccess">
                                        <div class="space10"></div> <br>
                                        <div class="send-success-message">
                                            <p style="padding-bottom: 0px">Cảm ơn bạn đã để lại lời nhắn. Tin nhắn đã được gửi</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <button type="button" class="awe-btn awe-btn-13" ng-click="submitContact()">Gửi tin nhắn</button>
                                    </div>
                                </div>
                                <div id="contact-content"></div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- END / CONTACT -->
@endsection

@push('scripts')
    <script>
        app.controller('AboutPage', function ($rootScope, $scope, $sce, $interval) {
            $scope.errors = [];
            $scope.sendSuccess = false;

            $scope.submitContact = function () {
                var url = "{{route('front.submitContact')}}";
                var data = jQuery('#form-contact').serialize();
                $scope.loading = true;
                jQuery.ajax({
                    type: 'POST',
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': CSRF_TOKEN
                    },
                    data: data,
                    success: function (response) {
                        if (response.success) {
                            toastr.success(response.message);
                            jQuery('#form-contact')[0].reset();
                            $scope.errors = [];
                            $scope.sendSuccess = true;
                            $scope.$apply();
                        } else {
                            $scope.errors = response.errors;
                            toastr.warning(response.message);
                        }
                    },
                    error: function () {
                        toastr.error('Đã có lỗi xảy ra');
                    },
                    complete: function () {
                        $scope.loading = false;
                        $scope.$apply();
                    }
                });
            }
        })

    </script>
@endpush
