@extends('admin_template')

@section('content')
       {{-- <div class="container"> --}}
       <div class="row">
              <div class="col-md-12">
                     <div class="panel panel-default">
                            <div class="panel-heading">TEST API</div>
                            <div class="panel-body">

                                   @if ($errors->any())
                                          <ul class="alert alert-danger">
                                                 @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                 @endforeach
                                          </ul>
                                   @endif

                                   {!! Form::open(['url' => '/api/prod_plans', 'class' => 'form-horizontal', 'files' => true]) !!}
                                   {!! csrf_field() !!}
                                   <div class="form-group {{ $errors->has('machine_no') ? 'has-error' : ''}}">
                                          {!! Form::label('machine_no', 'Machine No', ['class' => 'col-md-4 control-label']) !!}
                                          <div class="col-md-6">
                                                 {!! Form::text('machine_no', null, ['class' => 'form-control']) !!}
                                                 {!! $errors->first('machine_no', '<p class="help-block">:message</p>') !!}
                                          </div>
                                   </div>

                                   <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                                          {!! Form::label('email', 'Email Address', ['class' => 'col-md-4 control-label']) !!}
                                          <div class="col-md-6">
                                                 {!! Form::email('email', null, ['class' => 'form-control']) !!}
                                                 {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                                          </div>
                                   </div>

                                   <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
                                          {!! Form::label('password', 'Password', ['class' => 'col-md-4 control-label']) !!}
                                          <div class="col-md-6">
                                                 {{-- {!! Form::password('password', null, ['class' => 'form-control']) !!} --}}
                                                 <input id="password" type="password" class="form-control" name="password">
                                                 {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
                                          </div>
                                   </div>

                                   <div class="form-group">
                                          <div class="col-md-offset-4 col-md-4">
                                                 {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
                                          </div>
                                   </div>
                                   {!! Form::close() !!}

                            </div>
                     </div>
              </div>
       </div>
       <script type="text/javascript">
       $( document ).ready(function() {
              $( ".iniTanggal" ).datepicker({
                     format: "dd-mm-yyyy"
              });
       });
       </script>
       {{-- </div> --}}
@endsection
