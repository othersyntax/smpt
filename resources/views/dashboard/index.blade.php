@extends('layout.main')
@section('breadcrumb')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Dashboard</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Utama</li>
            </ol>
        </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
@endsection
@section('custom-css')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {
      'packages':['geochart']
    });
    google.charts.setOnLoadCallback(drawRegionsMap);

    function drawRegionsMap() {

      var data = new google.visualization.DataTable();
      data.addColumn('string', 'State');
      data.addColumn('number', 'Bil. Lot Tanah');
      data.addRows([
        [{v:'MY-16', f:' W.P. Putrajaya'}, 5],
        [{v:'MY-15', f:' W.P. Labuan'}, 11],
        [{v:'MY-14', f:' W.P. Kuala Lumpur'}, 54],
        [{v:'MY-13', f:' Sarawak'}, 426],
        [{v:'MY-12', f:' Sabah'}, 370],
        [{v:'MY-11', f:' Terengganu'}, 315],
        [{v:'MY-10', f:' Selangor'}, 342],
        [{v:'MY-09', f:' Perlis'}, 61],
        [{v:'MY-08', f:' Perak'}, 558],
        [{v:'MY-07', f:' Pulau Pinang'}, 155],
        [{v:'MY-06', f:' Pahang'}, 516],
        [{v:'MY-05', f:' Negeri Sembilan'}, 260],
        [{v:'MY-04', f:' Melaka'}, 209],
        [{v:'MY-03', f:' Kelantan'}, 400],
        [{v:'MY-02', f:' Kedah'}, 444],
        [{v:'MY-01', f:' Johor'}, 605],
      ]);

      var options = {
        region: 'MY',
        displayMode: 'regions',
        resolution: 'provinces',
        
        // colorAxis: {colors: ['white', 'purple']},
        colorAxis: {colors: ['#e31b23', 'black', '#cb4eed']},
        // backgroundColor: '#81d4fa',
        // datalessRegionColor: '#f8bbd0',
        // defaultColor: '#f5f5f5',

        height: 400,
        width: 1024,
      };

      var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

      chart.draw(data, options);
    }
</script>
@endsection
@section('content')
  @php
      foreach($milik as $mdata){
        $bilot = $mdata->BIL;
        $ptp = $mdata->PTP;
        $rizab = $mdata->RIZAB;
        $felda = $mdata->FELDA;
        $felcra = $mdata->FELCRA;
        $kesedar = $mdata->KESEDAR;
        $lada = $mdata->LADA;
      }
  @endphp
    <div class="row">          
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
          <span class="info-box-icon bg-info elevation-1"><i class="fas fa-map"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Lot Tanah</span>
            <span class="info-box-number"> {{ $bilot }} </span>
          </div>
        <!-- /.info-box-content -->
        </div>
          <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-map-signs"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">PTP</span>
            <span class="info-box-number">{{ $ptp }}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <!-- fix for small devices only -->
      <div class="clearfix hidden-md-up"></div>
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-success elevation-1"><i class="fas fa-map-pin"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Bukan PTP</span>
            <span class="info-box-number">{{ $rizab + $felda + $felcra + $kesedar + $lada }}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-exclamation"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Isu Tanah</span>
            <span class="info-box-number">80</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->    
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Maklumat Tanah Negeri</h5>
                    <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                      <div id="regions_div"></div>
                    </div>
                  </div>
                  <!-- /.row -->
                </div>
                <!-- ./card-body -->
            </div>
            <!-- /.card -->
        </div>
        <div class="col-md-12">
          <div class="card">
              <div class="card-header">
                  <h5 class="card-title">Maklumat Tanah Negeri</h5>
                  <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                  </button>
                  </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                      <p class="text-center">
                      {{-- <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong> --}}
                      </p>

                      <div class="chart">
                        <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                      </div>
                      <!-- /.chart-responsive -->
                  </div>
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
              <div class="card-footer">
                  <div class="row">
                      {{-- <div class="col-sm-3 col-6">
                          <div class="description-block border-right">
                          <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 17%</span>
                          <h5 class="description-header">$35,210.43</h5>
                          <span class="description-text">TOTAL REVENUE</span>
                          </div>
                          <!-- /.description-block -->
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-3 col-6">
                          <div class="description-block border-right">
                          <span class="description-percentage text-warning"><i class="fas fa-caret-left"></i> 0%</span>
                          <h5 class="description-header">$10,390.90</h5>
                          <span class="description-text">TOTAL COST</span>
                          </div>
                          <!-- /.description-block -->
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-3 col-6">
                          <div class="description-block border-right">
                          <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 20%</span>
                          <h5 class="description-header">$24,813.53</h5>
                          <span class="description-text">TOTAL PROFIT</span>
                          </div>
                          <!-- /.description-block -->
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-3 col-6">
                          <div class="description-block">
                          <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i> 18%</span>
                          <h5 class="description-header">1200</h5>
                          <span class="description-text">GOAL COMPLETIONS</span>
                          </div>
                          <!-- /.description-block -->
                      </div> --}}
                  </div>
                  <!-- /.row -->
              </div>
              <!-- /.card-footer -->
          </div>
          <!-- /.card -->
      </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Main row -->
    <div class="row">
      <!-- Left col -->
      <div class="col-md-6">
        <!-- /.col -->
        <div class="card-body">
          <p class="text-center">
          <strong>Jenis Hakmilik</strong>
          </p>

          <div class="progress-group">
            PTP
            <span class="float-right"><b>{{$ptp}}</b>/{{$bilot}}</span>
            <div class="progress progress-sm">
                <div class="progress-bar bg-primary" style="width: {{ $ptp/$bilot*100 }}%"></div>
            </div>
          </div>
          <!-- /.progress-group -->

          <div class="progress-group">
            Rizab Negeri
            <span class="float-right"><b>{{$rizab}}</b>/{{$bilot}}</span>
            <div class="progress progress-sm">
                <div class="progress-bar bg-danger" style="width: {{ $rizab/$bilot*100 }}%"></div>
            </div>
          </div>
          <!-- /.progress-group -->
          <div class="progress-group">
              FELDA
              <span class="float-right"><b>{{$felda}}</b>/{{$bilot}}</span>
              <div class="progress progress-sm">
                  <div class="progress-bar bg-warning" style="width: {{ $felda/$bilot*100 }}%"></div>
              </div>
          </div>
          <div class="progress-group">
              FELCRA
              <span class="float-right"><b>{{$felcra}}</b>/{{$bilot}}</span>
              <div class="progress progress-sm">
                  <div class="progress-bar bg-success" style="width: {{ $felcra/$bilot*100 }}%"></div>
              </div>
          </div>
          <div class="progress-group">
              KESEDAR
              <span class="float-right"><b>{{$kesedar}}</b>/{{$bilot}}</span>
              <div class="progress progress-sm">
                  <div class="progress-bar bg-primary" style="width: {{ $kesedar/$bilot*100 }}%"></div>
              </div>
          </div>
          <div class="progress-group">
              LADA
              <span class="float-right"><b>{{$lada}}</b>/{{$bilot}}</span>
              <div class="progress progress-sm">
                  <div class="progress-bar bg-success" style="width: {{ $lada/$bilot*100 }}%"></div>
              </div>
          </div>
          <!-- /.progress-group -->
      </div>
      <!-- /.col -->
        <!-- /.card -->
      </div>
      <!-- /.col -->

      <div class="col-md-6">            
        <div class="card-body">
          <p class="text-center">
            <strong>Isu-isu</strong>
          </p>
          <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
