@extends('layout.frontend')
@section('content')
    <!-- ================ contact section start ================= -->
    <section class="contact-section">
        <div class="container">
            @if(isset($success_contact))
                <div class="alert alert-success {{$success_contact}} mb-4">Gửi thành công</div>
            @endif
            <div class="row">
                <div class="col-12">
                    <h2 class="contact-title">Liên hệ</h2>
                </div>
                <div class="col-lg-8">
                    <form class="form-contact contact_form" action="{{route('contact_send')}}" method="post" id="contactForm">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control w-100" name="message" id="message" required cols="30" rows="9" placeholder="Nhập nội dung"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control valid" name="name" id="name" required type="text" placeholder="Nhập tên">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control valid" name="email" id="email" required type="email" placeholder="Nhập email">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" name="subject" id="subject" required type="text" placeholder="Nhập tiêu đề">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="button button-contactForm boxed-btn">Gửi</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-3 ml-lg-3">
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-home"></i></span>
                        <div class="media-body">
                            <h3>TP.Hồ Chí Minh</h3>
                            <p>Đường 50 Hiệp Bình, Thử Đức</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                        <div class="media-body">
                            <h3>+1 234 567 8900</h3>
                            <p>Thứ 2 đến thứ 6 hàng tuần</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-email"></i></span>
                        <div class="media-body">
                            <h3>lehuyhieu@gmail.com</h3>
                            <p>Gửi cho chúng tôi thắc mắc của bạn</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ contact section end ================= -->
@stop
