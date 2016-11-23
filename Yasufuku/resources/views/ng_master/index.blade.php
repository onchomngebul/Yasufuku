@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Ng_master</div>
                    <div class="panel-body">

                        <a href="{{ url('/ng_master/create') }}" class="btn btn-primary btn-xs" title="Add New ng_master"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
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
                                @foreach($ng_master as $item)
                                    <tr>
                                        <td>{{ $item->idng_master }}</td>
                                        <td>{{ $item->reason }}</td>
                                        <td>
                                            <a href="{{ url('/ng_master/' . $item->idng_master) }}" class="btn btn-success btn-xs" title="View ng_master"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                                            <a href="{{ url('/ng_master/' . $item->idng_master . '/edit') }}" class="btn btn-primary btn-xs" title="Edit ng_master"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/ng_master', $item->idng_master],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete ng_master" />', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete ng_master',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $ng_master->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
