@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
    <div class="row">
              <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-primary">
                  <div class="card-body pb-0">
                    <div class="btn-group float-right">
                      <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon-settings"></i></button>
                      <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
                    </div>
                    <div class="text-value">{{$countproductosconfigurables}}</div>
                    <b> Cantidad de Productos configurables</b>
                  </div>
                  <div class="chart-wrapper mt-3 mx-3" style="height:70px;"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                    <canvas class="chart chartjs-render-monitor" id="card-chart1" height="70" width="350" style="display: block;"></canvas>
                  </div>
                </div>
              </div>
              <!-- /.col-->
              <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-success">
                  <div class="card-body pb-0">
                    <button class="btn btn-transparent p-0 float-right" type="button"><i class="icon-location-pin"></i></button>
                    <div class="text-value">{{$countsku}}</div>
                    <b>SKU en i_Point</b>
                  </div>
                  <div class="chart-wrapper mt-3 mx-3" style="height:70px;"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                    <canvas class="chart chartjs-render-monitor" id="card-chart2" height="70" width="348" style="display: block;"></canvas>
                  </div>
                </div>
              </div>
              <!-- /.col-->
              <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-warning">
                  <div class="card-body pb-0">
                    <div class="btn-group float-right">
                      <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon-settings"></i></button>
                      <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
                    </div>
                    <div class="text-value">9.823</div>
                    <div>Members online</div>
                  </div>
                  <div class="chart-wrapper mt-3" style="height:70px;"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                    <canvas class="chart chartjs-render-monitor" id="card-chart3" height="70" width="382" style="display: block;"></canvas>
                  </div>
                </div>
              </div>
              <!-- /.col-->
              <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-dark">
                  <div class="card-body pb-0">
                    <div class="btn-group float-right">
                      <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon-settings"></i></button>
                      <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
                    </div>
                    <div class="text-value">9.823</div>
                    <div>Members online</div>
                  </div>
                  <div class="chart-wrapper mt-3 mx-3" style="height:70px;"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                    <canvas class="chart chartjs-render-monitor" id="card-chart4" height="70" width="348" style="display: block;"></canvas>
                  </div>
                </div>
              </div>
              <!-- /.col-->
            </div>
@stop
