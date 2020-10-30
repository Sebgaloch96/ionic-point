@extends('site.layouts.main')

@section('content')
    <div class="banner-section" style="background-image: url('/images/banners/homepage-banner.jpg')">
    </div>

    <div class="container">
        <div class="row">
            <div class="col-10 offset-1">
                <div class="aboutus-wrapper">
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


    @include('site.includes.help-section')

@endsection

@section('scripts')
<script type="text/javascript">
    $(function () {  
             
    }); 
</script>
@endsection