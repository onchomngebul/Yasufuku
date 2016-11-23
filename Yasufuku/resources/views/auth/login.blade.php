@extends('layouts.app')

@section('content')
       <br><br><br><br><br>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                   <div class="" style="text-align:center">
                          <img src="{{ asset('logo.jpg') }}" class="image" alt="Logo Image">
                          <h1 style="font-size:40px;font-weight: bold;color:#336699;"> PT. YASUFUKU INDONESIA</h1>
                   </div>

                <div class="panel-heading" style="text-align:center;font-size:20px;">PRODUCTION MACHINE REPORTING SYSTEM</div>
                <div class="panel-body" style="text-align:center">
                       Sign in to start your sesion
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            {{-- <label for="email" class="col-md-4 control-label">E-Mail Address</label> --}}

                            <div class="col-md-6 col-md-offset-3 input-group" style="text-align:center">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
                                <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            {{-- <label for="password" class="col-md-4 control-label">Password</label> --}}

                            <div class="col-md-6 col-md-offset-3 input-group" style="text-align:center">
                                <input id="password" type="password" class="form-control" name="password" placeholder="Password">
                                <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-3 col-md-offset-3">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i> Sign In
                                </button>


                            </div>
                        </div>

                        <div class="form-group">
                               <div class="col-md-3 col-md-offset-3">
                                      <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                               </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
