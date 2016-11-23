@extends('admin_template')

@section('content')
       {{-- <div class="container"> --}}
       <div class="row">
              <div class="col-md-12">
                     <div class="panel panel-default ">
                            <div class="panel-heading">Search Criteria</div>
                            <div class="panel-body">
                                   <form class="" url="{{url()->full()}}">
                                          <div class="row">
                                                 <div class="col-sm-2 ">
                                                        <div class="form-group">
                                                               <label class="control-label">Date Range</label>
                                                               <div class="input-group">
                                                                      <input type="text" class="form-control iniTanggal" name="date1"
                                                                             value="{{$page_appends['date1'] }}">
                                                                      <span class="input-group-addon calender1"><i class="fa fa-calendar fa-fw"></i></span>
                                                               </div>
                                                        </div>
                                                 </div>
                                                 <div class="col-sm-2 ">
                                                        <div class="form-group">
                                                               <label class="control-label">To</label>
                                                               <div class=" input-group">
                                                                      <input type="text" class="form-control iniTanggal" name="date2"
                                                                             value="{{$page_appends['date2'] }}">
                                                                      <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                                                               </div>
                                                        </div>
                                                 </div>
                                                 <div class="col-sm-2 ">
                                                        <div class="form-group">
                                                               <label class="control-label">Shift</label>
                                                               {!! Form::select(
                                                                      'shift',
                                                                      App\prod_plan::pluck('shift', 'shift'),
                                                                      $page_appends['shift'],
                                                                      ['class' => 'form-control', 'placeholder' => ' = All shift = ']) !!}
                                                        </div>
                                                 </div>
                                          </div>
                                          <br>
                                          <div class="row">
                                                 <div class="col-sm-2">
                                                        <div class="form-group">
                                                               <label class="control-label">MC No</label>
                                                               {!! Form::select(
                                                                      'machine_no',
                                                                      App\prod_plan::pluck('machine_no', 'machine_no'),
                                                                      $page_appends['machine_no'],
                                                                      ['class' => 'form-control', 'placeholder' => ' = All Machines = ']) !!}
                                                        </div>
                                                 </div>

                                                 <div class="col-sm-2">
                                                        <div class="form-group">
                                                               <label class="control-label">Operation</label>
                                                               {!! Form::select(
                                                                      'mold_no',
                                                                      App\prod_plan::pluck('mold_no', 'mold_no'),
                                                                      $page_appends['mold_no'],
                                                                      ['class' => 'form-control', 'placeholder' => ' = All Operations = ']) !!}
                                                        </div>
                                                 </div>

                                                 <div class="col-sm-2">
                                                        {{-- <div class="form-group">
                                                               <label class="control-label">Import Status:</label>
                                                               {!! Form::select(
                                                                      'import_status',
                                                                      array(
                                                                             '0' => 'Not Imported',
                                                                             '1' => 'Imported'
                                                                      ),
                                                                      $page_appends['import_status'],
                                                                      ['class' => 'form-control', 'placeholder' => ' = All Status = ']) !!}
                                                        </div> --}}
                                                 </div>
                                                 <div class="col-sm-6" style="text-align:right;">
                                                        <br><br>
                                                        {!! Form::submit('Reset', ['class' => 'btn btn-primary', 'name' => 'reset']) !!} &nbsp;
                                                        {!! Form::submit('Search', ['class' => 'btn btn-primary', 'name' => 'cari']) !!} &nbsp;
                                                        {{-- {!! Form::submit('Export to CSV', ['class' => 'btn btn-primary', 'name' => 'export']) !!} &nbsp; --}}
                                                        <button type="button" class="btn btn-primary" id="exportCsv">
                                                               Export to CSV
                                                               <i class="fa fa-spinner fa-pulse fa-fw" id="loading"></i>
                                                        </button> 	&nbsp;

                                                 </div>
                                          </div>
                                                 </form>
                                          </div>
                                   </div>


                                   @php
                                   $parameter = '?';
                                   foreach ($page_appends as $key => $value) {
                                          $parameter .= $key.'='.$value.'&';
                                   }
                                   $first = $parameter."page=".$prod_actual->currentPage()."&order=";
                                   $second = "&dir=".($dir ? $dir : 'asc');
                                   $tmpdir = $dir == 'asc' ? 'desc' : 'asc';
                                   $listHead = [
                                          'pp_date' => 'Date',
                                          'shift' => 'Shift',
                                          'machine_no' => 'MC No',
                                          'employee_no' => 'Employee No',
                                          'mold_no'=>'Operation',
                                          'part_no' => 'Part No',
                                          'result' => 'Result',
                                          // 'aplan_qty' => 'Plan Qty',
                                          // 'aplan_shot' => 'Plan Shot',
                                          // 'aplan_time' => 'Actual Plan Time',
                                          // 'aprod_qty' => 'Prod. Qty',
                                          // 'aprod_shot' => 'Prod. Shot',
                                          // 'performance' => 'Performance',
                                          // 'stop_loss' => 'Stop Loss',
                                          // 'ot_ratio' => 'On Time Ratio',
                                          // 'ql_ratio' => 'Quality Ratio',
                                          // 'ng' => 'NG'
                                   ];
                                   @endphp
                                   <div class="panel panel-default">
                                          <div class="panel-heading">Production Result</div>
                                          <div class="panel-body">
                                                 {{-- <a href="{{ url('/prod_actual/create') }}" class="btn btn-primary btn-xs" title="Add New prod_actual"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
                                                 <br/>--}}
                                                 <div class="row">
                                                        <form class="form-inline">
                                                               &nbsp; &nbsp; &nbsp; Show &nbsp;
                                                               {{ Form::select('itemPerPage', array(
                                                                      '5' => '5',
                                                                      '10' => '10',
                                                                      '25' => '25',
                                                                      '100' => '100',
                                                               ), $cek, array(
                                                                      'class' => 'form-control',
                                                                      'onchange' => 'if (this.value) window.location.href="prod_actual'.$parameter.'itemPerPage="+this.value' )) }}
                                                                      &nbsp; entries
                                                               </form>
                                                        </div>
                                                        <br/>
                                                        <div class="table-responsive">
                                                               <table class="table table-borderless">
                                                                      <thead>
                                                                             <tr>
                                                                                    <th> No. </th>
                                                                                    @foreach ($listHead as $key => $value)
                                                                                           <th>
                                                                                                  @if ($key != 'result' && $key!='employee_no')
                                                                                                         <a href="{{$first}}{{$key}}{{$second}}">{{$value}}</a>
                                                                                                  @else
                                                                                                         <dl class="dl-horizontal">
                                                                                                                <dt>{{$value}}</dt>
                                                                                                         </dl>
                                                                                                  @endif
                                                                                                  @if ($order == $key)
                                                                                                         &nbsp;
                                                                                                         <i class="fa fa-sort-{{$tmpdir}}"></i>
                                                                                                  @endif
                                                                                           </th>
                                                                                    @endforeach
                                                                                    <th></th>
                                                                                    {{-- <th> Date </th><th>Shift</th><th>Machine No.</th><th>Employee No.</th><th>Part No.</th>
                                                                                    <th> Plan Qty </th><th> Plan Shot </th><th>Plan Time</th><th>Prod. Qty</th>
                                                                                    <th>Prod. Shot</th><th>Performance</th><th>Stop Loss</th><th>On Time Ratio</th><th>Quality Ratio</th><th>NG</th><th></th> --}}
                                                                             </tr>
                                                                      </thead>
                                                                      <tbody>
                                                                             @php
                                                                             $count = $prod_actual->firstItem();
                                                                             @endphp
                                                                             @foreach($prod_actual as $item)
                                                                                    <tr>
                                                                                           <td>
                                                                                                  {{$count}}.
                                                                                           </td>
                                                                                           <td>{{ date("d M Y", strtotime($item->pp_date))}}</td><td>{{ $item->shift }}</td><td>{{$item->machine_no}}</td>
                                                                                           <td>
                                                                                                  {{-- {{$item->employee_no}} --}}
                                                                                                  <dl class="dl-horizontal ">
                                                                                                         <dt>Operator NIK :</dt>
                                                                                                         <dd>{{ $item->operator_no }}</dd>
                                                                                                         <dt>Leader NIK :</dt>
                                                                                                         <dd>{{ $item->leader_no }}</dd>
                                                                                                  </dl>
                                                                                           </td>
                                                                                           <td>{{$item->mold_no}}</td>
                                                                                           <td>
                                                                                                  {{$item->part_no}}
                                                                                                  {{-- @php
                                                                                                  $data = DB::table('prod_plans')->where([
                                                                                                         ['pp_date', '=', $item->pp_date],
                                                                                                         ['shift','=', $item->shift],
                                                                                                         ['machine_no', '=', $item->machine_no],
                                                                                                         ['mold_only', '=', $item->mold_only]
                                                                                                  ])->get();
                                                                                                  @endphp
                                                                                                  @foreach ($data as $key => $value)
                                                                                                         {{$value->part_no}}<br>
                                                                                                  @endforeach --}}
                                                                                           </td>
                                                                                           <td>
                                                                                                  <dl class="dl-horizontal ">
                                                                                                         <dt>Production Plan :</dt>
                                                                                                         <dd>{{ $item->pp_qty }} pcs &nbsp;{{ $item->pp_shot }} shot</dd>
                                                                                                         <dt>Actual Plan :</dt>
                                                                                                         <dd>{{ $item->aplan_qty }} pcs &nbsp;{{ $item->aplan_shot }} shot</dd>
                                                                                                         <dt>Actual Production :</dt>
                                                                                                         <dd>{{ $item->aprod_qty }} pcs &nbsp;{{ $item->aprod_shot }} shot</dd>
                                                                                                  </dl>
                                                                                           </td>
                                                                                           <td>
                                                                                                  <dl class="dl-horizontal ">
                                                                                                         <dt>Performance :</dt>
                                                                                                         <dd>{{ $item->performance }} %</dd>
                                                                                                         <dt>Stop Loss :</dt>
                                                                                                         <dd>{{ $item->stop_loss }} min</dd>
                                                                                                         <dt>On Time Ratio :</dt>
                                                                                                         <dd>{{ $item->ot_ratio }} %</dd>
                                                                                                  </dl>
                                                                                           </td>
                                                                                           <td>
                                                                                                  <dl class="dl-horizontal ">
                                                                                                         <dt>Quality Ratio :</dt>
                                                                                                         <dd>{{ $item->ql_ratio }} %</dd>
                                                                                                         <dt>NG :</dt>
                                                                                                         <dd>{{ $item->ng }} pcs</dd>
                                                                                                  </dl>
                                                                                           </td>
                                                                                           {{-- <td>{{ $item->aplan_qty }}</td><td>{{ $item->aplan_shot }}</td> --}}
                                                                                           {{-- <td>{{ $item->aplan_time }}</td> --}}
                                                                                           {{-- <td>{{ $item->aprod_qty }}</td><td>{{ $item->aprod_shot }}</td> --}}
                                                                                           {{-- <td>{{ $item->performance }} %</td><td>{{ $item->stop_loss }}</td><td>{{ $item->ot_ratio }} %</td> --}}
                                                                                           {{-- <td>{{ $item->ql_ratio }} %</td><td>{{ $item->ng }}</td> --}}
                                                                                           <td>
                                                                                                  <a href="{{ url('/prod_actual/' . $item->idprod_actual) }}" class="btn btn-success btn-xs" title="View prod_actual"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                                                                                                  {{-- <a href="{{ url('/prod_actual/' . $item->idprod_actual . '/edit') }}" class="btn btn-primary btn-xs" title="Edit prod_actual"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a> --}}
                                                                                                  {!! Form::open([
                                                                                                         'method'=>'DELETE',
                                                                                                         'url' => ['/prod_actual', $item->idprod_actual],
                                                                                                         'style' => 'display:inline'
                                                                                                         ]) !!}
                                                                                                         {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete prod_actual" />', array(
                                                                                                                'type' => 'submit',
                                                                                                                'class' => 'btn btn-danger btn-xs',
                                                                                                                'title' => 'Delete prod_actual',
                                                                                                                'onclick'=>'return confirm("Confirm delete?")'
                                                                                                         )) !!}
                                                                                                         {!! Form::close() !!}
                                                                                                  </td>
                                                                                           </tr>
                                                                                           @php
                                                                                           $count++;
                                                                                           @endphp
                                                                                    @endforeach
                                                                             </tbody>
                                                                      </table>
                                                                      <div class="col-md-6">
                                                                             <br>
                                                                             Showing <b>{{$prod_actual->firstItem()}}</b> to <b>{{$prod_actual->lastItem()}}</b> of <b>{{$prod_actual->total()}}</b>  entries
                                                                      </div>
                                                                      <div class="pagination-wrapper col-md-6" style="text-align:right;">
                                                                             {!! $prod_actual->appends($page_appends)->render() !!}
                                                                      </div>
                                                                      {{-- <div class="pagination-wrapper"> {!! $prod_actual->render() !!} </div> --}}
                                                               </div>

                                                        </div>
                                                 </div>
                                          </div>
                                   </div>

                                   <script type="text/javascript">
                                   $( document ).ready(function() {
                                          $( ".iniTanggal" ).datepicker({
                                                 format: "dd M yyyy"
                                          });
                                          $("#loading").hide();
                                          $("#exportCsv").click(function(){
                                                        // alert("tampan");
                                                        $("#loading").show();
                                                        ExportCSV();
                                          });

                                          function ExportCSV() {
                                                 $.ajax({
                                                        async: true,
                                                        type: "GET",
                                                        dataType: "html", // or html if you want...
                                                        contentType: false, // high importance!
                                                        url: '{{ action('prod_actualController@exportCsv') }}', // you need change it.
                                                        // data: formdata, // high importance!
                                                        // processData: false, // high importance!
                                                        success: function (res) {
                                                               // alert(res);
                                                               $("#loading").hide();
                                                               window.location = res;
                                                               // location.reload();
                                                        }
                                                 });
                                          }
                                   });
                                   </script>
                                   {{-- </div> --}}
                            @endsection
