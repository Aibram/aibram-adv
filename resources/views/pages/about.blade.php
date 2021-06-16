@extends('layout.app')

@section('breadcrump')
    <div class="page-header" style="background: url({{asset('frontend/assets/img/hero-area.jpg')}})">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-wrapper">
                        <h2 class="product-title">من نحن ؟</h2>
                        <ol class="breadcrumb">
                            <li><a href="#">الرئيسية /</a></li>
                            <li class="current">من نحن ؟</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('content')
    <section id="about" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-6 col-xs-12">
                    <div class="about-wrapper">
                        <h2 class="intro-title">نبذة عننا</h2>
                        <p class="intro-desc">
                            هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد
                            هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو
                            العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها
                            التطبيق. إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص
                            العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي
                            أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه
                            الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة
                            حقيقية لتصميم الموقع.
                        </p>
                        <p class="intro-desc">
                            هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد
                            هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو
                            العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها
                            التطبيق. إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص
                            العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي
                            أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه
                            الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة
                            حقيقية لتصميم الموقع.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xs-12">
                    <img class="img-fluid aboutUs-img" src="{{asset('frontend/assets/img/about/about.jpg')}}" alt="" />
                </div>
            </div>
        </div>
    </section>
    <section class="aboutus section-padding">
        <div class="container">
            <div class="content">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="frame">
                                <img src="{{asset('frontend/assets/img/blog/img-1.jpg')}}" class="img-responsive" />
                            </div>
                            <h4>رؤيتنا</h4>
                            <p>
                                هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما
                                سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع
                                الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم
                                إيبسوم لأنها تعطي توزيعاَ طبيعياَ
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="frame">
                                <img src="{{asset('frontend/assets/img/blog/img-2.jpg')}}" class="img-responsive" />
                            </div>
                            <h4>هدفنا</h4>
                            <p>
                                مهناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما
                                سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع
                                الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم
                                إيبسوم لأنها تعطي توزيعاَ طبيعياَ
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="frame">
                                <img src="{{asset('frontend/assets/img/blog/img-3.jpg')}}" class="img-responsive" />
                            </div>
                            <h4>قيمتنا</h4>
                            <p>
                                مهناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما
                                سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع
                                الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم
                                إيبسوم لأنها تعطي توزيعاَ طبيعياَ
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="counter-section section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 work-counter-widget">
                    <div class="counter">
                        <div class="icon"><i class="lni-layers"></i></div>
                        <h2 class="counterUp">{{getSettings('adsCount','100')}}</h2>
                        <p>اعلان</p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 work-counter-widget">
                    <div class="counter">
                        <div class="icon"><i class="lni-users"></i></div>
                        <h2 class="counterUp">{{getSettings('usersCount','40')}}</h2>
                        <p>مستخدمين</p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 work-counter-widget">
                    <div class="counter">
                        <div class="icon"><i class="lni-briefcase"></i></div>
                        <h2 class="counterUp">{{getSettings('categoriesCount','15')}}</h2>
                        <p>صنف</p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 work-counter-widget">
                    <div class="counter">
                        <div class="icon"><i class="lni-map"></i></div>
                        <h2 class="counterUp">{{getSettings('ratingsCount','12')}}</h2>
                        <p>تقييم ايجابي</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('custom_js')
@endsection
