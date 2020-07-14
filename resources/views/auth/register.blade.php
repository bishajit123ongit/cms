<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{asset('public/frontend/registration/fonts/material-icon/css/material-design-iconic-font.min.css')}}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('public/frontend/registration/css/style.css')}}">
    <style type="text/css">
    .color{
    color:white;
}
.liststyle{
    color: white;
    display: inline-block;
    width: 89px;
    vertical-align: top;
}
.imgstyle{
    float: right;
    padding-right: 25px;
    margin-top: 10px;
    width: 40px;
    height: 40px;
    margin-top: calc(5% - 160px);
}
</style>
</head>
<body>

    <div class="main">
        @if ( Config::get('app.locale') == 'en')
                      <a id="btnbn" href="{{ url('locale/bn') }}">  <img class="imgstyle" src="public/image/bn.png"></a>
                 @else
                        <a id="btnen" href="{{ url('locale/en') }}"><img class="imgstyle" src="public/image/en.png"></a>
                @endif
        <section class="signup">

            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                @if(session()->has('success'))
                    <div class="alert alert-success">
                    {{session()->get('success')}}
                    </div>
                @endif

                @if(session()->has('error'))
                     <div class="alert alert-danger">
                             {{session()->get('error')}}
                     </div>
                @endif
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <h2 class="form-title">@lang('translateproperties.createaccount')<a href="{{url('/')}}">CMS</a></h2>
                        <div class="form-group">
                            <input id="name" type="text" class="form-input" name="name" placeholder=@lang('translateproperties.tableusername') @error('name') is-invalid @enderror"  value="{{ old('name') }}" required autocomplete="name" autofocus/>
                            @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>



                        <div class="form-group">
                            <input type="email" class="form-input" name="email" id="email" placeholder=@lang('translateproperties.email') @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email"/>
                             @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <input type="password" class="form-input" name="password" id="password" placeholder=@lang('translateproperties.password') @error('password') is-invalid @enderror" required autocomplete="new-password" />
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                                @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                @enderror

                        <div class="form-group">
                            <input type="password" class="form-input" name="password_confirmation" id="password-confirm" placeholder=@lang('translateproperties.confirmpassword') required autocomplete="new-password"/>
                        </div>

                      

                        <div class="form-group">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>@lang('translateproperties.agreementmsg')  <a href="#" class="term-service">@lang('translateproperties.agreementmsg2')</a></label>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary form-submit">
                            <i class="fa fa-registered" aria-hidden="true"></i>
                                    @lang('translateproperties.register')
                            </button>
                        </div>

                    </form>
                    <p class="loginhere">
                         @lang('translateproperties.signinmsg') <a href="{{ route('login') }}" class="loginhere-link">@lang('translateproperties.loginhere')</a>
                    </p>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
    <script src="https://use.fontawesome.com/c1ea3167d7.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>