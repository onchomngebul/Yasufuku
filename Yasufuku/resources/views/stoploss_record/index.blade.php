@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Stoploss_record</div>
                    <div class="panel-body">

                        <a href="{{ url('/stoploss_record/create') }}" class="btn btn-primary btn-xs" title="Add New stoploss_record"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th><th> Idsl Master </th><th> Idprod Actual </th><th> Sl Duration </th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($stoploss_record as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->idsl_master }}</td><td>{{ $item->idprod_actual }}</td><td>{{ $item->sl_duration }}</td>
                                        <td>
                                            <a href="{{ url('/stoploss_record/' . $item->idsl_record) }}" class="btn btn-success btn-xs" title="View stoploss_record"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                                            <a href="{{ url('/stoploss_record/' . $item->idsl_record . '/edit') }}" class="btn btn-primary btn-xs" title="Edit stoploss_record"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/stoploss_record', $item->idsl_record],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete stoploss_record" />', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete stoploss_record',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $stoploss_record->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection