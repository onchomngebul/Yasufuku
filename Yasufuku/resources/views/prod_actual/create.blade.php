@extends('admin_template')

@section('content')
       {{-- <div class="container"> --}}
       <div class="row">
              <div class="col-md-12">
                     <div class="panel panel-default">
                            <div class="panel-heading">Create New prod_actual</div>
                            <div class="panel-body">

                                   @if ($errors->any())
                                          <ul class="alert alert-danger">
                                                 @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                 @endforeach
                                          </ul>
                                   @endif

                                   {!! Form::open(['url' => '/prod_actual', 'class' => 'form-horizontal', 'files' => true]) !!}

                                   <div class="form-group {{ $errors->has('idprod_plans') ? 'has-error' : ''}}">
                                          {!! Form::label('idprod_plans', 'Idprod Plans', ['class' => 'col-md-4 control-label']) !!}
                                          <div class="col-md-6">
                                                 {!! Form::number('idprod_plans', null, ['class' => 'form-control']) !!}
                                                 {!! $errors->first('idprod_plans', '<p class="help-block">:message</p>') !!}
                                          </div>
                                   </div>
                                   <div class="form-group {{ $errors->has('aplan_qty') ? 'has-error' : ''}}">
                                          {!! Form::label('aplan_qty', 'Aplan Qty', ['class' => 'col-md-4 control-label']) !!}
                                          <div class="col-md-6">
                                                 {!! Form::number('aplan_qty', null, ['class' => 'form-control']) !!}
                                                 {!! $errors->first('aplan_qty', '<p class="help-block">:message</p>') !!}
                                          </div>
                                   </div>
                                   <div class="form-group {{ $errors->has('aplan_shot') ? 'has-error' : ''}}">
                                          {!! Form::label('aplan_shot', 'Aplan Shot', ['class' => 'col-md-4 control-label']) !!}
                                          <div class="col-md-6">
                                                 {!! Form::number('aplan_shot', null, ['class' => 'form-control']) !!}
                                                 {!! $errors->first('aplan_shot', '<p class="help-block">:message</p>') !!}
                                          </div>
                                   </div>
                                   <div class="form-group {{ $errors->has('aplan_time') ? 'has-error' : ''}}">
                                          {!! Form::label('aplan_time', 'Aplan Time', ['class' => 'col-md-4 control-label']) !!}
                                          <div class="col-md-6">
                                                 {!! Form::number('aplan_time', null, ['class' => 'form-control']) !!}
                                                 {!! $errors->first('aplan_time', '<p class="help-block">:message</p>') !!}
                                          </div>
                                   </div>
                                   <div class="form-group {{ $errors->has('aprod_qty') ? 'has-error' : ''}}">
                                          {!! Form::label('aprod_qty', 'Aprod Qty', ['class' => 'col-md-4 control-label']) !!}
                                          <div class="col-md-6">
                                                 {!! Form::number('aprod_qty', null, ['class' => 'form-control']) !!}
                                                 {!! $errors->first('aprod_qty', '<p class="help-block">:message</p>') !!}
                                          </div>
                                   </div>
                                   <div class="form-group {{ $errors->has('aprod_shot') ? 'has-error' : ''}}">
                                          {!! Form::label('aprod_shot', 'Aprod Shot', ['class' => 'col-md-4 control-label']) !!}
                                          <div class="col-md-6">
                                                 {!! Form::number('aprod_shot', null, ['class' => 'form-control']) !!}
                                                 {!! $errors->first('aprod_shot', '<p class="help-block">:message</p>') !!}
                                          </div>
                                   </div>
                                   <div class="form-group {{ $errors->has('performance') ? 'has-error' : ''}}">
                                          {!! Form::label('performance', 'Performance', ['class' => 'col-md-4 control-label']) !!}
                                          <div class="col-md-6">
                                                 {!! Form::text('performance', null, ['class' => 'form-control']) !!}
                                                 {!! $errors->first('performance', '<p class="help-block">:message</p>') !!}
                                          </div>
                                   </div>
                                   <div class="form-group {{ $errors->has('stop_loss') ? 'has-error' : ''}}">
                                          {!! Form::label('stop_loss', 'Stop Loss', ['class' => 'col-md-4 control-label']) !!}
                                          <div class="col-md-6">
                                                 {!! Form::number('stop_loss', null, ['class' => 'form-control']) !!}
                                                 {!! $errors->first('stop_loss', '<p class="help-block">:message</p>') !!}
                                          </div>
                                   </div>
                                   <div class="form-group {{ $errors->has('ot_ratio') ? 'has-error' : ''}}">
                                          {!! Form::label('ot_ratio', 'Ot Ratio', ['class' => 'col-md-4 control-label']) !!}
                                          <div class="col-md-6">
                                                 {!! Form::text('ot_ratio', null, ['class' => 'form-control']) !!}
                                                 {!! $errors->first('ot_ratio', '<p class="help-block">:message</p>') !!}
                                          </div>
                                   </div>
                                   <div class="form-group {{ $errors->has('ql_ratio') ? 'has-error' : ''}}">
                                          {!! Form::label('ql_ratio', 'Ql Ratio', ['class' => 'col-md-4 control-label']) !!}
                                          <div class="col-md-6">
                                                 {!! Form::text('ql_ratio', null, ['class' => 'form-control']) !!}
                                                 {!! $errors->first('ql_ratio', '<p class="help-block">:message</p>') !!}
                                          </div>
                                   </div>
                                   <div class="form-group {{ $errors->has('ng') ? 'has-error' : ''}}">
                                          {!! Form::label('ng', 'Ng', ['class' => 'col-md-4 control-label']) !!}
                                          <div class="col-md-6">
                                                 {!! Form::number('ng', null, ['class' => 'form-control']) !!}
                                                 {!! $errors->first('ng', '<p class="help-block">:message</p>') !!}
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
       {{-- </div> --}}
@endsection
