@extends('layouts.admin')
@section('product_select', 'active')
@section('page_title', 'Eshop | Edit Product')
@section('content')
<a href="{{ url('products') }}" class="btn btn-primary"> Back</a>
<div class="card">
    <div class="card-header">
        <h4>Edit Product</h4>
    </div>
    <div class="card-body">
        <form enctype="multipart/form-data" action="{{ url('update-product',$product->id) }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-12 mb-3">
                    <select class="form-control form-select" name="cate_id" aria-label="Default select example">



                        <option value="{{ $product->cate_id }}">{{ $product->category->name }}</option>


                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="" class="label-control">Name</label>
                    <input type="text" class="form-control" value="{{ $product->name }}" name="name">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="" class="label-control">Slug</label>
                    <input type="text" class="form-control" value="{{ $product->slug }}" name="slug">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="" class="label-control">Small Description</label>
                    <textarea name="small_description" rows="5" class="form-control">{{ $product->small_description }}  </textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="" class="label-control">Description</label>
                    <textarea name="description" rows="5" class="form-control">{{ $product->description }}  </textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="" class="label-control">Status</label>


                    <input type="checkbox" {{ $product->status==1?"checked":"" }} name="status">

                </div>
                <div class="col-md-6 mb-3">
                    <label for="" class="label-control">Trending</label>

                    <input type="checkbox" {{ $product->trending==1?"checked":"" }} name="trending">

                </div>
                <div class="col-md-6 mb-3">
                    <label for="" class="label-control">Original Price</label>
                    <input type="text" class="form-control" value="{{ $product->original_price }}" name="original_price">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="" class="label-control">Selling Price</label>
                    <input type="text" class="form-control" value="{{ $product->selling_price }}" name="selling_price">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="" class="label-control">Tax</label>
                    <input type="text" class="form-control" value="{{ $product->tax }}" name="tax">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="" class="label-control">qty</label>
                    <input type="text" class="form-control" value="{{ $product->qty }}" name="qty">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="" class="label-control">Meta Title</label>
                    <input type="text" class="form-control" value="{{ $product->meta_title }}" name="meta_title">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="" class="label-control">Meta Keywords</label>
                    <textarea name="meta_keywords" rows="3"
                        class="form-control">{{ $product->meta_keywords }}</textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="" class="label-control">Meta Description</label>
                    <textarea name="meta_description" rows="3"
                        class="form-control">{{ $product->meta_description }}</textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <input type="file" value="{{ $product->image}}" name="image">
                    @if($product->image)
                    <img id="original" src="{{ url('uploads/product/'.$product->image) }}" height="70" width="70">
                    @endif
                </div>
                <div class="col-md-12 mb-3">
                    <button type="submit" class="btn btn-info">Submit</button>

                </div>
            </div>
        </form>
    </div>
</div>
@endsection