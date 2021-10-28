@extends('layouts.admin')
@section('product_select', 'active')
@section('page_title', 'Eshop | Add Products')
@section('content')
<a href="{{ url('products') }}" class="btn btn-primary"> Back</a>
<div class="card">
    <div class="card-header">
        <h4 class="text-center text-danger font-weight-bold text-decoration-underline ">Add Product</h4>
    </div>
    <div class="card-body">
        <form enctype="multipart/form-data" action="{{ url('insert-product') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-12 mb-3">
                    <select class="form-control form-select" name="cate_id" aria-label="Default select example">
                        <option value="">Select a Category</option>
                        @foreach ($category as $item)
                            
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                        
                      </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="" class="label-control">Name</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="" class="label-control">Slug</label>
                    <input type="text" class="form-control" name="slug">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="" class="label-control">Small Description</label>
                    <textarea name="small_description" rows="5" class="form-control"></textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="" class="label-control">Description</label>
                    <textarea name="description" rows="5" class="form-control"></textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label for=""> Original Price</label>
                    <input type="number" class="form-control" name="original_price">
                </div>
                <div class="col-md-6 mb-3">
                    <label for=""> Selling Price</label>
                    <input type="number" class="form-control" name="selling_price">
                </div>
                <div class="col-md-6 mb-3">
                    <label for=""> Tax</label>
                    <input type="number" class="form-control" name="tax">
                </div>
                <div class="col-md-6 mb-3">
                    <label for=""> Quantity</label>
                    <input type="number" class="form-control" name="qty">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="" class="label-control">Status</label>
                    <input type="checkbox" name="status">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="" class="label-control">Trending</label>
                    <input type="checkbox" name="trending">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="" class="label-control">Meta Title</label>
                    <input type="text" class="form-control" name="meta_title">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="" class="label-control">Meta Keywords</label>
                    <textarea name="meta_keywords" rows="3" class="form-control"></textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="" class="label-control">Meta Description</label>
                    <textarea name="meta_description" rows="3" class="form-control"></textarea>
                </div>
                <div class="col-md-12 mb-3">
                   <input type="file" name="image">
                </div>
                <div class="col-md-12 mb-3">
                    <button type="submit" class="btn btn-info">Submit</button>
                   
                </div>
            </div>
        </form>
    </div>
</div>
@endsection