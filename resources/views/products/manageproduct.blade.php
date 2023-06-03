<x-layout>
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
            <table class="table table-striped">
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>UNIT</th>
                    <th>UNIT PRICE</th>
                    <th>CATEGORY</th>
                    <th>IMAGE</th> 
                    <th>VIEW DETAILS</th>
                </tr>
                <tbody>
                    @php
                    $counter = 1;
                    @endphp
                    @foreach($products as $product)
                    <tr>
                        <td>{{ $counter++ }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->unit }}</td>
                        <td>{{ $product->unitPrice }}</td>
                        <td>{{ $product->getcategory() }}</td>
                        <td>
                            <img src="{{ $product->image_url ? asset('storage/'.$product->image_url): asset('images/image.png')}}" width="300" height="300">
                            </a>
                        </td> 
                        <td class="table-info">
                            <div class="row">
                                <div class="col-2">
                                    <a href="/product/{{ $product->id }}" type="button" 
                                        class="btn btn-info"><i class="bi-eye"></i></a>
                                </div>

                                <div class="col-2">
                                    <a href="/product/{{ $product->id }}/edit" type="button"
                                        class="btn btn-info"><i class="bi-pencil"></i></a>
                                </div>
                                <div class="col-2">
                                    <form method="POST" action="/products/{{ $product->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-info" type="button">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <nav>
                {{ $products->links() }}
            </nav>
        </div>
    </div>
</x-layout>
