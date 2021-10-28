@extends('layouts.admin')
@section('category_select', 'active')
@section('page_title', 'Eshop | Categories')
@section('content')
@if (Session::has('status'))
<div class="alert alert-success alert-dismissible">
{{ Session::get("status") }}    
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
        <h4 class="card-title ">Simple Table
            <a href="{{ url('add-category') }}" class="btn btn-success float-right">Add Category</a>
        </h4>

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead class=" text-primary">
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            Slug
                        </th>
                        <th>
                            Description
                        </th>
                        <th>
                            Status
                        </th>
                        <th>
                            Popular
                        </th>
                        <th>
                            Image
                        </th>
                        <th colspan="2">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                   @foreach ($category as $item)
                       <tr>
                           <td>{{ $item->id }}</td>
                           <td>{{ $item->name }}</td>
                           <td>{{ $item->slug }}</td>
                           <td>{{ $item->description}}</td>
                           <td>{{ $item->status }}</td>
                           <td>{{ $item->popular }}</td>
                           <td><img class="img-fluid w-25" src="uploads/category/{{ $item->image }}" alt="category"></td>
                           <td><a href="{{ url('edit-category') }}/{{ $item->id }}" class="btn btn-warning">Edit</a></td>
                           <td><a href="{{ url('delete-category') }}/{{ $item->id }}" class="btn btn-danger">Delete</a></td>
                           
                       </tr>
                   @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection