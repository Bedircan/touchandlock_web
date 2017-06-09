@extends('layouts.master')

@section('content')
    <div class="main-container">

        @include('layouts.partials.alerts')

        <div class="page-header">
            <h3>Sign In</h3>
        </div>

         <form role="form" method="POST" action="{{ route('auth.login') }}" class="form-horizontal" _lpchecked="1">
            {!! csrf_field() !!}
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-8">
                    <input type="text" name="email" id="email" class="form-control">
                    @if ($errors->has('email'))
                        <span class="help-block">{{ $errors->first('email') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-8">
                    <input type="password" name="password" id="password" class="form-control">
                    @if ($errors->has('password'))
                        <span class="help-block">{{ $errors->first('password') }}</span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-8">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-user"></i> LOGIN</button>
                    <a href="{{ url('/password/reset') }}" class="btn btn-link">FORGOT YOUR PASSWORD?</a>
                </div>
            </div>
        </form>

        <hr/>

        <a href="{{ url('/auth/facebook') }}" class="btn btn-block btn-facebook btn-social"><i class="fa fa-facebook"></i>SIGN IN WITH FACEBOOK</a>
        <a href="{{ url('/auth/twitter') }}" class="btn btn-block btn-twitter btn-social"><i class="fa fa-twitter"></i>SIGN IN WITH TWITTER</a>
        <a href="{{ url('/auth/google') }}" class="btn btn-block btn-google btn-social"><i class="fa fa-google-plus"></i>SIGN IN WITH GOOGLE</a>
    </div>
@stop