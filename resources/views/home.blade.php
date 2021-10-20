@extends('layouts.app')
@section('title', 'Dashboard')
@section('login_as', 'Administrator')
@section('user-login')
    @if (Auth::check())
    {{ Auth::user()->name }}
    @endif
@endsection
@section('user-login2')
    @if (Auth::check())
    {{ Auth::user()->name }}
    @endif
@endsection
@section('sidebar-menu')
    @include('sidebar')
@endsection
@push('styles')
    <!-- Styles -->
    <style>
        #chartdiv, #chartdiv2 {
            width: 100%;
            height: 500px;
        }

    </style>
@endpush
@section('content')
<section class="panel" style="margin-bottom:20px;">
    <header class="panel-heading" style="color: #ffffff;background-color: #074071;border-color: #fff000;border-image: none;border-style: solid solid none;border-width: 4px 0px 0;border-radius: 0;font-size: 14px;font-weight: 700;padding: 15px;">
        <i class="fa fa-home"></i>&nbsp;Dashboard
        <span class="tools pull-right" style="margin-top:-5px;">
            <a class="fa fa-chevron-down" href="javascript:;" style="float: left;margin-left: 3px;padding: 10px;text-decoration: none;"></a>
            <a class="fa fa-times" href="javascript:;" style="float: left;margin-left: 3px;padding: 10px;text-decoration: none;"></a>
        </span>
    </header>
    <div class="panel-body" style="border-top: 1px solid #eee; padding:15px; background:white;">
        <div class="row" style="margin-right:-15px; margin-left:-15px;">
            <div class="col-md-12">Selamat datang <strong> </strong> di halaman Dashboard Administrator<b> Ruang Islam</b></div>
        </div>
    </div>
