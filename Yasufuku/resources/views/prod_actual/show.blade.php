@extends('admin_template')

@section('content')
       {{-- <div class="container"> --}}
       <div class="row">
              <div class="col-md-12">
                     <a href="/prod_actual"><i class="fa fa-backward" aria-hidden="true"></i> &nbsp; Back to Index</a>
                     <div class="panel panel-default">
                            <div class="panel-heading">Production Actual Details</div>
                            <div class="panel-body">
                                   {{-- <a href="{{ url('prod_actual/' . $prod_actual->idprod_actual . '/edit') }}" class="btn btn-primary btn-xs" title="Edit prod_actual"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a> --}}
                                   {!! Form::open([
                                          'method'=>'DELETE',
                                          'url' => ['prod_actual', $prod_actual->idprod_actual],
                                          'style' => 'display:inline'
                                          ]) !!}
                                          {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                                 'type' => 'submit',
                                                 'class' => 'btn btn-danger btn-xs',
                                                 'title' => 'Delete prod_actual',
                                                 'onclick'=>'return confirm("Confirm delete?")'
                                          ))!!}
                                          {!! Form::close() !!}
                                          <hr/>
                                          <hr/>
                                          <style media="screen">
                                          table{
                                                 table-layout: fixed;
                                                 width: 300px;
                                          }
                                          </style>
                                          <div class="row">
                                                 <div class="col-md-6">
                                                        <div class="table-responsive">
                                                               <table class="table table-borderless table-hover">
                                                                      <tbody>
                                                                             <tr><th>Ref No.</th><td>{{ $prod_actual->order_id }}</td></tr>
                                                                             <tr><th> Transaction Date </th><td> {{ $prod_actual->pp_date }} </td></tr>
                                                                             <tr><th> Shift Code </th><td> {{ $prod_actual->shift }} </td></tr>
                                                                             <tr><th> Resource </th><td> {{ $prod_actual->machine_no }} </td></tr>
                                                                      </tbody>
                                                               </table>
                                                        </div>
                                                 </div>
                                                 <div class="col-md-6" style="border-left: 3px solid #f2f2f2;">
                                                        <div class="table-responsive">
                                                               <table class="table table-borderless table-hover">
                                                                      <tbody>
                                                                             <tr><th></th><td></td></tr>
                                                                             <tr><th> Operator NIK </th><td> {{ $prod_actual->operator_no }} </td></tr>
                                                                             <tr><th> Leader NIK </th><td> {{ $prod_actual->leader_no }} </td></tr>
                                                                             <tr><th> Operation </th><td> {{ $prod_actual->mold_no }} </td></tr>
                                                                      </tbody>
                                                               </table>
                                                        </div>
                                                 </div>
                                          </div>
                                          <hr>
                                          <div class="row">
                                                 <div class="col-md-6">
                                                        <div class="table-responsive">
                                                               <table class="table table-borderless table-hover">
                                                                      <tbody>
                                                                             <tr><th>Item Code</th><td>{{ $prod_actual->part_no }}</td></tr>
                                                                             <tr><th>Item Desc </th><td> {{ $prod_actual->item_desc }} </td></tr>
                                                                      </tbody>
                                                               </table>
                                                        </div>
                                                 </div>
                                                 <div class="col-md-6" style="border-left: 3px solid #f2f2f2;">
                                                        <div class="table-responsive">
                                                               <table class="table table-borderless table-hover" >
                                                                      <tbody>
                                                                             <tr><th> Cavity No </th><td> {{ $prod_actual->cav_no }} </td></tr>
                                                                             <tr><th> Cycle Time </th><td> {{ $prod_actual->cycle_tm }} </td></tr>
                                                                      </tbody>
                                                               </table>
                                                        </div>
                                                 </div>
                                          </div>
                                          <hr>
                                          <div class="row">
                                                 <div class="col-md-4">
                                                        <div class="table-responsive">
                                                               <table class="table table-bordered table-hover">
                                                                      <tbody>
                                                                             <tr><th>Production Plan</th><td></td></tr>
                                                                             <tr><th>Quantity </th><td> {{ $prod_actual->pp_qty }} pcs</td></tr>
                                                                             <tr><th>Shot </th><td> {{ $prod_actual->pp_shot }} shot</td></tr>
                                                                             <tr><th>Schedule Time </th><td> {{ $prod_actual->schedule_tm }} min</td></tr>
                                                                      </tbody>
                                                               </table>
                                                        </div>
                                                 </div>
                                                 <div class="col-md-4" style="border-left: 3px solid #f2f2f2;">
                                                        <div class="table-responsive">
                                                               <table class="table table-bordered table-hover" >
                                                                      <tbody>
                                                                             <tr><th> Actual Plan </th><td>  </td></tr>
                                                                             <tr><th> Quantity </th><td> {{ $prod_actual->aplan_qty }} pcs</td></tr>
                                                                             <tr><th> Shot </th><td> {{ $prod_actual->aplan_shot }} shot</td></tr>
                                                                             {{-- <tr><th> Actual time </th><td> {{ $prod_actual->aplan_time }} </td></tr> --}}
                                                                      </tbody>
                                                               </table>
                                                        </div>
                                                 </div>
                                                 <div class="col-md-4" style="border-left: 3px solid #f2f2f2;">
                                                        <div class="table-responsive">
                                                               <table class="table table-bordered table-hover" >
                                                                      <tbody>
                                                                             <tr><th> Actual Production </th><td>  </td></tr>
                                                                             <tr><th> OK Quantity </th><td> {{ $prod_actual->aprod_qty }} pcs</td></tr>
                                                                             <tr><th> Shot </th><td> {{ $prod_actual->aprod_shot }} shot</td></tr>
                                                                             <tr><th> Production Hour </th><td> {{ $prod_actual->aplan_time }} min</td></tr>
                                                                      </tbody>
                                                               </table>
                                                        </div>
                                                 </div>
                                          </div>
                                          <hr>
                                          <div class="row">
                                                 <div class="col-md-6">
                                                        <div class="table-responsive">
                                                               <table class="table table-borderless table-hover">
                                                                      <tbody>
                                                                             <tr><th>Stop Loss</th><td></td></tr>
                                                                             <tr><th>Loss Time Total </th><td> {{ $prod_actual->stop_loss }} min</td></tr>
                                                                             @foreach (DB::table('stoploss_masters')->lists('reason', 'idsl_master') as $idsl_master => $reason)
                                                                                    @php
                                                                                           $tempData = $prod_actual->stopLoss()->where('idsl_master', $idsl_master)->first();
                                                                                    @endphp
                                                                                    <tr><th>{{$idsl_master.'. '.$reason}}</th><td>{{$tempData ? $tempData->sl_duration : 0 }} min</td></tr>
                                                                             @endforeach
                                                                      </tbody>
                                                               </table>
                                                        </div>
                                                 </div>
                                                 <div class="col-md-6" style="border-left: 3px solid #f2f2f2;">
                                                        <div class="table-responsive">
                                                               <table class="table table-borderless table-hover" >
                                                                      <tbody>
                                                                             <tr><th> Defective </th><td></td></tr>
                                                                             <tr><th> NG Total </th><td> {{ $prod_actual->ng }} </td></tr>
                                                                             @foreach (DB::table('ng_masters')->lists('reason', 'idng_master') as $idng_master => $reason)
                                                                                    @php
                                                                                           $tempData = $prod_actual->NGs()->where('idng_master', $idng_master)->first();
                                                                                    @endphp
                                                                                    <tr><th>{{$idng_master.'. '.$reason}}</th><td>{{$tempData ? $tempData->ng_qty : 0 }} pcs</td></tr>
                                                                             @endforeach
                                                                      </tbody>
                                                               </table>
                                                        </div>
                                                 </div>
                                          </div>
                                          <hr>
                                          <div class="row">
                                                 <div class="col-md-6">
                                                        <div class="table-responsive">
                                                               <table class="table table-borderless table-hover">
                                                                      <tbody>
                                                                             <tr><th>Total Hours</th><td>{{ $prod_actual->total_hours }} min</td></tr>
                                                                             <tr><th>Total Quantity</th><td> {{ $prod_actual->total_qty }} pcs</td></tr>
                                                                             <tr><th>Material Lot</th><td> {{ $prod_actual->material_lot }} </td></tr>
                                                                      </tbody>
                                                               </table>
                                                        </div>
                                                        <br>
                                                        <a href="/prod_actual">
                                                               <button class="btn btn-primary"><i class="fa fa-backward" aria-hidden="true"></i> &nbsp; Back to Index</button>
                                                        </a>
                                                 </div>
                                          </div>
                                   </div>
                            </div>
                     </div>
              </div>
              {{-- </div> --}}
       @endsection
