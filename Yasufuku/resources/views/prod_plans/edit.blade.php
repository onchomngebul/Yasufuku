@extends('admin_template')

@section('content')
       {{-- <div class="container"> --}}
       <div class="row">
              <div class="col-md-12">
                     <div class="panel panel-default">
                            <div class="panel-heading">Edit prod_plan {{ $prod_plan->idprod_plans }}</div>
                            <div class="panel-body">

                                   @if ($errors->any())
                                          <ul class="alert alert-danger">
                                                 @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                 @endforeach
                                          </ul>
                                   @endif

                                   {!! Form::model($prod_plan, [
                                          'method' => 'PATCH',
                                          'url' => ['/prod_plans', $prod_plan->idprod_plans],
                                          'class' => 'form-horizontal',
                                          'files' => true
                                          ]) !!}

                                          <div class="form-group {{ $errors->has('pp_date') ? 'has-error' : ''}}">
                                                 {!! Form::label('pp_date', 'Pp Date', ['class' => 'col-md-4 control-label']) !!}
                                                 <div class="col-md-6">
                                                        {!! Form::date('pp_date', null, ['class' => 'form-control']) !!}
                                                        {!! $errors->first('pp_date', '<p class="help-block">:message</p>') !!}
                                                 </div>
                                          </div>
                                          <div class="form-group {{ $errors->has('shift') ? 'has-error' : ''}}">
                                                 {!! Form::label('shift', 'Shift', ['class' => 'col-md-4 control-label']) !!}
                                                 <div class="col-md-6">
                                                        {!! Form::text('shift', null, ['class' => 'form-control']) !!}
                                                        {!! $errors->first('shift', '<p class="help-block">:message</p>') !!}
                                                 </div>
                                          </div>
                                          <div class="form-group {{ $errors->has('machine_no') ? 'has-error' : ''}}">
                                                 {!! Form::label('machine_no', 'Machine No', ['class' => 'col-md-4 control-label']) !!}
                                                 <div class="col-md-6">
                                                        {!! Form::text('machine_no', null, ['class' => 'form-control']) !!}
                                                        {!! $errors->first('machine_no', '<p class="help-block">:message</p>') !!}
                                                 </div>
                                          </div>
                                          <div class="form-group {{ $errors->has('employee_no') ? 'has-error' : ''}}">
                                                 {!! Form::label('employee_no', 'Employee No', ['class' => 'col-md-4 control-label']) !!}
                                                 <div class="col-md-6">
                                                        {!! Form::text('employee_no', null, ['class' => 'form-control']) !!}
                                                        {!! $errors->first('employee_no', '<p class="help-block">:message</p>') !!}
                                                 </div>
                                          </div>
                                          <div class="form-group {{ $errors->has('part_no') ? 'has-error' : ''}}">
                                                 {!! Form::label('part_no', 'Part No', ['class' => 'col-md-4 control-label']) !!}
                                                 <div class="col-md-6">
                                                        {!! Form::text('part_no', null, ['class' => 'form-control']) !!}
                                                        {!! $errors->first('part_no', '<p class="help-block">:message</p>') !!}
                                                 </div>
                                          </div>
                                          <div class="form-group {{ $errors->has('schedule_tm') ? 'has-error' : ''}}">
                                                 {!! Form::label('schedule_tm', 'Schedule Tm', ['class' => 'col-md-4 control-label']) !!}
                                                 <div class="col-md-6">
                                                        {!! Form::number('schedule_tm', null, ['class' => 'form-control']) !!}
                                                        {!! $errors->first('schedule_tm', '<p class="help-block">:message</p>') !!}
                                                 </div>
                                          </div>
                                          <div class="form-group {{ $errors->has('cycle_tm') ? 'has-error' : ''}}">
                                                 {!! Form::label('cycle_tm', 'Cycle Tm', ['class' => 'col-md-4 control-label']) !!}
                                                 <div class="col-md-6">
                                                        {!! Form::number('cycle_tm', null, ['class' => 'form-control']) !!}
                                                        {!! $errors->first('cycle_tm', '<p class="help-block">:message</p>') !!}
                                                 </div>
                                          </div>
                                          <div class="form-group {{ $errors->has('cav_no') ? 'has-error' : ''}}">
                                                 {!! Form::label('cav_no', 'Cav No', ['class' => 'col-md-4 control-label']) !!}
                                                 <div class="col-md-6">
                                                        {!! Form::number('cav_no', null, ['class' => 'form-control']) !!}
                                                        {!! $errors->first('cav_no', '<p class="help-block">:message</p>') !!}
                                                 </div>
                                          </div>
                                          <div class="form-group {{ $errors->has('pp_qty') ? 'has-error' : ''}}">
                                                 {!! Form::label('pp_qty', 'Pp Qty', ['class' => 'col-md-4 control-label']) !!}
                                                 <div class="col-md-6">
                                                        {!! Form::number('pp_qty', null, ['class' => 'form-control']) !!}
                                                        {!! $errors->first('pp_qty', '<p class="help-block">:message</p>') !!}
                                                 </div>
                                          </div>
                                          <div class="form-group {{ $errors->has('pp_shot') ? 'has-error' : ''}}">
                                                 {!! Form::label('pp_shot', 'Pp Shot', ['class' => 'col-md-4 control-label']) !!}
                                                 <div class="col-md-6">
                                                        {!! Form::number('pp_shot', null, ['class' => 'form-control']) !!}
                                                        {!! $errors->first('pp_shot', '<p class="help-block">:message</p>') !!}
                                                 </div>
                                          </div>


                                          <div class="form-group">
                                                 <div class="col-md-offset-4 col-md-4">
                                                        {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                                                 </div>
                                          </div>
                                          {!! Form::close() !!}

                                   </div>
                            </div>
                     </div>
              </div>
              {{-- </div> --}}
       @endsection
