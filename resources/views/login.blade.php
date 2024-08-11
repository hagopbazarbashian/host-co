@extends('layout.app')
@section('main-content')
 <!-- content begin -->
 <div class="no-bottom no-top" id="content">
    <div id="top"></div>
    <section id="section-hero" aria-label="section" data-bgimage='url({{asset('asset/images/background/6.jpg')}}) top' class="full-height no-top no-bottom">
        <div class="v-center">
            <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-4 offset-lg-4">
                            <div class="padding40 rounded-3 shadow-soft text-center" data-bgcolor="#ffffff">
                                <h4>Transfer images and files with ease. Quick, secure!</h4>
                                <div class="spacer-10"></div>
                                 @if(session('success'))
                                <div class="alert alert-success success-message">
                                    <p>{{ session('success') }}</p>
                                </div>
                                @endif
                                <form id="form_register" class="form-border" method="post" action="{{ route('login_submit') }}">
                                    @csrf
                                    <div class="field-set">
                                        <input type="text" name="email" id="name" class="form-control" placeholder="Your Email" value="{{ old('email') }}">
                                    </div>
                                    <div class="field-set">
                                        <input type="password" name="password" id="name" class="form-control" placeholder="Your Password" value="{{ old('password') }}">
                                    </div>
                                    <div id="submit">
                                        <input type="submit" id="send_message" value="Sign In" class="btn-main btn-fullwidth rounded-3" >
                                    </div>
                                </form>
                                <div class="title-line">Or&nbsp;sign&nbsp;up&nbsp;with</div>
                                <div class="row g-2" style="display:flex;justify-content: center;">
                                    <div class="col-lg-6">
                                        <a class="btn-sc btn-fullwidth mb10" href="{{ route('login.google') }}"><img src="{{asset('asset/images/svg/google_icon.svg')}}" alt="">Google</a>
                                    </div>
                                    <div class="col-lg-6">
                                        <a class="btn-sc btn-fullwidth mb10" href="{{route('register')}}">Register Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </section>
</div>
<!-- content close -->

@endsection
