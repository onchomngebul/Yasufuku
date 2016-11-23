@extends('admin_template')

@section('content')
       {{-- <div class="container"> --}}
       <div class="row">
              <div class="col-md-12">
                     <div class="panel panel-default ">
                            <div class="panel-heading">Search Criteria</div>
                            <div class="panel-body">
                                   <form class="" url="/">
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
                                          </div>
                                          <br>
                                          <div class="row">
                                                 <div class="col-sm-2">
                                                        <div class="form-group">
                                                               <label class="control-label">MC No</label>
                                                               {!! Form::select(
                                                                      'machine_no',
                                                                      App\prod_cycle::pluck('machine_no', 'machine_no'),
                                                                      $page_appends['machine_no'],
                                                                      ['class' => 'form-control', 'placeholder' => ' = All Machines = ']) !!}
                                                        </div>
                                                 </div>
                                                 <div class="col-sm-6 col-sm-offset-4" style="text-align:right;">
                                                        <br><br>
                                                        {!! Form::submit('Reset', ['class' => 'btn btn-primary', 'name' => 'reset']) !!} &nbsp;
                                                        {!! Form::submit('Search', ['class' => 'btn btn-primary', 'name' => 'cari']) !!} &nbsp;
                                                        {{-- <button type="button" class="btn btn-primary">Export to CSV</button> 	&nbsp; --}}
                                                        <button type="button" class="btn btn-primary" id="exportCsv">
                                                               Export to CSV
                                                               <i class="fa fa-spinner fa-pulse fa-fw" id="loading"></i>
                                                        </button> 	&nbsp;
                                                 </div>
                                          </div>
                                                 </form>
                                          </div>
                                   </div>

                                   <div class="panel panel-default">
                                          <div class="panel-heading">Production Cycle</div>
                                          <div class="panel-body">
                                                 {{-- <a href="{{ url('/prod_cycle/create') }}" class="btn btn-primary btn-xs" title="Add New prod_cycle"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
                                                 <br/> --}}
                                                 <div class="row">
                                                        <form class="form-inline" url="/">
                                                               &nbsp; &nbsp; &nbsp; Show &nbsp;
                                                               {{ Form::select('itemPerPage', array(
                                                                      '5' => '5',
                                                                      '10' => '10',
                                                                      '25' => '25',
                                                                      '100' => '100',
                                                               ), $cek, array('class' => 'form-control', 'onchange' => 'this.form.submit()' )) }}
                                                               &nbsp; entries
                                                        </form>
                                                 </div>
                                                 <br/>
                                                 <div class="table-responsive">
                                                        <table class="table table-borderless">
                                                               <thead>
                                                                      <tr>
                                                                             <th> No. </th>
                                                                             @php
                                                                             $first = "?page=".$prod_cycle->currentPage()."&order=";
                                                                             $second = "&dir=".($dir ? $dir : 'asc');
                                                                             $tmpdir = $dir == 'asc' ? 'desc' : 'asc';
                                                                             $listHead = [
                                                                                    'cycle_date' => 'Date',
                                                                                    'machine_no' => 'MC No',
                                                                                    'shot' => 'Shot',
                                                                                    'start' => 'Start',
                                                                                    'end' => 'End',
                                                                                    'duration' => 'Duration',
                                                                                    'note' => 'Note'
                                                                             ];
                                                                             @endphp
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
                                                                      $count = $prod_cycle->firstItem();
                                                                      @endphp
                                                                      @foreach($prod_cycle as $item)
                                                                             <tr>
                                                                                    <td>
                                                                                           {{$count}}.
                                                                                    </td>
                                                                                    <td>{{ date("d M Y", strtotime($item->cycle_date))}}</td>
                                                                                    <td>{{ $item->machine_no }}</td>
                                                                                    <td>{{ $item->shot }}</td><td>{{ $item->start }}</td><td>{{ $item->end }}</td>
                                                                                    <td>{{ $item->duration }}</td><td>{{ $item->note }}</td>
                                                                                    <td>
                                                                                           {{-- <a href="{{ url('/prod_cycle/' . $item->idprod_cycle) }}" class="btn btn-success btn-xs" title="View prod_cycle"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a> --}}
                                                                                           {{-- <a href="{{ url('/prod_cycle/' . $item->idprod_cycle . '/edit') }}" class="btn btn-primary btn-xs" title="Edit prod_cycle"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a> --}}
                                                                                           {!! Form::open([
                                                                                                  'method'=>'DELETE',
                                                                                                  'url' => ['/prod_cycle', $item->idprod_cycle],
                                                                                                  'style' => 'display:inline'
                                                                                                  ]) !!}
                                                                                                  {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete prod_cycle" />', array(
                                                                                                         'type' => 'submit',
                                                                                                         'class' => 'btn btn-danger btn-xs',
                                                                                                         'title' => 'Delete prod_cycle',
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
                                                                      Showing <b>{{$prod_cycle->firstItem()}}</b> to <b>{{$prod_cycle->lastItem()}}</b> of <b>{{$prod_cycle->total()}}</b>  entries
                                                               </div>
                                                               <div class="pagination-wrapper col-md-6" style="text-align:right;">
                                                                      {!! $prod_cycle->appends($page_appends)->render() !!}
                                                               </div>
                                                               {{-- <div class="pagination-wrapper"> {!! $prod_cycle->render() !!} </div> --}}
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
                                                 url: '{{ action('prod_cycleController@exportCsv') }}', // you need change it.
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
