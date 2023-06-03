<x-layout>
  <h1>Update Product Form | {{$product->name}}</h1>
  <form method="POST" action="/products/{{$product->id}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row mb-3">
      <label for="name" class="col-sm-2 col-form-label">Name</label>
      <div class="col-sm-10">
        <input type="text" name="name" value="{{$product->name}}" class="form-control @error('name') is-invalid @enderror" >
        <div class="text-danger ">
          @error('name')
            {{ $message }}
          @enderror
        </div>
      </div>
    </div>

    <div class="row mb-3">
      <label for="unit" class="col-sm-2 col-form-label">Unit</label>
      <div class="col-sm-10">
        <input type="text" name="unit" value="{{ $product->unit }}" class="form-control @error('unit') is-invalid @enderror" >
        <div class="text-danger ">
          @error('unit')
            {{ $message }}
          @enderror
        </div>
      </div>
    </div>

    <div class="row mb-3">
      <label for="unitPrice" class="col-sm-2 col-form-label">Unit Price</label>
      <div class="col-sm-10">
        <input type="text" name="unitPrice" value="{{ $product->unitPrice }}" class="form-control @error('unitPrice') is-invalid @enderror" >
        <div class="text-danger ">
          @error('unitPrice')
            {{ $message }}
          @enderror
        </div>
      </div>
    </div>

    <div class="row mb-3">
      <label for="category" class="col-sm-2 col-form-label">Category</label>
      <div class="col-sm-10">
        <select name="category" class="form-control">
          <option {{$product->category == 'Vegetable' ? 'selected':''}} value="Vegetable">Vegetable</option>
          <option {{$product->category == 'Meat' ? 'selected':''}} value="Meat">Meat</option>
          <option {{$product->category == 'Fish' ? 'selected':''}} value="Fish">Fish</option>
        </select>
      </div>
    </div>
      </div>

      <div class="row mb-3">
      <label for="image_url" class="col-sm-2 col-form-label">Image</label>
      <div class="col-sm-10">
        <input type="file" name="image_url" id="image_url" class="form-control">
        <img src="{{ $product->image_url ? asset('storage/'.$product->image_url): asset('images/image.png')}}" width="300" height="300">
        <div class="text-danger">
        @error('image_url')
          {{ $message }}
        @enderror
        </div>
      </div>
    </div>
      
     <!--<div class="row mb-3">
      <label for="image_url" class="col-sm-2 col-form-label">Image URL</label>
      <div class="col-sm-10">
        <input type="file" name="image_url" class="form-control @error('image_url') is-invalid @enderror" >
        <div class="text-danger">
          @error('image_url')
            {{ $message }}
          @enderror
        </div>
      </div>
    </div> -->


    </div>
    <button class="btn btn-primary">Update</button>
  </form>
</x-layout>