@endsection
@section('js')
  <script src="{{ asset('/template/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
  <script src="{{ asset('/template/plugins/raphael/raphael.min.js') }}"></script>
  <script src="{{ asset('/template/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
  <script src="{{ asset('/template/plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
  <!-- ChartJS -->
  <script src="{{ asset('/template/plugins/chart.js/Chart.min.js') }}"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="{{ asset('/dist/js/pages/dashboard2.js') }}"></script>
  <script>
    $(function () {
      /* ChartJS
       * -------
       * Here we will create a few charts using ChartJS
       */
  
  
      var areaChartData = {
        labels  : {!! json_encode($xdata) !!},
        datasets: [
          {
            label               : 'Tanah',
            backgroundColor     : 'rgba(124,0,165,1)',
            borderColor         : 'rgba(124,0,165,1)',
            pointRadius          : false,
            pointColor          : '#3b8bba',
            pointStrokeColor    : 'rgba(124,0,165,1)',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(124,0,165,1)',
            data                : {!! json_encode($ydata) !!}
          },
        ]
      }

      // Data pie chart isu-isu
      var donutData        = {
        labels: [
            'Penyewaan',
            'Pengambilan',
            'Serah Balik',
            'Pajakan',
            'Tukar Guna',
            'Pencerobohan',
        ],
        datasets: [
          {
            data: [700,500,400,600,300,100],
            backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
          }
        ]
      }

      //-------------
      //- PIE CHART -
      //-------------
      // Get context with jQuery - using jQuery's .get() method.
      var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
      var pieData        = donutData;
      var pieOptions     = {
        maintainAspectRatio : false,
        responsive : true,
      }
      //Create pie or douhnut chart
      // You can switch between pie and douhnut using the method below.
      new Chart(pieChartCanvas, {
        type: 'pie',
        data: pieData,
        options: pieOptions
      })
  
      //-------------
      //- BAR CHART -
      //-------------
      var barChartCanvas = $('#barChart').get(0).getContext('2d')
      var barChartData = $.extend(true, {}, areaChartData)
      // var temp0 = areaChartData.datasets[0]
      var temp1 = areaChartData.datasets[0]
      barChartData.datasets[0] = temp1
      // barChartData.datasets[1] = temp0
  
      var barChartOptions = {
        responsive              : true,
        maintainAspectRatio     : false,
        datasetFill             : false
      }
  
      new Chart(barChartCanvas, {
        type: 'bar',
        data: barChartData,
        options: barChartOptions
      })

    })
  </script>

@endsection