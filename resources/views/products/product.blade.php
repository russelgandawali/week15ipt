@extends('layout')
@section('content')
<h2>ID No. {{$product->id}}</h2>
<h2>Product Name: {{$product->name}}</h2>
<li> Price: {{$product->unitPrice}}</li>
<li> Unit: {{$product->unit}}</li>
<li> Category: {{$product->category}}</li>
@endsection