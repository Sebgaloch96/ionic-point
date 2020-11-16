@extends('site.layouts.main')

@section('content')
    <div class="banner-section" style="background-image: url('/images/banners/contactus-banner.jpg')">
    </div>

    <div class="contact-us-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h1>Want to<br> know<br> more?<br>Contact us</h1>
                    <address class="mt-4">24 Lorem Ipsum road, laborum, Lincoln LN1 3SP</address>
                    <p class="mb-0">Tel: <a href="tel:0XXXXXXXXXX">0XXX XXX XXXX</a></p>
                    <p>Email: <a href="mailto:info@ionicpoint.com">info@ionicpoint.com</a></p>
                </div>
                <div class="col-lg-6">
                    <form action="">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="firstname">Name</label>
                                <input type="text" class="form-control" id="firstname" placeholder="First Name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="lastname">&nbsp;</label>
                                <input type="text" class="form-control" id="lastname" placeholder="Last Name">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" placeholder="example@example.com">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" id="phone" placeholder="">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="website">Website (Optional)</label>
                                <input type="text" class="form-control" id="website" placeholder="https://www.example.com">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="company">Company (Optional)</label>
                                <input type="text" class="form-control" id="company" placeholder="">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="message">Message</label>
                                <textarea class="form-control" id="message" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="row text-right">
                            <div class="col-md-12">
                                <a class="btn btn-primary btn-submit" href="#">Submit</a>
                            </div>
                        </div>
                    </form>
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