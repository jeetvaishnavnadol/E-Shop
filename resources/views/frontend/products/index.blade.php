@extends('layouts.front')
@section('page_title',$category->name )



@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="" > Collections / {{ $category->name }} </h6>
    </div>
</div>

<div class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <h2 class=" text-center text-decoration-underline text-danger mb-3">-{{ $category->name }}- </h2>


            @foreach ($product as $item)
            <div class="col-md-3 mb-3 ">
                <div class="card">
                    <a href="{{ url('category/'.$category->slug.'/'.$item->slug) }}">
                        <img src="{{ asset('uploads/product/'.$item->image) }}" class="card-img-top "
                            alt="Procuct images">
                        <div class="card-body">
                            <h5>{{ $item->name }}</h5>
                            <span class="float-start">{{ $item->selling_price }}</span>
                            <span class="float-end "><s>{{ $item->original_price }}</s></span>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach


        </div>
    </div>
</div>

@endsection