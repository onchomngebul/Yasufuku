@extends('admin_template')

@section('content')
    {{-- <div class="container"> --}}
        <div class="row">
            <div class="col-md-12">
                   <a href="/prod_plans"><i class="fa fa-backward" aria-hidden="true"></i> &nbsp; Back to Index</a>
                <div class="panel panel-default">
                    <div class="panel-heading">Ref No : {{ $prod_plan->order_id }}</div>
                    <div class="panel-body">

                        {{-- <a href="{{ url('prod_plans/' . $prod_plan->idprod_plans . '/edit') }}" class="btn btn-primary btn-xs" title="Edit prod_plan"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a> --}}
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['prod_plans', $prod_plan->idprod_plans],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete prod_plan',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                       @php
                                       $data = DB::table('prod_plans')->where([
                                              ['pp_date', '=', $prod_plan->pp_date],
                                              ['shift','=', $prod_plan->shift],
                                              ['machine_no', '=', $prod_plan->machine_no],
                                              ['mold_only', '=', $prod_plan->mold_only]
                                       ])->get();

                                       $listHead = [
                                              'pp_date' => 'Tanggal',
                                              'shift' => 'Shift',
                                              'machine_no' => 'MC No',
                                          //     'employee_no'=>'Employee No',
                                              'order_seq' => 'Seq No',
                                              'order_id' => 'Ref No',
                                              'mold_no' => 'Operation',
                                              'part_no' => 'Part No',
                                              'item_desc' => 'Part Name',
                                              'cav_no' => 'Cavity No',
                                              'cycle_tm' => 'Cycle Time',
                                              'schedule_tm' => 'Schedule Time',
                                              'pp_qty'=>'Production Plan Qty',
                                              'pp_shot'=>'Production Plan Shot',
                                              'machine_grp' => 'MC Group',
                                              'process_type' => 'Group',
                                              'item_unit' => 'Unit',
                                              'paralel_process' => 'Rsc Esc',
                                              'import_status' => 'Import Status'
                                       ]
                                       @endphp
                                       @foreach ($listHead as $key => $value)
                                              <tr>
                                                     <th>
                                                            {{$value}}
                                                     </th>
                                                     <td>
                                                            @if ($key=='import_status')
                                                                   @if ($prod_plan->import_status)
                                                                          <span class="label label-success">Imported</span>
                                                                   @else
                                                                          <span class="label label-danger">Not Imported</span>
                                                                   @endif
                                                            {{-- @elseif ($key=='part_no')
                                                                   @foreach ($data as $key => $value)
                                                                          {{$value->part_no}} : [{{$value->item_desc}}]<br>
                                                                   @endforeach --}}
                                                            @else
                                                                   {{$prod_plan->$key}}
                                                            @endif
                                                     </td>
                                              </tr>
                                       @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    {{-- </div> --}}
@endsection
