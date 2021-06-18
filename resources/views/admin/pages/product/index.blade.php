@extends('admin.layouts.master')

@section('content')
  <div class="main-panel">
    <div class="content-wrapper">

      <div class="card">
        <div class="card-header">
          magage Product
        </div>
        <div class="card-body">
          <table class="table table-bordered  table-striped">
            <tr>
              <th>ID</th>
              <th>Title</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Action</th>
            </tr>
            @foreach($products as $product)


            <tr>
              <td>{{$product->id}}</td>
              <td>{{ $product->title}}</td>
              <td> {{$product->price}} </td>
              <td>{{ $product->quantity}}</td>
              <td>CSE</td>
            </tr>

            @endforeach

          </table>
        </div>
      </div>

    </div>
  </div>
  <!-- main-panel ends -->
@endsection
