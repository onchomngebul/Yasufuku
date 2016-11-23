@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">ng_record {{ $ng_record->idng_record }}</div>
                    <div class="panel-body">

                        <a href="{{ url('ng_record/' . $ng_record->idng_record . '/edit') }}" class="btn btn-primary btn-xs" title="Edit ng_record"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['ng_record', $ng_record->idng_record],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete ng_record',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $ng_record->idng_record }}</td>
                                    </tr>
                                    <tr><th> Idng Master </th><td> {{ $ng_record->idng_master }} </td></tr><tr><th> Idprod Actual </th><td> {{ $ng_record->idprod_actual }} </td></tr><tr><th> Ng Qty </th><td> {{ $ng_record->ng_qty }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection