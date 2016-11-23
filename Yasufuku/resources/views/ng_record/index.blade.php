@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Ng_record</div>
                    <div class="panel-body">

                        <a href="{{ url('/ng_record/create') }}" class="btn btn-primary btn-xs" title="Add New ng_record"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th><th> Idng Master </th><th> Idprod Actual </th><th> Ng Qty </th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($ng_record as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->idng_master }}</td><td>{{ $item->idprod_actual }}</td><td>{{ $item->ng_qty }}</td>
                                        <td>
                                            <a href="{{ url('/ng_record/' . $item->idng_record) }}" class="btn btn-success btn-xs" title="View ng_record"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                                            <a href="{{ url('/ng_record/' . $item->idng_record . '/edit') }}" class="btn btn-primary btn-xs" title="Edit ng_record"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/ng_record', $item->idng_record],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete ng_record" />', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete ng_record',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $ng_record->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection