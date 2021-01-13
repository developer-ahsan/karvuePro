@extends('layouts.app')
@section('content')

<section id="header-area" class="home-body">
    <div class="header-carousel myKenburns">
        <div class="contenet-image">
            <div class="container">
                <div class="row justify-content-center text-center">
                    <div class="col-md-8">
                        <h2 class="hero__title text-uppercase">Convey. Connect. Engage</h2>
                        <h3 class="hero__tag text-uppercase">The Performance-Driven Ad Platform for Brands</h3>
                        <a href="#" class="btn btn-outline-light">Learn More <span class="fa fa-arrow-right"></span></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="one-time hero--homepage">

            <div class="slick-s">
                <div class="hero__overlay"></div>
                <div class="hero-image">
                    <img src="{{asset('app-assets/images/header.jpg')}}" />
                </div>
            </div>
            <div class="slick-s">
                <div class="hero__overlay"></div>
                <div class="hero-image">
                    <img src="{{asset('app-assets/images/header1.jpg')}}" />
                </div>
            </div>
            <div class="slick-s">
                <div class="hero__overlay"></div>
                <div class="hero-image">
                    <img src="{{asset('app-assets/images/header2.jpg')}}" />
                </div>
            </div>
        </div>
    </div>
</section>
<section id="body-content" class="body-content">
    <div class="default-container">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-md-12">
                    <div class="content-info">
                        <h2>Your Message with <span>Wevertize</span> </h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam at nulla ut ligula egestas fringilla. Nam eget laoreet lectus, eget dapibus nibh. Donec odio urna, gravida tincidunt augue a, iaculis aliquam augue. Cras
                            volutpat lectus ac tincidunt feugiat. Nulla id bibendum tortor. </p>
                        <p>Nulla pharetra vel tortor non tincidunt. Ut fermentum lacus sit amet magna vehicula, sit amet commodo lorem posuere. Sed posuere id tortor ac tempor. </p>
                    </div>

                </div>
            </div>
        </div>
        <div class="container mt-3">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-4">
                    <div class="home-info">
                        <h2><span>Wevertize</span> Fleet Operators </h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam vel tincidunt tellus, non faucibus velit. Nullam in cursus risus. Fusce vulputate elit ultricies rhoncus commodo.</p>
                        <p>Aliquam vel tincidunt tellus, non faucibus velit. Nullam in cursus risus. </p>
                        <a href="#" class="btn btn-primary mt-2">Browse Fleet Operators</a>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="img-home"><img src="{{asset('app-assets/images/ads-home.png')}}" /></div>
                </div>
            </div>
        </div>
    </div>

</section>
<section class="gall-images">
    <div class="grid">
        <div class="grid-sizer"></div>
        <div class="grid-item">
            <figure class="effect-apollo">
                <img src="{{asset('app-assets/images/gallery4.jpg')}}" alt="img01" />
                <figcaption>
                    <h2>Nice <span>Lily</span></h2>
                    <p>Lily likes to play with crayons and pencils</p>
                    <a href="#">View more</a>
                </figcaption>
            </figure>
        </div>
        <div class="grid-item">
            <figure class="effect-apollo">
                <img src="{{asset('app-assets/images/gallery2.jpg')}}" alt="img02" />
                <figcaption>
                    <h2>Kmoves</h2>
                    <p>You can move anything</p>
                </figcaption>
            </figure>
        </div>
        <div class="grid-item">
            <figure class="effect-apollo">
                <img src="{{asset('app-assets/images/gallery3.jpg')}}" alt="img03" />
                <figcaption>
                    <h2>Travelling</h2>
                    <p>Travelling is to live</p>
                </figcaption>
            </figure>
        </div>
        <div class="grid-item">
            <figure class="effect-apollo">
                <img src="{{asset('app-assets/images/gallery1.jpg')}}" alt="img04" />
                <figcaption>
                    <h2>Travelling</h2>
                    <p>Travelling is to live</p>
                </figcaption>
            </figure>
        </div>
        <div class="grid-item">
            <figure class="effect-apollo">
                <img src="{{asset('app-assets/images/gallery5.jpg')}}" alt="img04" />
                <figcaption>
                    <h2>Travelling</h2>
                    <p>Travelling is to live</p>
                </figcaption>
            </figure>
        </div>
        <div class="grid-item">
            <figure class="effect-apollo">
                <img src="{{asset('app-assets/images/gallery6.jpg')}}" alt="img03" />
                <figcaption>
                    <h2>Travelling</h2>
                    <p>Travelling is to live</p>
                </figcaption>
            </figure>
        </div>
        <div class="grid-item">
            <figure class="effect-apollo">
                <img src="{{asset('app-assets/images/gallery7.jpg')}}" alt="img02" />
                <figcaption>
                    <h2>Kmoves</h2>
                    <p>You can move anything</p>
                </figcaption>
            </figure>
        </div>
        <div class="grid-item">
            <figure class="effect-apollo">
                <img src="{{asset('app-assets/images/gallery8.jpg')}}" alt="img01" />
                <figcaption>
                    <h2>Nice <span>Lily</span></h2>
                    <p>Lily likes to play with crayons and pencils</p>
                    <a href="#">View more</a>
                </figcaption>
            </figure>
        </div>
    </div>
</section>
<section id="body-content" class="body-content">
    <div class="default-container">
        <div class="container">
            <div class="row justify-content-center flex-row-reverse align-items-center">
                <div class="col-md-4">
                    <div class="home-info">
                        <h2><span>Wevertize</span> Designers </h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam vel tincidunt tellus, non faucibus velit. Nullam in cursus risus. Fusce vulputate elit ultricies rhoncus commodo.</p>
                        <p>Aliquam vel tincidunt tellus, non faucibus velit. Nullam in cursus risus. </p>
                        <a href="#" class="btn btn-secondary mt-2">Browse Wevertize Designers</a>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="img-home"><img src="{{asset('app-assets/designer/designer-back.jpg')}}" /></div>
                </div>
            </div>
        </div>
    </div>

</section>
<section id="earn-money" class="earn-money no-margin">
    <div class="earn-money-container">

        <div class="earn-money-content">
            <div class="earn-money-left black-back">
                <div class="sub-heading">
                    <h3>Driver</h3>
                </div>
                <div class="main-heading">
                    <h2>Earn <span>Money</span> While you Driver</h2>
                </div>
                <hr/>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam vel tincidunt tellus, non faucibus velit. Nullam in cursus risus. Fusce vulputate elit ultricies rhoncus commodo.</p>
                <a href="#" class="btn btn-outline-light text-uppercase">Apply Today</a>
            </div>
            <div class="earn-money-right">
                <div class="money-right-content">
                    <div class="heading">Plug & Play</div>
                    <div class="desc">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam vel tincidunt tellus, non faucibus velit.</p>
                    </div>
                </div>
                <div class="money-right-content">
                    <div class="heading">Free Installation</div>
                    <div class="desc">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam vel tincidunt tellus, non faucibus velit.</p>
                    </div>
                </div>
                <div class="money-right-content">
                    <div class="heading">Earn Money</div>
                    <div class="desc">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam vel tincidunt tellus, non faucibus velit.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero__overlay"></div>
    </div>
</section>
<section id="register-driver" class="register-driver-back register-with-us-back">
    <div class="resigter-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="register-area">
                        <h2>Are you a Driver? Register with us</h2>
                        <p>Lorem ipsum dolor sit amet, consectur adipiscing elit. </p>
                        <a href="#" class="btn btn-success text-uppercase">Register Today</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="driver-truck">
                        <img src="{{asset('app-assets/images/truck.png')}}" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="bottom-video" class="bottom-video">
    <div class="container">
        <div class="row justify-content-center d-flex align-items-center">
            <div class="col-md-4">
                <div class="video-area"><img src="{{asset('app-assets/images/video.jpg')}}" /></div>
            </div>
            <div class="col-md-8">
                <div class="platform-info">
                    <h2><span>Wevertize</span> OOH Advertising Platform</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam vel tincidunt tellus, non faucibus velit. Nullam in cursus risus. Fusce vulputate elit ultricies rhoncus commodo. </p>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
