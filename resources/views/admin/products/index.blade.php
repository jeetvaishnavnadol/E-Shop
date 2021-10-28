@extends('layouts.admin')
@section('product_select', 'active')
@section('page_title', 'Eshop | Products')
@section('content')
@if (Session::has('success'))
<div class="alert alert-success alert-dismissible">
    {{ Session::get("success") }}
</div>
@endif
@if (Session::has('delete'))
<div class="alert alert-danger alert-dismissible">
    {{ Session::get("delete") }}
</div>
@endif
@if (Session::has('update'))
<div class="alert alert-warning alert-dismissible">
    {{ Session::get("update") }}
</div>
@endif

<div class="card ">
    <div class="card-header card-header-primary">
        <h4 class="card-title ">Products Table
            <a href="{{ url('add-product') }}" class="btn btn-success float-right">Add Product</a>
        </h4>

    </div>
    <div class="card-body">
        <div class="table-responsive ">
            <table class="table">
                <thead class=" text-primary">
                    <tr>
                        <th>  ID    </th>
                        <th> Category </th>
                        <th>Name</th>
                        <th>Selling Price</th>
                        <th>Image</th>
                        <th colspan="2 "">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($product as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->category->name }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->selling_price }}</td>
                        <td><img class="img-fluid border-5 " width="75px" src="uploads/product/{{ $item->image }}" alt="category"></td>
                        <td><a href="{{ url('edit-product') }}/{{ $item->id }}" class="btn btn-warning">Edit</a></td>
                        <td><a href="{{ url('delete-product') }}/{{ $item->id }}" class="btn btn-danger">Delete</a></td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection