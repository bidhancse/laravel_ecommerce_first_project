@extends('admin.index')
@section('content')

<style>
  .orderstatus {
    color: #f1f1f1;
    padding: 3px 12px;
    border-radius: 30px;
    font-size: 13px;
  }

  .orderstatus1 {
    color: #f1f1f1;
    padding: 3px 12px;
    border-radius: 30px;
    font-size: 13px;
  }

  .orderstatus2 {
    color: #f1f1f1;
    padding: 3px 12px;
    border-radius: 30px;
    font-size: 13px;
  }

  .orderstatus3 {
    color: #f1f1f1;
    padding: 3px 12px;
    border-radius: 30px;
    font-size: 13px;
  }
</style>
<!--main contents start-->
<main class="main-content">
 <div class="page-title">

 </div>


 <div class="container-fluid">

  <!-- state start-->
  <div class="row">
   <div class=" col-sm-12">
    <div class="card card-shadow mb-4">
     <div class="card-header">
      <div class="row">
        <div class="col-lg-8 col-8">
          <div class="card-title mt-2">
            Shipping Order
          </div>
        </div>

        

      </div>
    </div>
    <div class="card-body" style="overflow-x:auto;">
      <table id="example" class="table table-bordered table-striped text-center" cellspacing="0">
       <thead>
        <tr>
         <th>Invoice Id</th>
         <th>Order Date</th>
         <th>Bill To Name</th>
         <th>Phone</th>
         <th>Email</th>
         <th>Shipping To Address</th>
         <th>Payment</th>
         <th>Status</th>
         <th>Action</th>
       </tr>
     </thead>
     <tbody>

      @if(isset($adddata))
      @foreach($adddata as $datashow)
      <tr>
        <td>
          <a href="{{ url('invoice/'.$datashow->id)}}" class="text-dark">{{ $datashow->id}}</a>
        </td>
        <td>
          {{ $datashow->order_date}}
        </td>
        <td>
          {{ $datashow->name}}
        </td>
        <td>
          {{ $datashow->phone}}
        </td>
        <td>
          {{ $datashow->email}}
        </td>
        <td>
          {{ $datashow->address}}
        </td>
        <td>
          {{ $datashow->payment_method}}
        </td>
        <td>
          @if($datashow->status==0)
          <span class="orderstatus bg-dark">Panding</span>
          @elseif($datashow->status==1)
          <span class="orderstatus1 bg-primary">Processing</span>
          @elseif($datashow->status==2)
          <span class="orderstatus2 bg-success">Shipping</span>
          @elseif($datashow->status==3)
          <span class="orderstatus3 bg-info">Completd</span>
          @endif
        </td>
        <td>
          <form method="POST" action="{{url('update/'.$datashow->id)}}">
            @csrf
            <select name="status" class="form-control w-75" style="float:left; clear:right;">
              <option value="0">Panding</option>
              <option value="1">Processing</option>
              <option value="2">Shipping</option>
              <option value="3">Completd</option>
            </select>
            <button type="submit" style="float:right; border:0px; color:#FF5500; padding-top:5px;">
              <i class="fa fa-edit"></i>
            </button>
          </form>
        </td>
      </tr>

      @endforeach
      @endif





    </tbody>
  </table>
</div>
</div>
</div>
</div>


<!-- state end-->

</div>

</main>


@endsection