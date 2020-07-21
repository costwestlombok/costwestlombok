@extends('layout_login')

@section('content')
<!--<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>

                <div class="panel-body">-->
        <div class="login-container material">

            <!-- Page content -->
            <div class="page-content">

                    <!-- form -->
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">

                        <div class="login-form no-border no-border-radius">                         
                            <div class="welcome bg-grey p-t-20">                        
                                <div class="welcome-text text-size-huge text-light text-center">
                                <img src="{{ asset('images/logo.png') }}" style="height: 70px;">
                                </div>
                            </div>
                            <div class="panel panel-flat no-border">
                                <div class="panel-body no-padding-bottom">
                                    
                                    {{ csrf_field() }}

                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <!--<label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                        <div class="col-md-6">-->
                                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="EMAIL" required autofocus>

                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        <!--</div>-->
                                    </div>

                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <!--<label for="password" class="col-md-4 control-label">Password</label>

                                        <div class="col-md-6">-->
                                            <input id="password" type="password" class="form-control" name="password" placeholder="PASSWORD" required>

                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        <!--</div>-->
                                    </div>

                                    <div class="login-options">
                                        <div class="row">
                                            <div class="col-sm-6 col-xs-6">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember me
                                                    </label>
                                                </div>
                                            </div>
                                        
                                            <div class="col-sm-6 col-xs-6 text-right">
                                                <button type="submit" class="btn btn-primary bg-slate">
                                                    Login
                                                </button>

                                                <!--<a class="btn btn-link" href="{{ route('password.request') }}">
                                                    Forgot Your Password?
                                                </a>-->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group text-center">
                                        <a href="{{ route('password.request') }}">Forgot Password?</a>
                                    </div>

                                </div>
                                <!--<div class="panel-footer text-center">
                                    <a href="login_material.htm#">Create an account</a>
                                </div>-->
                            </div>
                        </div>
                    </form>

                    <!-- Footer -->
                    <div class="footer text-size-mini">
                        &copy; 2020 CoST &nbsp;&nbsp;&nbsp;&bull;&nbsp;&nbsp;&nbsp; West Lombok
                    </div>
                    <!-- /footer -->

                </div>
                <!-- /page content -->

            </div>
                    <!-- end of form -->
                <!--</div>
            </div>
        </div>
    </div>
</div>-->
@endsection
