@extends('site.layouts.main')

@section('content')
    <div class="banner-section" style="background-image: url('/images/banners/aboutus-banner.jpg')">
    </div>

    <div class="container">
        <div class="row">
            <div class="col-10 offset-1">
                <div class="aboutus-wrapper">
                    <h1 class="text-center">What is Ionic Point?</h1>
                    <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-10 offset-1">
                    <div class="aboutus-wrapper">
                        <h1 class="text-center">Why choose us?</h1>
                        <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
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