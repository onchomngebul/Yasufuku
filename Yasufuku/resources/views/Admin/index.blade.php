@extends('admin_template')

@section('content')

       <div class="row">
              <div class="col-md-12">
                     <div class="panel panel-default ">
                            <div class="panel-heading">User Search</div>
                            <div class="panel-body">
                                   <form class="" url="{{url()->full()}}">
                                          <div class="row">
                                                 <div class="col-sm-2">
                                                        <div class="form-group">
                                                               <label class="control-label">Email Address</label>
                                                               <input type="text" class="form-control" name="email"
                                                                      value="{{$page_appends['email'] }}">
                                                        </div>
                                                 </div>

                                                 <div class="col-sm-2">
                                                        <div class="form-group">
                                                               <label class="control-label">Name</label>
                                                               <input type="text" class="form-control" name="name"
                                                                      value="{{$page_appends['name'] }}">
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
                     $first = $parameter."page=".$User->currentPage()."&order=";
                     $second = "&dir=".($dir ? $dir : 'asc');
                     $tmpdir = $dir == 'asc' ? 'desc' : 'asc';
                     $listHead = [
                            'email'=>'Email Address',
                            'name'=>'Name',
                            'employee_no'=>'Employee No',
                            'role'=>'Role',
                     ]
                     @endphp

                                   <div class="panel panel-default">
                                          <div class="panel-heading">Production Plan View</div>
                                          <div class="panel-body">
                                                 <div class="row">
                                                        <div class="col-md-10">
                                                               <form class="form-inline" url="/">
                                                                      &nbsp; &nbsp; &nbsp; Show &nbsp;
                                                                      {{ Form::select('itemPerPage', array(
                                                                             '5' => '5',
                                                                             '10' => '10',
                                                                             '25' => '25',
                                                                             '100' => '100',
                                                                      ), $cek, array(
                                                                             'class' => 'form-control',
                                                                             'onchange' => 'if (this.value) window.location.href="admin'.$parameter.'itemPerPage="+this.value' )) }}
                                                                      &nbsp; entries
                                                               </form>
                                                        </div>
                                                        <div class="col-md-2">
                                                               <a href="{{ url('/admin/create') }}" class="btn btn-primary btn-xs" title="Add New User"><span class="glyphicon glyphicon-plus" aria-hidden="true"/> New User</a>
                                                        </div>
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
                                                                      $count = $User->firstItem();
                                                                      @endphp
                                                                      @foreach($User as $item)
                                                                             <tr>
                                                                                    <td>
                                                                                           {{$count}}.
                                                                                    </td>
                                                                                    <td>{{ $item->email }}</td><td>{{ $item->name }}</td>
                                                                                    <td>{{ $item->employee_no }}</td><td>{{ $item->role }}</td>
                                                                                    <td>
                                                                                           {{-- <a href="{{ url('/admin/' . $item->id) }}" class="btn btn-success btn-xs" title="View prod_plan"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a> --}}
                                                                                           <a href="{{ url('/admin/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit prod_plan"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                                                                                           {!! Form::open([
                                                                                                  'method'=>'DELETE',
                                                                                                  'url' => ['/admin', $item->id],
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
                                                                      Showing <b>{{$User->firstItem()}}</b> to <b>{{$User->lastItem()}}</b> of <b>{{$User->total()}}</b>  entries
                                                               </div>
                                                               <div class="pagination-wrapper col-md-6" style="text-align:right;">
                                                                      {!! $User->appends($page_appends)->render() !!}
                                                               </div>

                                                        </div>

                                                 </div>
                                          </div>
                                   </div>
                            </div>

                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                            <script type="text/javascript">
                            jQuery(document).ready(function ($) {

                            });

                            </script>
                     @endsection
