@extends('layout')

@section('content')
    <div class="row">
    <h1>{{  'Welcome to my Blogs' }} </h1>

        <h1>@yield('name')</h1>
        @if(session()->has('success'))
            <x-notify type="success" title="Success" content="{{session('success')}}" />
        @endif

        <div class="col-md-12">
            <div class="row">
                @foreach($products as $key => $product)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            @if($key == 0)
                                <img src="https://i.rtings.com/assets/products/1htouLNw/amazonbasics-3-button-usb-wired-mouse/design-medium.jpg" class="card-img-top" alt="{{ $product->category }}">
                                @elseif($key == 1)
                                <img src="https://store.storeimages.cdn-apple.com/8756/as-images.apple.com/is/MQ052?wid=4000&hei=1800&fmt=jpeg&qlt=95&.v=1495129815011" class="card-img-top" alt="{{ $product->category }}">  
                                @elseif($key == 2)
                                <img src="https://cdn.shopify.com/s/files/1/0420/8948/0359/products/1_7638d507-92fb-467f-acb1-9b89ad1217fb_2048x.png?v=1603350815" class="card-img-top" alt="{{ $product->category }}">  
                            @else
                                
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">Blog Title: {{ $product->name }}</h5>
                                <p class="card-text">Description: {{ $product->unit }}</p>
                                <a href="/product/{{ $product->id }}" class="btn btn-info">View Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="col-12">
            {{ $products->links() }}
        </div>
    </div>

    <div class="row">
        <div class="col-2">
            <a href="/products/create" class="btn-primary">new blog</a>
        </div>
    </div>
@endsection
