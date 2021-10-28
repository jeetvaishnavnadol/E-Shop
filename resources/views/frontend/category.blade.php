@extends('layouts.front')
@section('page_title','E-Shop | Category')

@section('content')
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class=" text-center text-decoration-underline text-danger mb-3">-All Categories- </h2>

                <div class="row">
                    @foreach ($category as $item)
                    <div class="col-md-3 mb-3">
                        <a href="{{ url('view-category/'.$item->slug) }}">
                            <div class="card">
                                <img src="{{ asset('uploads/category/'.$item->image) }}" class="card-img-top "
                                    alt="Category images">
                                <div class="card-body">
                                    <h5>{{ $item->name }} </h5>
                                    <p>{{ $item->description }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection