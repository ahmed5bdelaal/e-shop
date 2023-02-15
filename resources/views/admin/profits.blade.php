@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="container">
        <h1 class="h2">Dashboard</h1><hr>
        <div class="row my-4">
              <div class="col-md-3">
                <div class="card-counter success">
                  <i class="fa fa-database"></i>
                  <span class="count-numbers">{{$sales}}</span>
                  <span class="count-name">
                  Total Sales
                </span>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card-counter success">
                  <i class="fa fa-database"></i>
                  <span class="count-numbers">{{$s_year}}</span>
                  <span class="count-name">
                    <script>
                      document.write(new Date().getFullYear())
                    </script>
                    Sales
                </span>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card-counter success">
                  <i class="fa fa-database"></i>
                  <span class="count-numbers">{{$s_month}}</span>
                  <span id="mm" class="count-name">
                    Sales
                </span>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card-counter success">
                  <i class="fa fa-database"></i>
                  <span class="count-numbers">{{$s_day}}</span>
                  <span class="count-name">
                   Day Sales
                </span>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card-counter success">
                  <i class="fa fa-database"></i>
                  <span class="count-numbers">{{$profits}}</span>
                  <span class="count-name">Total Profits</span>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card-counter success">
                  <i class="fa fa-database"></i>
                  <span class="count-numbers">{{$p_year}}</span>
                  <span class="count-name">
                    <script>
                    document.write(new Date().getFullYear())
                    </script>
                    Profits
                </span>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card-counter success">
                  <i class="fa fa-database"></i>
                  <span class="count-numbers">{{$p_month}}</span>
                  <span id="m" class="count-name">
                       Profits
                  </span>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card-counter success">
                  <i class="fa fa-database"></i>
                  <span class="count-numbers">{{$p_day}}</span>
                  <span class="count-name">
                   Day Profits
                </span>
                </div>
              </div>
              
        </div>
        <hr>
        <h3>Sales</h3><hr>
        <div class="row">
            <canvas id="salesYearChart"></canvas>
        </div>
        <hr>
        <h3>Profits</h3><hr>
        <div class="row">
            <canvas id="profitYearChart"></canvas>
        </div>
        <hr>
        <h3>Sales for year</h3><hr>
        <div class="">
          <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Month</th>
                    <th>Sales</th>
                    <th>Num Orders</th>
                    <th>Profits</th>
                </tr>
            </thead>
            <tbody>
              @if($reports)
                @foreach ($reports as $report)
                <tr>
                    <td>{{date('F', mktime(0, 0, 0, $report->month, 10))}}</td>
                    <td>{{$report->total}}</td>
                    <td>{{$report->count}}</td>
                    <td>{{$report->profit}}</td>
                </tr>
                @endforeach
              @endif
            </tbody>
        </table>
        </div>
    </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
      const month = ["January","February","March","April","May","June","July","August","September","October","November","December"];
      const d = new Date();
       let mm =month[d.getMonth()];
       document.getElementById("mm").innerHTML = mm +' Sales';
       document.getElementById("m").innerHTML = mm +' Profit';
    </script>
    <script>
      var ctx = document.getElementById('salesYearChart').getContext('2d');
      var ordersChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: [@foreach ($s_year_chart as $order) '{{ date("F", mktime(0, 0, 0, $order->month, 10)) }}', @endforeach],
          datasets: [{
            label: 'sales for year',
            data: [@foreach ($s_year_chart as $order) '{{ $order->total }}', @endforeach],
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
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
    </script>
    <script>
      var ctx = document.getElementById('profitYearChart').getContext('2d');
      var ordersChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: [@foreach ($p_year_chart as $order) '{{ date("F", mktime(0, 0, 0, $order->month, 10)) }}', @endforeach],
          datasets: [{
            label: 'profit for year',
            data: [@foreach ($p_year_chart as $order) '{{ $order->profit }}', @endforeach],
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
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
    </script>
@endsection