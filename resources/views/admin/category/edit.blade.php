@extends('layouts.admin')
@section('category_select', 'active')
@section('page_title', 'Eshop | Edit Category')
@section('content')
<a href="{{ url('categories') }}" class="btn btn-primary"> Back</a>
<div class="card">
    <div class="card-header">
        <h4>Edit Category</h4>
    </div>
    <div class="card-body">
        <form enctype="multipart/form-data" action="{{ url('update-category',$category->id) }}" method="POST">
            @csrf
            <div class="row">

                <div class="col-md-6 mb-3">
                    <label for="" class="label-control">Name</label>
                    <input type="text" class="form-control" value="{{ $category->name }}" name="name">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="" class="label-control">Slug</label>
                    <input type="text" class="form-control" value="{{ $category->slug }}" name="slug">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="" class="label-control">Description</label>
                    <textarea name="description" rows="5" class="form-control">{{ $category->description }}  </textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="" class="label-control">Status</label>
                   
                    
                    <input type="checkbox" {{ $category->status==1?"checked":"" }} name="status">
                    
                </div>
                <div class="col-md-6 mb-3">
                    <label for="" class="label-control">Popular</label>
                    
                    <input type="checkbox" {{ $category->popular==1?"checked":"" }} name="popular">
                   
                </div>
                <div class="col-md-12 mb-3">
                    <label for="" class="label-control">Meta Title</label>
                    <input type="text" class="form-control" value="{{ $category->meta_title }}" name="meta_title">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="" class="label-control">Meta Keywords</label>
                    <textarea name="meta_keywords" rows="3"
                        class="form-control">{{ $category->meta_keywords }}</textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="" class="label-control">Meta Description</label>
                    <textarea name="meta_descrip" rows="3" class="form-control">{{ $category->meta_descrip }}</textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <input type="file" value="{{ $category->image}}"  name="image">
                    @if($category->image)
                    <img id="original" src="{{ url('uploads/category/'.$category->image) }}" height="70" width="70">
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