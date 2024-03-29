@extends('site.layouts.main')

@section('content')
    <div class="banner-section" style="background-image: url('/images/banners/membership-banner.jpg')">
    </div>

    <div class="container">
        <div class="row">
            <div class="col-10 offset-1">
                <div class="aboutus-wrapper">
                    <h1 class="text-center">Membership</h1>
                    <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="membership-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="row justify-content-md-center">
                        <div class="col-md-6 d-flex align-content-stretch flex-wrap">
                            <div class="card membership">
                                <div class="">
                                    <h2 class="my-4">Free trial</h2>
                                    {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p> --}}
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                                    <ul class="list-unstyled">
                                    {{-- <ul class=""> --}}
                                        <li>Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet</li>
                                        <li>Lorem ipsum dolor sit amet</li>
                                        <li>Lorem ipsum dolor sit amet</li>
                                        <li>Lorem ipsum dolor sit amet</li>
                                        <li>Lorem ipsum dolor sit amet</li>
                                    </ul>
                                    <h4 class="text-center">Starts at £0 / month</h4>
                                    <div class="button-wrapper text-center">
                                        <a class="btn btn-primary" href="#">Register Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mt-4 mt-md-0 d-flex align-content-stretch flex-wrap">
                            <div class="card membership">
                                <div class="">
                                    <h2 class="my-4">Subscription</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                                    <h4 class="text-center">Starts at £XX / month</h4>
                                    <div class="button-wrapper text-center">
                                        <a class="btn btn-primary" href="#">Register Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @include('site.includes.help-section')


@endsection

@section('scripts')
<script type="text/javascript">
    $(function () {  
             
    }); 
</script>
@endsection