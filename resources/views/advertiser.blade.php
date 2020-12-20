@extends('layouts.app')
@section('content')
<section id="header-area" class="inner-header page-section">
    <div class="section-background">

        <div class="content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Get your brand on the streets</h2>
                    </div>
                </div>
            </div>
        </div>


        <img alt="" src="{{asset('app-assets/images/advertiser-background.jpg?format')}}" style="-webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;">

        <div class="section-background-overlay"></div>


    </div>
</section>
<section id="body-content" class="body-content">
    <div >
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="breadcrum-area">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Advertiser</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="advertiser-left">
                        <h2 style="font-size: 4.5rem;line-height: 1;">Street-level Digital Media Campaign</h2>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="advertiser-right">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In mollis augue quis molestie consequat. Proin ut consectetur libero, quis iaculis elit. Etiam nunc sapien, placerat eu libero semper, cursus luctus neque. Aenean
                            mollis ex et leo tincidunt consequat. In ornare lacinia odio non placerat. Vivamus et mollis sapien. Sed nulla quam, maximus in lacinia vel, luctus eget lectus. Donec vitae nisl volutpat, sollicitudin risus id,
                            placerat enim. Integer consectetur purus vitae justo facilisis, non vestibulum neque bibendum. Mauris finibus sem sed ex feugiat bibendum.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="advetiser-details" class="advetiser-details">
    <div class="advetiser-more-area align-items-center">
        <div class="inner-header">
            <div class="container">
                <div class="row justify-content-center text-center">
                    <div class="col-md-6">
                        
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="section-background-overlay"></div>
</section>
<section id="bottom-app" class="bottom-app">
    <div class="container">
        <div class="row justify-content-center d-flex align-items-center">
            <div class="col-md-12">
                <div class="easy-steps text-center">
                    <h2>How Does It <span>Work?</span></h2>
                    <ul class="steps-lists">
                        <li>
                            <img src="{{asset('app-assets/images/applications.svg')}}" />
                            <h5>DRIVER APPLICATION</h5>
                            <p>We ask some simple questions about where you normally drive</p>
                        </li>
                        <li>
                            <img src="{{asset('app-assets/images/earn-money.svg')}}" />
                            <h5>DRIVE & EARN</h5>
                            <p>We ask some simple questions about where you normally drive</p>
                        </li>
                        <li>
                            <img src="{{asset('app-assets/images/unwrap.svg')}}" />
                            <h5>UNWRAP</h5>
                            <p>We ask some simple questions about where you normally drive</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="question-area" class="question-area">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h2>Questions you might have to asked?</h2>
            </div>
            <div class="col-md-8">
                <div class="questions-have">
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h2 class="mb-0">
                                    <a href="#" class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                
What is Wevertize?
                                    </a>
                                </h2>
                            </div>

                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird
                                    on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings
                                    occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h2 class="mb-0">
                                    <a href="#" class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                
What are the qualifications to become a driver?
                                    </a>
                                </h2>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                <div class="card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird
                                    on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings
                                    occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h2 class="mb-0">
                                    <a href="#" class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                
Do I have to pay anything to get started?
                                    </a>
                                </h2>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                <div class="card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird
                                    on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings
                                    occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection