@extends('site.layouts.main')

@section('content')
    <div class="banner-section" style="background-image: url('/images/banners/homepage-banner.jpg')">
    </div>

    <div class="container">
        <div class="row">
            <div class="col-10 offset-1">
                <div class="homepage-aboutus">
                    <h1 class="text-center">Welcome to Ionic Point</h1>
                    <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="membership-plan gray-bg pt-3 pb-5">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-6">
                    <div class="plan-wrapper">
                        <div class="plan-icon">
                            <img src="/images/icons/comments-solid.svg" alt="Free trial icon">
                        </div>
                        <h5 class="my-4">Free trial</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="plan-wrapper">
                        <div class="plan-icon">
                            <img src="/images/icons/comments-dollar-solid.svg" alt="Subscription icon">
                        </div>
                        <h5 class="my-4">Subscription</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <a class="btn btn-primary" href="{{ route('membership') }}">Membership</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="homepage-contact" style="background-image: url('/images/banners/contact-section.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="help-section">
                        <h2 class="mb-4">Need help?</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        <p>Visit our <a href="{{ route('contactUs') }}">Contact us</a> page for more detail.</p>
                    </div>
                </div>   
                <div class="col-md-4 offset-md-1">
                    <div class="contact-section">
                        <div class="card">
                            {{-- <p><i class="fas fa-mobile-alt"></i> <span>0XXX XXX XXXX</span></p>
                            <p><i class="far fa-envelope"></i> <span>info@ionicpoint.com</span></p>
                            <p><i class="far fa-address-card"></i> <span>24 Lorem road
                                Ipsum, laborum, Lincoln LN1 3SP
                            </span></p> --}}
                            <ul class="list-unstyled">
                                <li class="phone">
                                    <a href="tel:0XXXXXXXXXX">0XXX XXX XXXX</a>
                                </li>

                                <li class="email">
                                    <a href="mailto:info@ionicpoint.com">info@ionicpoint.com</a>
                                </li>

                                <li class="address">
                                    <span>24 Lorem Ipsum road, laborum, Lincoln LN1 3SP</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
<script type="text/javascript">
    $(function () {  
             
    }); 
</script>
@endsection