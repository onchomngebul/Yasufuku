@extends('admin_template')

@section('content')
       <div class="row">
              <div class="col-lg-3 col-xs-6">
                     <!-- small box -->
                     <div class="small-box bg-aqua">
                            <div class="inner">
                                   <h3>5</h3>
                                   <p>Production Plans</p>
                            </div>
                            <div class="icon">
                                   <i class="ion ion-bag"></i>
                            </div>
                            <a href="/prod_plans" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                     </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-xs-6">
                     <!-- small box -->
                     <div class="small-box bg-green">
                            <div class="inner">
                                   <h3>2</h3>
                                   <p>Production Actual</p>
                            </div>
                            <div class="icon">
                                   <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="/prod_actual" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                     </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-xs-6">
                     <!-- small box -->
                     <div class="small-box bg-yellow">
                            <div class="inner">
                                   <h3>10</h3>
                                   <p>Production Cycle</p>
                            </div>
                            <div class="icon">
                                   <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="/prod_cycle" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                     </div>
              </div>
              <!-- ./col -->
       </div>
@endsection
