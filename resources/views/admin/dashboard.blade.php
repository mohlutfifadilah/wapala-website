@section('title', 'WAPALA IT Telkom')
@include('admin.template.header')
@include('admin.template.sidebar')
@if(session('success'))
<div id="alertt" class="alert alert-success alert-dismissible fade show position-fixed bottom-0 end-0 m-3" role="alert" style="z-index: 999;">
    <i class="bi bi-check-circle me-1"></i>
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if(session('error'))
<div id="error-alert" class="alert alert-danger alert-dismissible fade show position-fixed bottom-0 end-0 m-3" role="alert">
    <i class="bi bi-exclamation-octagon me-1"></i>
    {{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Beranda</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Anggota</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-person-fill"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $count_user }}</h6>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Divisi</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-gear"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $count_divisi }}</h6>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Pendaftar <span>| {{ now()->year }}</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $count_oprec }}</h6>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

            <!-- Reports -->
            <div class="col-12">
              <div class="card">

                <div class="card-body">
                  <h5 class="card-title">Grafik Open Recruitment {{ now()->year }}</h5>

                  <!-- Line Chart -->
                  <div id="reportsChart"></div>

                  <script>
                    document.addEventListener("DOMContentLoaded", () => {
                        var dates = @json($dates);
                        var totals = @json($totals);

                        new ApexCharts(document.querySelector("#reportsChart"), {
                            series: [{
                                name: 'Pendaftaran',
                                data: totals, // Menggunakan data dari controller
                            }],
                            chart: {
                                height: 350,
                                type: 'area',
                                toolbar: {
                                    show: false
                                },
                            },
                            markers: {
                                size: 4
                            },
                            colors: ['#4154f1'],
                            fill: {
                                type: "gradient",
                                gradient: {
                                    shadeIntensity: 1,
                                    opacityFrom: 0.3,
                                    opacityTo: 0.4,
                                    stops: [0, 90, 100]
                                }
                            },
                            dataLabels: {
                                enabled: false
                            },
                            stroke: {
                                curve: 'smooth',
                                width: 2
                            },
                           xaxis: {
                                type: 'datetime',
                                categories: dates,
                                tickAmount: 5,  // Batasi jumlah ticks atau label pada sumbu X
                                labels: {
                                    formatter: function(value, timestamp) {
                                        const date = new Date(timestamp);
                                        return date.toLocaleDateString('id-ID', {
                                            day: 'numeric',
                                            month: 'short',
                                            year: 'numeric'
                                        }).replace(' ', '/').replace(' ', '/');
                                    }
                                }
                            },
                            yaxis: {
                                min: 1,
                                max: 50,
                                tickAmount: 5,  // Batasi jumlah ticks atau label pada sumbu Y
                                labels: {
                                    formatter: function(value) {
                                        return Math.floor(value);
                                    }
                                }
                            },
                            tooltip: {
                                x: {
                                    format: 'dd/MM/yy'
                                },
                            }
                        }).render();
                    });
                </script>
                  <!-- End Line Chart -->

                </div>

              </div>
            </div><!-- End Reports -->

            <!-- Top Selling -->
            <div class="col-12">
              <div class="card top-selling overflow-auto">

                <div class="card-body pb-0">
                  <h5 class="card-title">Pendaftar Terbaru</h5>

                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col">Foto</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Program Studi</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($oprec as $o)
                        <tr>
                            <th scope="row"><img src="{{ asset('/storage/oprec/' . $o->foto) }}" alt=""></th>
                            <td>{{ $o->nama }}</td>
                            <td>{{ $o->prodi }}</td>
                            @if ($o->jenis_kelamin === 'L')
                                <td><i class="ri-men-line text-primary"></i> ( {{ $o->jenis_kelamin }} )</td>
                            @else
                                <td><i class="ri-women-line" style="color: rgb(231, 79, 191);"></i> ( {{ $o->jenis_kelamin }} )</td>
                            @endif
                            @if ($o->status != 0)
                                <td><span class="badge rounded-pill text-bg-success">Selesai</span></td>
                            @else
                                <td><span class="badge rounded-pill text-bg-warning text-white">Pending</span></td>
                            @endif
                        </tr>
                      @endforeach
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Top Selling -->

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

          <!-- Recent Activity -->
          <div class="card">

            <div class="card-body">
              <h5 class="card-title">Kalender</h5>

              <div class="activity">

                <div id="calendar"></div>

                <script>
                    $(document).ready(function(){
                        $("#calendar").simpleCalendar({
                            //Defaults options below
                            //string of months starting from january
                            months: ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'],
                            days: ['Minggu','Senin','Selasa','Rabu','Kamis',"Jum'at",'Sabtu'],
                            displayYear: true,              // Display year in header
                            fixedStartDay: true,            // Week begin always by monday or by day set by number 0 = sunday, 7 = saturday, false = month always begin by first day of the month
                            displayEvent: true,             // Display existing event
                            disableEventDetails: false, // disable showing event details
                            disableEmptyDetails: false, // disable showing empty date details
                            events: [],                     // List of events
                            onInit: function (calendar) {}, // Callback after first initialization
                            onMonthChange: function (month, year) {}, // Callback on month change
                            onDateSelect: function (date, events) {}, // Callback on date selection
                            onEventSelect: function() {}, // Callback on event selection - use $(this).data('event') to access the event
                            onEventCreate: function( $el ) {},          // Callback fired when an HTML event is created - see $(this).data('event')
                            onDayCreate:   function( $el, d, m, y ) {}  // Callback fired when an HTML day is created   - see $(this).data('today'), .data('todayEvents')
                        });
                    });
                </script>

              </div>

            </div>
          </div><!-- End Recent Activity -->

          <!-- Website Traffic -->
          <div class="card">

            <div class="card-body pb-0">
              <h5 class="card-title">Persebaran Anggota</h5>

              <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                    var chartData = @json($chartData_pie); // Data dari controller

                    echarts.init(document.querySelector("#trafficChart")).setOption({
                        tooltip: {
                            trigger: 'item'
                        },
                        legend: {
                            top: '5%',
                            left: 'center'
                        },
                        series: [{
                            name: 'Access From',
                            type: 'pie',
                            radius: ['40%', '70%'],
                            avoidLabelOverlap: false,
                            label: {
                                show: false,
                                position: 'center'
                            },
                            emphasis: {
                                label: {
                                    show: true,
                                    fontSize: '18',
                                    fontWeight: 'bold'
                                }
                            },
                            labelLine: {
                                show: false
                            },
                            data: chartData // Menggunakan data dari controller
                        }]
                    });
                });
              </script>

            </div>
          </div><!-- End Website Traffic -->

        </div><!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->
@include('admin.template.footer')
