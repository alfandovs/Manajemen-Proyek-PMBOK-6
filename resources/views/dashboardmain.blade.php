@extends('layouts.main')

@section('container')
<!-- Stats -->
<div class="row">
    <div class="col-xl-3 col-lg-6 col-12">
      <div class="card">
        <div class="card-content">
          <div class="media align-items-stretch">
            <div class="p-2 text-center bg-primary bg-darken-2">
              <i class="icon-camera font-large-2 white"></i>
            </div>
            <div class="p-2 bg-gradient-x-primary white media-body">
              <h5>Client</h5>
              <h5 class="text-bold-400 mb-0"><a href="/klienall"><i class="ft-plus"></i></a></h5>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-12">
      <div class="card">
        <div class="card-content">
          <div class="media align-items-stretch">
            <div class="p-2 text-center bg-danger bg-darken-2">
              <i class="icon-user font-large-2 white"></i>
            </div>
            <div class="p-2 bg-gradient-x-danger white media-body">
              <h5>Employee</h5>
              <h5 class="text-bold-400 mb-0"><a href="/employeeall"><i class="ft-plus"></i></a></h5>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-12">
      <div class="card">
        <div class="card-content">
          <div class="media align-items-stretch">
            <div class="p-2 text-center bg-warning bg-darken-2">
              <i class="icon-basket-loaded font-large-2 white"></i>
            </div>
            <div class="p-2 bg-gradient-x-warning white media-body">
              <h5>Project</h5>
              <h5 class="text-bold-400 mb-0"><a href="/projectall"><i class="ft-plus"></i></a></h5>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-12">
      <div class="card">
        <div class="card-content">
          <div class="media align-items-stretch">
            <div class="p-2 text-center bg-success bg-darken-2">
              <i class="icon-wallet font-large-2 white"></i>
            </div>
            <div class="p-2 bg-gradient-x-success white media-body">
              <h5>Progress</h5>
              <h5 class="text-bold-400 mb-0"><a href="/progressall"><i class="ft-plus"></i></a></h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<!--/ Stats -->
<!-- Grafik -->
<div class="card">
  <div class="card-content">
    <div id="grafik"></div>
  </div>
</div>
<!--/ Grafik -->
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">

var bulan = ['', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
            'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

$.ajax({
    type: "GET", 
    url: "http://127.0.0.1:8000/dashboardmain/grafik",
    dataType: "json",
    beforeSend: function(e) {
      if(e && e.overrideMimeType) {
        e.overrideMimeType("application/json;charset=UTF-8");
      }
    },
    dataType : 'json',
    success:function(response){
      var total = [];
      var month = [];
      $.each(response, function(i){
        total.push(response[i].total_project);
        month.push(bulan[response[i].month]);
      });
      Highcharts.chart('grafik', {
        chart: {
            type: 'spline'
        },
        title: {
            text: 'All Project Chart'
        },
        subtitle: {
            text: 'PT. Tekno Mandala Kreatif'
        },
        xAxis: {
            categories: month,
            accessibility: {
                description: 'Months of the year'
            }
        },
        yAxis: {
            title: {
                text: 'Total Project'
            },
        },
        tooltip: {
            crosshairs: true,
            shared: true
        },
        plotOptions: {
            spline: {
                marker: {
                    radius: 4,
                    lineColor: '#666666',
                    lineWidth: 1
                }
            }
        },
        series: [{
            name: 'Project',
            // data: $Pdata
            marker: {
                symbol: 'square'
            },
            data: total
        }],
    });
    }
});

 
</script>
@endsection
