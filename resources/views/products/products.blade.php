<x-layout>
    <div class ="row">
@section('name','content')
<h1>{{  $heading }} </h1>

@if(session()->has('success'))
<x-notify type="success" title="Success" content="{{session('success')}}" />
@endif

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
<td>{{$product->getcategory()}}</td>
<td class="table-info">
    <div class="row">
        <div class="col-2">
        <a href="/product/{{$product->id}}" type="button" class="btn btn-info"><i class="bi-eye"></i></a>
</div>

        <div class="col-2">
        <a href="/product/{{$product->id}}/edit" type="button" class="btn btn-info"><i class="bi-pencil"></i></a>
</div>

        <div class="col-2">
        <form method="POST" action="/products/{{$product->id}}">
        @csrf
        @method('DELETE')
        <button class="btn btn-link" type="submit">
            <i class="bi bi-trash"></i>

        </button>
    </form>
</div>  

</td>
</tr>

@endforeach

</table>
<nav>
    {{$products->links()}}
</nav>
</div>

</div>

</x-layout>