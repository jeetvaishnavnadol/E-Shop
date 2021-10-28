@extends('layouts.front')
@section('page_title','E-Shop')
@section('content')
@include('layouts.inc.slider')



<div class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <h2 class=" text-center text-decoration-underline text-danger mb-3">-Featued Products- </h2>
            <div class="featured-carousel owl-carousel owl-theme">

                @foreach ($featured_product as $item)

                <div class="item">
                    <div class="card">
                        <img src="{{ asset('uploads/product/'.$item->image) }}" class="card-img-top "
                            alt="Procuct images">
                        <div class="card-body">
                            <h5>{{ $item->name }}</h5>
                            <span class="float-start">{{ $item->selling_price }}</span>
                            <span class="float-end "><s>{{ $item->original_price }}</s></span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
</div>
<div class="py-5 ">
    <div class="container">
        <div class="row">
            <h2 class=" text-center text-decoration-underline text-danger mb-3">-Trending Category- </h2>
            <div class="featured-carousel owl-carousel owl-theme">

                @foreach ($trending_category as $item)

                <div class="item">
                    <a href="{{ url('view-category/'.$item->slug) }}">
                        <div class="card">
                            <img src="{{ asset('uploads/category/'.$item->image) }}" class="card-img-top "
                                alt="Procuct images">
                            <div class="card-body">
                                <h5>{{ $item->name }}</h5>
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

@endsection
@section('script')
<script>
    $('.featured-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    dots:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})
</script>
@endsection