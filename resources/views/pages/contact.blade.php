@extends('layout.app')

@section('breadcrump')
    <div class="page-header" style="background: url(assets/img/hero-area.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-wrapper">
                        <h2 class="product-title">اتصل بنا</h2>
                        <ol class="breadcrumb">
                            <li><a href="#">الرئيسية /</a></li>
                            <li class="current">اتصل بنا</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('content')
    <section id="content" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-xs-12">
                    <form id="contactForm" class="contact-form" data-toggle="validator">
                        <h2 class="contact-title">ارسل رسالة لنا</h2>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="الاسم" required data-error="الاسم" />
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="email" placeholder="الهاتف"
                                                required data-error="الهاتف" />
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="msg_subject" name="subject"
                                                placeholder="الموضوع" required data-error="Please enter your subject" />
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea class="form-control" placeholder="رسالتك" rows="7"
                                                data-error=" رسالتك" required></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" id="submit" class="btn btn-common">
                                    ارسال
                                </button>
                                <div id="msgSubmit" class="h3 text-center hidden"></div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-12 col-md-4">
                    <div class="information">
                        <h3>بيانات التواصل</h3>
                        <div class="contact-datails">
                            <ul class="list-unstyled info">
                                <li>
                                    <span>البريد الالكتروني : </span>
                                    <p>
                                        <a href="#"><span class="__cf_email__"
                                                data-cfemail="c0b3b5b0b0afb2b480ada1a9aceea3afad">[email&#160;protected]</span></a>
                                    </p>
                                </li>
                                <li>
                                    <span>رقم الهاتف : </span>
                                    <p>555 444 66647 & 555 444 66647</p>
                                </li>
                                <li>
                                    <span> الواتساب : </span>
                                    <p>012 345 678 910</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        </div>
    </section>
@endsection

@section('custom_js')
@endsection
