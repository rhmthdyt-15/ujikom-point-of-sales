@extends('layouts.master')

@section('title')
Dashboard
@endsection


@section('content')
<div class="row">
    <div class="col-sm-12 mb-4">
        <div class="card-group">
            <div class="card col-md-6 no-padding ">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fa fa-users"></i>
                    </div>

                    <div class="h4 mb-0">
                        <span class="count">{{ $user }}</span>
                    </div>

                    <small class="text-muted text-uppercase font-weight-bold">User</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-1" style="width: 40%; height: 5px;"></div>
                    <div class="card-right float-right text-right">
                        <a href="{{ route('user.index') }}" class="stat-text mt-1 m-0">Lihat <i
                                class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="card col-md-6 no-padding ">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fa fa-cart-plus"></i>
                    </div>

                    <div class="h4 mb-0">
                        <span class="count">{{ $pembelian }}</span>
                    </div>
                    
                    <small class="text-muted text-uppercase font-weight-bold">Pembelian</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-3" style="width: 40%; height: 5px;"></div>
                    <div class="card-right float-right text-right">
                        <a href="{{ route('pembelian.index') }}" class="stat-text mt-1 m-0">Lihat <i
                                class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="card col-md-6 no-padding ">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fa fa-upload"></i>
                    </div>

                    <div class="h4 mb-0">
                        <span class="count">{{ $penjualan }}</span>
                    </div>
                    
                    <small class="text-muted text-uppercase font-weight-bold">Penjualan</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-5" style="width: 40%; height: 5px;"></div>
                    <div class="card-right float-right text-right">
                        <a href="{{ route('penjualan.index') }}" class="stat-text mt-1 m-0">Lihat <i
                                class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="fa fa-cube text-success border-success"></i></div>
                    <div class="stat-content dib">
                        <div class="stat-text">Total Kategori</div>
                        <div class="stat-digit">{{ $kategori }}</div>
                    </div>
                    <div class="card-right float-right text-right">
                        <a href="{{ route('kategori.index') }}" class="stat-text mt-1 m-0">Lihat <i
                                class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
          <div class="card">
               <div class="card-body">
                    <div class="stat-widget-one">
                         <div class="stat-icon dib"><i class="fa fa-cubes text-secondary border-secondary"></i></div>
                         <div class="stat-content dib">
                              <div class="stat-text">Total Produk</div>
                              <div class="stat-digit">{{ $produk }}</div>
                         </div>
                         <div class="card-right float-right text-right">
                              <a href="{{ route('produk.index') }}" class="stat-text mt-1 m-0">Lihat <i
                                   class="fa fa-arrow-circle-right"></i></a>
                         </div>
                    </div>
               </div>
          </div>
     </div>

     <div class="col-lg-3 col-md-6">
          <div class="card">
               <div class="card-body">
                    <div class="stat-widget-one">
                         <div class="stat-icon dib"><i class="fa fa-id-card text-primary border-primary"></i></div>
                         <div class="stat-content dib">
                              <div class="stat-text">Total Member</div>
                              <div class="stat-digit">{{ $member }}</div>
                         </div>
                         <div class="card-right float-right text-right">
                              <a href="{{ route('member.index') }}" class="stat-text mt-1 m-0">Lihat <i
                                   class="fa fa-arrow-circle-right"></i></a>
                         </div>
                    </div>
               </div>
          </div>
     </div>

     <div class="col-lg-3 col-md-6">
          <div class="card">
               <div class="card-body">
                    <div class="stat-widget-one">
                         <div class="stat-icon dib"><i class="fa fa-truck text-danger border-danger"></i></div>
                         <div class="stat-content dib">
                              <div class="stat-text">Total Supplier</div>
                              <div class="stat-digit">{{ $supplier }}</div>
                         </div>
                         <div class="card-right float-right text-right">
                              <a href="{{ route('supplier.index') }}" class="stat-text mt-1 m-0">Lihat <i
                                   class="fa fa-arrow-circle-right"></i></a>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div><!-- .row -->


<div class="row">
     <div class="col-lg-12">
         <div class="card">
             <div class="card-header with-border">
                 <h3 class="box-title">Grafik Pendapatan {{ tanggal_indonesia($tanggal_awal, false) }} s/d {{ tanggal_indonesia($tanggal_akhir, false) }}</h3>
             </div>
             <div class="card-body">
                 <canvas id="sales-chart"></canvas>
             </div>
         </div>
     </div>
</div>

{{-- <div class="col-lg-6">
    <div class="card">
        <div class="card-body">
            <h4 class="mb-3">Grafik Pendapatan {{ tanggal_indonesia($tanggal_awal, false) }} s/d {{ tanggal_indonesia($tanggal_akhir, false) }}</h4>
            <canvas id="singelBarChart"></canvas>
        </div>
    </div>
</div> --}}

@endsection

@push('scripts')
<!--  Chart js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>
<script src="{{ asset('templates/assets/js/init/chartjs-init.js') }}"></script>

{{-- <script>
      var ctx = document.getElementById("singelBarChart");
      ctx.height = 150;
      var myChart = new Chart(ctx, {
          type: 'bar',
          data: {
              labels: [{{ json_encode($data_tanggal) }}],
              datasets: [{
                  label: "Pendapatan",
                  data: [{{ json_encode($data_pendapatan) }}],
                  borderColor: "rgba(0, 194, 146, 0.9)",
                  borderWidth: "0",
                  backgroundColor: "rgba(0, 194, 146, 0.5)"
              }]
          },
          options: {
              scales: {
                  yAxes: [{
                      ticks: {
                          beginAtZero: true
                      }
                  }]
              }
          }
      });
</script> --}}

<script>
      var ctx = document.getElementById("sales-chart");
      ctx.height = 150;
      var myChart = new Chart(ctx, {
          type: 'line',
          data: {
              labels: {{ json_encode($data_tanggal) }} ,
              type: 'line',
              defaultFontFamily: 'Montserrat',
              datasets: [{
                  label: "Pendapatan",
                  data: {{ json_encode($data_pendapatan) }} ,
                  backgroundColor: 'transparent',
                  borderColor: 'rgba(40,167,69,0.75)',
                  borderWidth: 3,
                  pointStyle: 'circle',
                  pointRadius: 5,
                  pointBorderColor: 'transparent',
                  pointBackgroundColor: 'rgba(40,167,69,0.75)',
              }]
          },
          options: {
              responsive: true,

              tooltips: {
                  mode: 'index',
                  titleFontSize: 12,
                  titleFontColor: '#000',
                  bodyFontColor: '#000',
                  backgroundColor: '#fff',
                  titleFontFamily: 'Montserrat',
                  bodyFontFamily: 'Montserrat',
                  cornerRadius: 3,
                  intersect: false,
              },
              legend: {
                  display: false,
                  labels: {
                      usePointStyle: true,
                      fontFamily: 'Montserrat',
                  },
              },
              scales: {
                  xAxes: [{
                      display: true,
                      gridLines: {
                          display: false,
                          drawBorder: false
                      },
                      scaleLabel: {
                          display: false,
                          labelString: 'Month'
                      }
                  }],
                  yAxes: [{
                      display: true,
                      gridLines: {
                          display: false,
                          drawBorder: false
                      },
                      scaleLabel: {
                          display: true,
                          labelString: 'Value'
                      }
                  }]
              },
              title: {
                  display: false,
                  text: 'Normal Legend'
              }
          }
      });
</script>
@endpush