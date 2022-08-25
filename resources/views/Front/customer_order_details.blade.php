@extends('front/layout')
@section('container')
<div class="overview-wrap">
    <h2 class="title-1">Order Details</h2>
</div>
<div class="card">
    <div class="card-body">
            <div class="table-responsive pt-3">
                <table class="table table-bordered">
                    <h4 class="card-title">Order Details</h4>
                    <thead>
                        <tr>
                            <th>
                             Item
                            </th>
                            <th>
                             Order date
                            </th>
                            <th>
                             Order amount
                            </th>
                            <th>
                             Order staus
                            </th>
                            <th>
                             Delivery staus
                            </th>
                        </tr>
                    </thead>
                    @foreach($order as $list)
                     <tbody>
                        <tr>
                            <td>
                              {{$list->name}}
                            </td>
                            <td>
                              {{\carbon\carbon::parse($list->created_at)->format('d-m-y')}}
                            </td>
                            <td>
                            @if($list->is_discounted==0)
                            {{$list->price}}
                            @elseif($list->is_discounted==1)
                            {{$list->discount_price}}
                            @endif
                            </td> 
                            <td>
                            @if($list->order_status==0)
                              Pending
                            @elseif($list->order_status==1)
                              Approved
                            @endif
                            </td> 
                            <td>
                            @if($list->delivery_status==0)
                              Pending
                            @elseif($list->delivery_status==1)
                              Processing
                            @elseif($list->delivery_status==2)
                              Dispatched
                            @elseif($list->delivery_status==3)
                              Delivered
                            @endif
                            </td>   
                        </tr>
                     </tbody>
                    @endforeach
            </table>
        </div>
        <!-- END DATA TABLE-->
    </div>
</div>

@endsection