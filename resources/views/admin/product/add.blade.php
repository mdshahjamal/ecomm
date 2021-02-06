@extends('admin.admin_master')

  @section('product') active  @endsection

  @section('admin_content')
  <div class="container">
   <div class="card shadow-lg border-0 rounded-lg mt-5">
    <div class="card-header"><h3 class="text-center font-weight-light my-4">Add Product</h3></div>
    <div class="card-body">
      <form action="{{ route('store.product') }}" method="post" enctype="multipart/form-data">
        @csrf
        @if (session('msg'))
        <div class="alert alert-success">
          <p>{{ session('msg') }}</p>
        </div>
        @endif
        <div class="form-row">
          <div class="col-md-6">
            <div class="form-group">
              <label class="small mb-1" for="inputFirstName">Product Name</label>
              <input class="form-control py-4" id="inputFirstName" type="text" name="product_name" value="{{ old('product_name') }}" />
              @error('product_name')
                <strong class="text-danger">{{ $message }}</strong>
              @enderror
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="small mb-1" for="inputLastName">Product Code</label>
              <input class="form-control py-4" id="inputLastName" type="text" name="product_code" value="{{ old('product_name') }}" />
              @error('product_code')
                <strong class="text-danger">{{ $message }}</strong>
              @enderror
            </div>
          </div>
          
        </div>

         <div class="form-row">
          <div class="col-md-6">
            <div class="form-group">
              <label class="small mb-1" for="inputLastName">Product Slug</label>
              <input class="form-control py-4" id="inputLastName" type="text" name="product_slug" value="{{ old('product_slug') }}" />
              @error('product_slug')
                <strong class="text-danger">{{ $message }}</strong>
              @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
              <label class="small mb-1" for="inputFirstName">Price</label>
              <input class="form-control py-4" id="inputFirstName" type="text" name="price" value="{{ old('price') }}" />
              @error('price')
                <strong class="text-danger">{{ $message }}</strong>
              @enderror
            </div>
          </div>
        </div>
        <div class="form-row">
          
          <div class="col-md-4">
            <div class="form-group">
              <label class="small mb-1" for="inputLastName">Product Quantity</label>
              <input class="form-control py-4" id="inputLastName" type="number" name="product_quantity" value="{{ old('product_quantity') }}" />
              @error('product_quantity')
                <strong class="text-danger">{{ $message }}</strong>
              @enderror
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label class="small mb-1" for="inputPassword">Category</label>
              <select class="form-control" name="category_id">
                @error('category_id')
                <strong class="text-danger">{{ $message }}</strong>
              @enderror
                @foreach($categories as $category)

                <option value="{{ $category->id }}">
                  {{ $category->category_name }}
                </option>

                @endforeach
              </select>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label class="small mb-1" for="inputPassword">Brand</label>
              <select class="form-control" name="brand_id">
                @error('brand_id')
                <strong class="text-danger">{{ $message }}</strong>
              @enderror
                @foreach($brands as $brand)

                <option value="{{ $brand->id }}">
                  {{ $brand->brand_name }}
                </option>

                @endforeach
              </select>
            </div>
          </div>
        </div>


        <div class="form-row">
          <div class="col-md-6">
            <div class="form-group">
              <label class="small mb-1" for="inputFirstName">Short Description</label>
              <textarea class="form-control py-4" name="short_description" id="" cols="20" rows="5">{{ old('short_description') }}  </textarea>
              @error('short_description')
                <strong class="text-danger">{{ $message }}</strong>
              @enderror

            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="small mb-1" for="inputFirstName">Long Description</label>
              <textarea class="form-control py-4" name="long_description" id="" cols="20" rows="5">{{ old('long_description') }} </textarea>
              @error('long_description')
                <strong class="text-danger">{{ $message }}</strong>
              @enderror
            </div>
          </div>
          
        </div>

        <div class="form-row">
          <div class="col-md-4">
            <div class="form-group">
              <label class="small mb-1" for="inputFirstName">Main Thambnail</label>
              <input class="form-control py-4" type="file" name="image_one" />
              @error('image_one')
                <strong class="text-danger">{{ $message }}</strong>
              @enderror
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label class="small mb-1" for="inputFirstName">Image Two</label>
              <input class="form-control py-4" type="file" name="image_two" />
              @error('image_two')
                <strong class="text-danger">{{ $message }}</strong>
              @enderror
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label class="small mb-1" for="inputFirstName">Image Three</label>
              <input class="form-control py-4" type="file" name="image_three" />
              @error('image_three')
                <strong class="text-danger">{{ $message }}</strong>
              @enderror
            </div>
          </div>

        </div>

        <div class="form-group mt-4 mb-0"><button type="submit" class="btn btn-primary btn-block">Save Product Info</button></div>
      </form>
    </div>
    <div class="card-footer text-center">
    </div>
  </div>
 </div>
  @endsection