</section>
    <div class="row">
        <div class="col-md-12">
            <section class="panel">
                <header class="panel-heading" style="color: #ffffff;background-color: #074071;border-color: #fff000;border-image: none;border-style: solid solid none;border-width: 4px 0px 0;border-radius: 0;font-size: 14px;font-weight: 700;padding: 15px;">
                    <i class="fa fa-bar-chart"></i>&nbsp;Statistik Data Aplikasi
                </header>
                <div class="panel-body" style="border-top: 1px solid #eee; padding:15px; background:white;">
                    <div class="row">
                        <div class="col-lg-3 col-xs-3 col-md-3" style="padding-bottom:10px !important;">
                            <!-- small box -->
                            <div class="small-box bg-aqua" style="margin-bottom:0px;">
                                <div class="inner">
                                <h3>{{ $semua }}</h3>

                                <p>Semua Istilah</p>
                                </div>
                                <div class="icon">
                                <i class="fa fa-file"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-xs-3 col-md-3" style="padding-bottom:10px !important;">
                            <!-- small box -->
                            <div class="small-box bg-red" style="margin-bottom:0px;">
                                <div class="inner">
                                <h3>{{ $pendidikan }}</h3>

                                <p> Istilah Pendidikan</p>
                                </div>
                                <div class="icon">
                                <i class="fa fa-cog"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-xs-3 col-md-3" style="padding-bottom:10px !important;">
                            <!-- small box -->
                            <div class="small-box bg-yellow" style="margin-bottom:0px;">
                                <div class="inner">
                                <h3>{{ $ekonomi }}</h3>

                                <p>Istilah Ekonomi</p>
                                </div>
                                <div class="icon">
                                <i class="fa fa-list-alt"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-xs-3 col-md-3" style="padding-bottom:10px !important;">
                            <!-- small box -->
                            <div class="small-box bg-green" style="margin-bottom:0px;">
                                <div class="inner">
                                <h3>{{ $gelar }}</h3>

                                <p>Istilah Gelar</p>
                                </div>
                                <div class="icon">
                                <i class="fa fa-users"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <div class="row" style="margin-bottom:10px; margin-top:10px;">
        <div class="col-md-6">
            <section class="panel">
                <header class="panel-heading" style="color: #ffffff;background-color: #074071;border-color: #fff000;border-image: none;border-style: solid solid none;border-width: 4px 0px 0;border-radius: 0;font-size: 14px;font-weight: 700;padding: 15px;">
                    <i class="fa fa-bar-chart"></i>&nbsp;Statistik Diagram Batang
                </header>
                <div class="panel-body" style="border-top: 1px solid #eee; padding:15px; background:white;">
                    <div class="row">
                        <div class="col-md-12">
                            @section('charts')
                                chart.data = [
                                    @foreach ($statistik as $data)
                                        {
                                             "country": "{{ $data['nm_kategori'] }}",
                                            "litres": {{ $data['jumlah'] }}
                                        },
                                    @endforeach
                                ];
                            @endsection
                            <div id="chartdiv"></div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <div class="col-md-6">
            <section class="panel">
                <header class="panel-heading" style="color: #ffffff;background-color: #074071;border-color: #fff000;border-image: none;border-style: solid solid none;border-width: 4px 0px 0;border-radius: 0;font-size: 14px;font-weight: 700;padding: 15px;">
                    <i class="fa fa-bar-chart"></i>&nbsp;Statistik Diagram Lingkaran
                </header>
                <div class="panel-body" style="border-top: 1px solid #eee; padding:15px; background:white;">
                    <div class="row">
                        <div class="col-md-12">
                            @section('charts2')
                            chart.data = [
                                @foreach ($statistik as $data)
                                {
                                    "country": "{{ $data->nm_kategori }}",
                                    "visits": {{ $data->jumlah }}
                                },
                                @endforeach
                            ];
                        @endsection
                        <div id="chartdiv2"></div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Resources -->
    <script src="https://www.amcharts.com/lib/4/core.js"></script>
    <script src="https://www.amcharts.com/lib/4/charts.js"></script>
    <script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>

    <!-- Chart code -->
    <script>
        am4core.ready(function() {

        // Themes begin
        am4core.useTheme(am4themes_animated);
        // Themes end

        // Create chart instance
        var chart = am4core.create("chartdiv", am4charts.PieChart);

        // Add data
        @yield('charts')

        // Add and configure Series
        var pieSeries = chart.series.push(new am4charts.PieSeries());
        pieSeries.dataFields.value = "litres";
        pieSeries.dataFields.category = "country";
        pieSeries.slices.template.stroke = am4core.color("#fff");
        pieSeries.slices.template.strokeWidth = 2;
        pieSeries.slices.template.strokeOpacity = 1;

        // This creates initial animation
        pieSeries.hiddenState.properties.opacity = 1;
        pieSeries.hiddenState.properties.endAngle = -90;
        pieSeries.hiddenState.properties.startAngle = -90;

        }); // end am4core.ready()
    </script>




  <!-- Resources -->
<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

<!-- Chart code -->
<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
var chart = am4core.create("chartdiv2", am4charts.XYChart);

// Add data
@yield('charts2')

// Create axes

var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "country";
categoryAxis.renderer.grid.template.location = 0;
categoryAxis.renderer.minGridDistance = 30;

categoryAxis.renderer.labels.template.adapter.add("dy", function(dy, target) {
  if (target.dataItem && target.dataItem.index & 2 == 2) {
    return dy + 25;
  }
  return dy;
});

var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

// Create series
var series = chart.series.push(new am4charts.ColumnSeries());
series.dataFields.valueY = "visits";
series.dataFields.categoryX = "country";
series.name = "Visits";
series.columns.template.tooltipText = "{categoryX}: [bold]{valueY}[/]";
series.columns.template.fillOpacity = .8;

var columnTemplate = series.columns.template;
columnTemplate.strokeWidth = 2;
columnTemplate.strokeOpacity = 1;

}); // end am4core.ready()
</script>
@endpush
