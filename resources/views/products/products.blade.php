<x-layout>
    <div class="container-fluid">
        <div class="row">
            @section('name','content')
            <h1>{{ $heading }}</h1>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <form action="{{ route('products.search') }}" method="GET">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Search...">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="row">
                    @php
                    $counter = 1;
                    @endphp
                    @foreach($products as $product)
                    <div class="col-md-6">
                        <div class="carousel slide custom-carousel" data-ride="carousel" data-interval="0">
                            <!-- Carousel indicators -->
                            <div class="carousel-inner">
                                <div class="item carousel-item active">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="thumb-wrapper">
                                                <span class="wish-icon"><i class="fa fa-heart-o"></i></span>
                                                <div class="img-box">
                                                    <img src="{{ $product->image_url ? asset('storage/'.$product->image_url): asset('images/image.png')}}" class="img-fluid" alt="Watch">
                                                </div>
                                                <div class="thumb-content">
                                                    <h4>{{ $product->name }}</h4>
                                                    <p class="item-price">{{ $product->unitPrice }} <span></span></p>
                                                    <div class="star-rating">
                                                        <ul class="list-inline">
                                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                            <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                        </ul>
                                                    </div>
                                                    <a href="#" class="btn btn-primary">Add to Cart</a>
                                                </div>						
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @php
                    $counter++;
                    @endphp
                    @if($counter % 3 == 0)
                </div>
                <div class="row">
                    @endif
                    @endforeach
                </div>

                <nav>
                    {{ $products->links() }}
                </nav>
            </div>
        </div>
    </div>
</x-layout>
