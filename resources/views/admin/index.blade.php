@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="container">
        <h1 class="h2">Dashboard</h1><hr>
        <div class="row my-4">
            <div class="col-md-3">
                <div class="card-counter primary">
                  <i class="fa fa-code-fork"></i>
                  <span class="count-numbers">{{$orderss}}</span>
                  <span class="count-name">total orders</span>
                </div>
              </div>
              
              <div class="col-md-3">
                <div class="card-counter primary">
                  <i class="fa fa-code-fork"></i>
                  <span class="count-numbers">{{$ordersC}}</span>
                  <span class="count-name">orders finished</span>
                </div>
              </div>

              <div class="col-md-3">
                <div class="card-counter danger">
                  <i class="fa fa-users"></i>
                  <span class="count-numbers">{{$users}}</span>
                  <span class="count-name">total users</span>
                </div>
              </div>
              
              <div class="col-md-3">
                <div class="card-counter info">
                  <i class="fa fa-database"></i>
                  <span class="count-numbers">{{$categorys}}</span>
                  <span class="count-name">total categorys</span>
                </div>
              </div>

              <div class="col-md-3">
                <div class="card-counter info">
                  <i class="fa fa-database"></i>
                  <span class="count-numbers">{{$brands}}</span>
                  <span class="count-name">total brands</span>
                </div>
              </div>

              <div class="col-md-3">
                <div class="card-counter info">
                  <i class="fa fa-database"></i>
                  <span class="count-numbers">{{$products}}</span>
                  <span class="count-name">total product</span>
                </div>
              </div>

              <div class="col-md-3">
                <div class="card-counter info">
                  <i class="fa fa-database"></i>
                  <span class="count-numbers">{{$a_products}}</span>
                  <span class="count-name">almost out of stock</span>
                </div>
              </div>

              <div class="col-md-3">
                <div class="card-counter info">
                  <i class="fa fa-database"></i>
                  <span class="count-numbers">{{$o_products}}</span>
                  <span class="count-name">out of stock</span>
                </div>
              </div>
    
        </div>
        <hr>
        <div class="row">
          <canvas id="ordersChart"></canvas>
        </div>
        <hr>
        <div class="row">
        <div class="col-md-6">
          <h4>Top Rated</h4>
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>id</th>
                <th>image</th>
                <th>name</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($top as $item)
              <tr>
              <td>{{$loop->iteration}}</td>
              <td><a href="get-product/{{$item->id}}"><img src="{{asset('assets/uploads/product/'.$item->image[0])}}" width="30%" alt="#"></a></td>
              <td>{{$item->name}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="col-md-6">
          <h4>Tranding</h4>
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>id</th>
                <th>image</th>
                <th>name</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($trend as $item)
              <tr>
              <td>{{$loop->iteration}}</td>
              <td><a href="get-product/{{$item->id}}"><img src="{{asset('assets/uploads/product/'.$item->image[0])}}" width="30%" alt="#"></a></td>
              <td>{{$item->name}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <script>
      var ctx = document.getElementById('ordersChart').getContext('2d');
      var ordersChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: [@foreach ($orders as $order) '{{ $order->month }}', @endforeach],
          datasets: [{
            label: 'Orders',
            data: [@foreach ($orders as $order) '{{ $order->count }}', @endforeach],
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