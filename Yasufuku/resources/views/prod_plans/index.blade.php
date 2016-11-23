@extends('admin_template')

@section('content')

       <div class="row">
              <div class="col-md-12">
                     <div class="panel panel-default ">
                            <div class="panel-heading">Upload Production Plan</div>
                            <div class="panel-body">
                                   <form class="form-inline" method="post" action="" name="uploadForm">
                                          {!! csrf_field() !!}
                                          <div class="form-group">
                                                 {{-- <label class="sr-only" for="email">File Name </label> --}}
                                                 File Name :
                                                 <input type="text" class="form-control" id="namefile" readonly="true">
                                                 <label class="btn btn-default btn-file">
                                                        Browse <input type="file" style="display: none;" id="fileCSV" name="fileCSV">
                                                 </label>
                                                 <i class="fa fa-spinner fa-pulse fa-2x fa-fw" id="loading"></i>
                                          </div>
                                   </form>
                            </div>
                     </div>

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
                                                        <div class="form-group">
                                                               <label class="control-label">Import Status</label>
                                                               {!! Form::select(
                                                                      'import_status',
                                                                      array(
                                                                             '0' => 'Not Imported',
                                                                             '1' => 'Imported'
                                                                      ),
                                                                      $page_appends['import_status'],
                                                                      ['class' => 'form-control', 'placeholder' => ' = All Status = ']) !!}
                                                        </div>
                                                 </div>
                                                 <div class="col-sm-6" style="text-align:right;">
                                                        <br><br>
                                                        {!! Form::submit('Reset', ['class' => 'btn btn-primary', 'name' => 'reset']) !!} &nbsp;
                                                        {!! Form::submit('Search', ['class' => 'btn btn-primary', 'name' => 'cari']) !!} &nbsp;
                                                        {{-- <button type="button" class="btn btn-primary">Export to CSV</button> 	&nbsp; --}}
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
                     $first = $parameter."page=".$prod_plans->currentPage()."&order=";
                     $second = "&dir=".($dir ? $dir : 'asc');
                     $tmpdir = $dir == 'asc' ? 'desc' : 'asc';
                     $listHead = [
                            'pp_date'=>'Date',
                            'shift'=>'Shift',
                            'machine_no'=>'MC No',
                            // 'employee_no'=>'Employee No',
                            'mold_no'=>'Operation',
                            'part_no'=>'Part No',
                            'schedule_tm'=>'Schedule Time',
                            'cycle_tm'=>'Cycle Time',
                            'cav_no'=>'Cavity No',
                            // 'pp_qty'=>'Prod Plan Qty',
                            // 'pp_shot'=>'Prod Plan Shot',
                            'import_status' => 'Import Status'
                     ]
                     @endphp

                                   <div class="panel panel-default">
                                          <div class="panel-heading">Production Plan View</div>
                                          <div class="panel-body">
                                                 {{-- <a href="{{ url('/prod_plans/create') }}" class="btn btn-primary btn-xs" title="Add New prod_plan"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
                                                 <br/>--}}
                                                 <div class="row">
                                                        <form class="form-inline" url="/">
                                                               &nbsp; &nbsp; &nbsp; Show &nbsp;
                                                               {{ Form::select('itemPerPage', array(
                                                                      '5' => '5',
                                                                      '10' => '10',
                                                                      '25' => '25',
                                                                      '100' => '100',
                                                               ), $cek, array(
                                                                      'class' => 'form-control',
                                                                      'onchange' => 'if (this.value) window.location.href="prod_plans'.$parameter.'itemPerPage="+this.value' )) }}
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
                                                                                           <a href="{{$first}}{{$key}}{{$second}}">{{$value}}</a>&nbsp;
                                                                                           @if ($order == $key)
                                                                                                  <i class="fa fa-sort-{{$tmpdir}}"></i>
                                                                                           @endif
                                                                                    </th>
                                                                             @endforeach
                                                                             <th></th>
                                                                      </tr>
                                                               </thead>
                                                               <tbody>
                                                                      @php
                                                                      $count = $prod_plans->firstItem();
                                                                      @endphp
                                                                      @foreach($prod_plans as $item)
                                                                             <tr>
                                                                                    <td>
                                                                                           {{$count}}.
                                                                                    </td>
                                                                                    <td>{{ date("d M Y", strtotime($item->pp_date)) }}</td>
                                                                                    <td>{{ $item->shift }}</td><td>{{ $item->machine_no }}</td>
                                                                                    {{-- <td>{{ $item->employee_no }}</td> --}}
                                                                                    <td>{{ $item->mold_no }}</td>
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
                                                                                    <td>{{ $item->schedule_tm }}</td><td>{{ $item->cycle_tm }}</td><td>{{ $item->cav_no }}</td>
                                                                                    {{-- <td>{{ $item->pp_qty }}</td><td>{{ $item->pp_shot }}</td> --}}
                                                                                    @if ($item->import_status)
                                                                                           <td><span class="label label-success">Imported</span></td>
                                                                                    @else
                                                                                           <td><span class="label label-danger">Not Imported</span></td>
                                                                                    @endif

                                                                                    <td>
                                                                                           <a href="{{ url('/prod_plans/' . $item->idprod_plans) }}" class="btn btn-success btn-xs" title="View prod_plan"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                                                                                           {{-- <a href="{{ url('/prod_plans/' . $item->idprod_plans . '/edit') }}" class="btn btn-primary btn-xs" title="Edit prod_plan"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a> --}}
                                                                                           {!! Form::open([
                                                                                                  'method'=>'DELETE',
                                                                                                  'url' => ['/prod_plans', $item->idprod_plans],
                                                                                                  'style' => 'display:inline'
                                                                                                  ]) !!}
                                                                                                  {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete prod_plan" />', array(
                                                                                                         'type' => 'submit',
                                                                                                         'class' => 'btn btn-danger btn-xs',
                                                                                                         'title' => 'Delete prod_plan',
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
                                                                      Showing <b>{{$prod_plans->firstItem()}}</b> to <b>{{$prod_plans->lastItem()}}</b> of <b>{{$prod_plans->total()}}</b>  entries
                                                               </div>
                                                               <div class="pagination-wrapper col-md-6" style="text-align:right;">
                                                                      {!! $prod_plans->appends($page_appends)->render() !!}
                                                               </div>

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
                            });
                            </script>

                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                            <script type="text/javascript">
                            jQuery(document).ready(function ($) {
                                   $("#namefile").val("");
                                   $("#loading").hide();
                                   $("#fileCSV").change(function() {
                                          var filename = $('input[type=file]').val().split('\\').pop();
                                          $("#namefile").val(filename);
                                          sendFile(this.files[0]);
                                          $("#loading").show();
                                          // alert("tampan dan berani");
                                   });

                                   function sendFile(file) {
                                          // alert(file);
                                          var form = document.forms.namedItem("uploadForm"); // high importance!, here you need change "yourformname" with the name of your form
                                          var formdata = new FormData(form); // high importance!

                                          $.ajax({
                                                 async: true,
                                                 type: "POST",
                                                 dataType: "html", // or html if you want...
                                                 contentType: false, // high importance!
                                                 url: '{{ action('prod_plansController@uploadFile') }}', // you need change it.
                                                 data: formdata, // high importance!
                                                 processData: false, // high importance!
                                                 success: function (res) {
                                                        alert(res);
                                                        $("#loading").hide();
                                                        location.reload();
                                                 }
                                                 // timeout: 10000
                                          });
                                   }
                            });

                            </script>
                     @endsection
