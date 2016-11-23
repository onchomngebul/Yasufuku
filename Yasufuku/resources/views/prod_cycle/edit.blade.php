@extends('admin_template')

@section('content')
       {{-- <div class="container"> --}}
       <div class="row">
              <div class="col-md-12">
                     <div class="panel panel-default">
                            <div class="panel-heading">Edit prod_cycle {{ $prod_cycle->idprod_cycle }}</div>
                            <div class="panel-body">

                                   @if ($errors->any())
                                          <ul class="alert alert-danger">
                                                 @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                 @endforeach
                                          </ul>
                                   @endif

                                   {!! Form::model($prod_cycle, [
                                          'method' => 'PATCH',
                                          'url' => ['/prod_cycle', $prod_cycle->idprod_cycle],
                                          'class' => 'form-horizontal',
                                          'files' => true
                                          ]) !!}

                                          <div class="form-group {{ $errors->has('machine_no') ? 'has-error' : ''}}">
                                                 {!! Form::label('machine_no', 'Machine No', ['class' => 'col-md-4 control-label']) !!}
                                                 <div class="col-md-6">
                                                        {!! Form::text('machine_no', null, ['class' => 'form-control']) !!}
                                                        {!! $errors->first('machine_no', '<p class="help-block">:message</p>') !!}
                                                 </div>
                                          </div>
                                          <div class="form-group {{ $errors->has('shot') ? 'has-error' : ''}}">
                                                 {!! Form::label('shot', 'Shot', ['class' => 'col-md-4 control-label']) !!}
                                                 <div class="col-md-6">
                                                        {!! Form::number('shot', null, ['class' => 'form-control']) !!}
                                                        {!! $errors->first('shot', '<p class="help-block">:message</p>') !!}
                                                 </div>
                                          </div>
                                          <div class="form-group {{ $errors->has('start') ? 'has-error' : ''}}">
                                                 {!! Form::label('start', 'Start', ['class' => 'col-md-4 control-label']) !!}
                                                 <div class="col-md-6">
                                                        {!! Form::input('time', 'start', null, ['class' => 'form-control']) !!}
                                                        {!! $errors->first('start', '<p class="help-block">:message</p>') !!}
                                                 </div>
                                          </div>
                                          <div class="form-group {{ $errors->has('end') ? 'has-error' : ''}}">
                                                 {!! Form::label('end', 'End', ['class' => 'col-md-4 control-label']) !!}
                                                 <div class="col-md-6">
                                                        {!! Form::input('time', 'end', null, ['class' => 'form-control']) !!}
                                                        {!! $errors->first('end', '<p class="help-block">:message</p>') !!}
                                                 </div>
                                          </div>
                                          <div class="form-group {{ $errors->has('duration') ? 'has-error' : ''}}">
                                                 {!! Form::label('duration', 'Duration', ['class' => 'col-md-4 control-label']) !!}
                                                 <div class="col-md-6">
                                                        {!! Form::input('time', 'duration', null, ['class' => 'form-control']) !!}
                                                        {!! $errors->first('duration', '<p class="help-block">:message</p>') !!}
                                                 </div>
                                          </div>
                                          <div class="form-group {{ $errors->has('note') ? 'has-error' : ''}}">
                                                 {!! Form::label('note', 'Note', ['class' => 'col-md-4 control-label']) !!}
                                                 <div class="col-md-6">
                                                        {!! Form::textarea('note', null, ['class' => 'form-control']) !!}
                                                        {!! $errors->first('note', '<p class="help-block">:message</p>') !!}
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
