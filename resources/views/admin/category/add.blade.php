@extends('layouts.admin')
@section('category_select', 'active')
@section('page_title', 'Eshop | Add Category')
@section('content')
<a href="{{ url('categories') }}" class="btn btn-primary"> Back</a>
<div class="card">
    <div class="card-header">
        <h4>Edit Category</h4>
    </div>
    <div class="card-body">
        <form enctype="multipart/form-data" action="{{ url('insert-category') }}" method="POST">
            @csrf
            <div class="row">

                <div class="col-md-6 mb-3">
                    <label for="" class="label-control">Name</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="" class="label-control">Slug</label>
                    <input type="text" class="form-control" name="slug">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="" class="label-control">Description</label>
                    <textarea name="description" rows="5" class="form-control"></textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="" class="label-control">Status</label>
                    <input type="checkbox" name="status">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="" class="label-control">Popular</label>
                    <input type="checkbox" name="popular">
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
                    <textarea name="meta_descrip" rows="3" class="form-control"></textarea>
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