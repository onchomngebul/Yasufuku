@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">stoploss_record {{ $stoploss_record->idsl_record }}</div>
                    <div class="panel-body">

                        <a href="{{ url('stoploss_record/' . $stoploss_record->idsl_record . '/edit') }}" class="btn btn-primary btn-xs" title="Edit stoploss_record"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['stoploss_record', $stoploss_record->idsl_record],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete stoploss_record',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $stoploss_record->idsl_record }}</td>
                                    </tr>
                                    <tr><th> Idsl Master </th><td> {{ $stoploss_record->idsl_master }} </td></tr><tr><th> Idprod Actual </th><td> {{ $stoploss_record->idprod_actual }} </td></tr><tr><th> Sl Duration </th><td> {{ $stoploss_record->sl_duration }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection