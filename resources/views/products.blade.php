@extends('layout')

@section('content')
<div class ="row">
@section('name','content')
<h1>{{  $heading }} </h1>
<table class="table table-striped">

<tr>
<th>ID</th>
<th>NAME</th>
<th>UNIT</th>
<th>UNIT PRICE</th>
<th>CATEGORY</th>
<th>VIEW DETAILS</th>
</tr>
</thead>
<tbody>
    @php
    $counter =1;
    @endphp
@foreach($products as $product)
<tr>
<td>{{$counter++}}</td>
<td>{{$product->name}}</td>
<td>{{$product->unit}}</td>
<td>{{$product->unitPrice}}</td>
<td>{{$product->category}}</td>
<td><a href="/product/{{$product->id}}" type="button" class="btn btn-info">View Details</a></td>

</tr>



@endforeach

</table>
</div>
@endsection