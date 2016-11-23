@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Stoploss_master</div>
                    <div class="panel-body">

                        <a href="{{ url('/stoploss_master/create') }}" class="btn btn-primary btn-xs" title="Add New stoploss_master"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th><th> Reason </th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($stoploss_master as $item)
                                    <tr>
                                        <td>{{ $item->idsl_master }}</td>
                                        <td>{{ $item->reason }}</td>
                                        <td>
                                            <a href="{{ url('/stoploss_master/' . $item->idsl_master) }}" class="btn btn-success btn-xs" title="View stoploss_master"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                                            <a href="{{ url('/stoploss_master/' . $item->idsl_master . '/edit') }}" class="btn btn-primary btn-xs" title="Edit stoploss_master"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/stoploss_master', $item->idsl_master],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete stoploss_master" />', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete stoploss_master',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $stoploss_master->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
