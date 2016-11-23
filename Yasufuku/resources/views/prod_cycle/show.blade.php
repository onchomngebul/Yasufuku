@extends('admin_template')

@section('content')
       {{-- <div class="container"> --}}
       <div class="row">
              <div class="col-md-12">
                     <div class="panel panel-default">
                            <div class="panel-heading">prod_cycle {{ $prod_cycle->idprod_cycle }}</div>
                            <div class="panel-body">

                                   <a href="{{ url('prod_cycle/' . $prod_cycle->idprod_cycle . '/edit') }}" class="btn btn-primary btn-xs" title="Edit prod_cycle"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                                   {!! Form::open([
                                          'method'=>'DELETE',
                                          'url' => ['prod_cycle', $prod_cycle->idprod_cycle],
                                          'style' => 'display:inline'
                                          ]) !!}
                                          {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                                 'type' => 'submit',
                                                 'class' => 'btn btn-danger btn-xs',
                                                 'title' => 'Delete prod_cycle',
                                                 'onclick'=>'return confirm("Confirm delete?")'
                                          ))!!}
                                          {!! Form::close() !!}
                                          <br/>
                                          <br/>

                                          <div class="table-responsive">
                                                 <table class="table table-borderless">
                                                        <tbody>
                                                               <tr>
                                                                      <th>ID</th><td>{{ $prod_cycle->idprod_cycle }}</td>
                                                               </tr>
                                                               <tr><th> Machine No </th><td> {{ $prod_cycle->machine_no }} </td></tr><tr><th> Shot </th><td> {{ $prod_cycle->shot }} </td></tr><tr><th> Start </th><td> {{ $prod_cycle->start }} </td></tr>
                                                        </tbody>
                                                 </table>
                                          </div>

                                   </div>
                            </div>
                     </div>
              </div>
              {{-- </div> --}}
       @endsection
