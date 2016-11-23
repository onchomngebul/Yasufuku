@extends('admin_template')

@section('content')
       {{-- <div class="container"> --}}
       <div class="row">
              <div class="col-md-12">
                     <div class="panel panel-default">
                            <div class="panel-heading">Create New User</div>
                            {{-- {{print_r($errors)}} --}}
                            <div class="panel-body">
                                   {{-- harusnya muncul error disini --}}
                                   @if ($errors->has())
                                          <div class="alert alert-danger">
                                                 <ul>
                                                        @foreach ($errors->all() as $error)
                                                               <li>{{ $error }}</li>
                                                        @endforeach
                                                 </ul>
                                          </div>
                                   @endif
                                   {{-- @if($errors->has())
                                          @foreach ($errors->all() as $error)
                                                 <div>{{ $error }}</div>
                                          @endforeach
                                   @endif --}}

                                   {!! Form::open(['url' => '/admin', 'class' => 'form-horizontal', 'files' => true]) !!}
                                   {!! csrf_field() !!}
                                   <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                                          {!! Form::label('name', 'Name', ['class' => 'col-md-4 control-label']) !!}
                                          <div class="col-md-6">
                                                 {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                                 {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
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

                                   <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : ''}}">
                                          {!! Form::label('password_confirmation', 'Password Confirmation', ['class' => 'col-md-4 control-label']) !!}
                                          <div class="col-md-6">
                                                 {{-- {!! Form::password('password_confirmation', null, ['class' => 'form-control']) !!} --}}
                                                 <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                                                 {!! $errors->first('password_confirmation', '<p class="help-block">:message</p>') !!}
                                          </div>
                                   </div>

                                   <div class="form-group {{ $errors->has('employee_no') ? 'has-error' : ''}}">
                                          {!! Form::label('employee_no', 'Employee No', ['class' => 'col-md-4 control-label']) !!}
                                          <div class="col-md-6">
                                                 {!! Form::text('employee_no', null, ['class' => 'form-control']) !!}
                                                 {!! $errors->first('employee_no', '<p class="help-block">:message</p>') !!}
                                          </div>
                                   </div>

                                   <div class="form-group {{ $errors->has('role') ? 'has-error' : ''}}">
                                          {!! Form::label('role', 'Role', ['class' => 'col-md-4 control-label']) !!}
                                          <div class="col-md-6">
                                                 {{-- {!! Form::text('role', null, ['class' => 'form-control']) !!} --}}
                                                 {!! Form::select(
                                                        'role',
                                                        array(
                                                               'admin' => 'Administrator',
                                                               'ppic' => 'PPIC'
                                                        ),
                                                        '',
                                                        ['class' => 'form-control', 'placeholder' => ' = Choose Role = ']) !!}
                                                 {!! $errors->first('role', '<p class="help-block">:message</p>') !!}
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

       });
       </script>
       {{-- </div> --}}
@endsection
