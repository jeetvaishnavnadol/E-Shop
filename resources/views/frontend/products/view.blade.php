@extends('layouts.front')
@section('page_title',$product->name)


@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0"> Collections / {{ $product->category->name }} / {{ $product->name }}</h6>
    </div>
</div>
<div class="container ">
    <div class="card shadow mt-2 product_data">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 border-right">
                    <img src="{{ asset('uploads/product/'.$product->image) }}" class=" img-fluid  rounded w-100"
                        alt="{{ $product->name }}">
                </div>
                <div class="col-md-8">
                    <h2 class="mb-0" style="font-size: 28px">
                        {{ $product->name }} <label for="" style="font-size: 16px;"
                            class="float-end badge bg-danger trending_tag">{{ $product->trending == '1' ? 'Trending': ''
                            }}</label>
                    </h2>
                    <hr>
                    <label for="" class="me-3">Original Price: <s>Rs {{ $product->original_price }}</s></label>
                    <label for="" class="me-3">Selling Price: Rs {{ $product->selling_price }}</label>
                    <p class="mt-3">
                        {{ $product->small_description }}
                    </p>
                    <hr>
                    @if ($product->qty>0)
                    <label for="" class="badge bg-success">In Stock</label>

                    @else
                    <label for="" class="badge bg-danger">Out of Stock</label>

                    @endif
                    <div class="row mt-2">
                        <div class="col-md-3 text-center">
                            <input type="hidden" value="{{ $product->id }}" class="prod_id">
                            <label for="Quantity">Quantity</label>
                            <div class="input-group text-center mb-3">
                                <button class="input-group-text decreament">-</button>
                                <input type="text" name="qty" value="1" class="text-center qty-input form-control">
                                <button class="input-group-text increament">+</button>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <br>
                            <button type="submit" class="btn btn-primary addToCart  me-3 float-start">Add to Cart <i
                                    class="fa fa-shopping-cart"></i></button>
                            <button type="submit" class="btn btn-success me-3 float-start">Add to Wishlist <i
                                    class="fa fa-heart"></i></button>
                        </div>

                    </div>
                </div>
                <hr class="mt-2">
                <h2>Description</h2>
                <span>{{ $product->description}}</span>
            </div>
        </div>
    </div>
</div>


@endsection
@section('script')
<script>
    $(document).ready(function () {
           
       $.ajaxSetup({
           headers:{
               'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
           }
       });
        $('.addToCart').click(function (e) { 
            e.preventDefault();
            var product_id=$(this).closest('.product_data').find('.prod_id').val();
            var product_qty=$(this).closest('.product_data').find('.qty-input').val();

            $.ajax({
                method: "POST",
                url: "/add-to-cart",
                data: {
                    'product_id':product_id,
                    'product_qty':product_qty,

                },
                dataType:"json",
               
                success: function (response) {
                    alert(response.status);
                }
            });
        });
  
        
        
        
        $('.increament').click(function (e) { 
                e.preventDefault();
                var inc= $('.qty-input').val();
                var value= parseInt(inc,10);
                value=isNaN(value) ? 0:value;
                if(value< 10)
                {
                    value++;
                    $('.qty-input').val(value);
                 }
               

                
            });
            $('.decreament').click(function (e) { 
                e.preventDefault();
                var inc= $('.qty-input').val();
                var value= parseInt(inc,10);
                value=isNaN(value) ? 0:value;
                if(value > 1)
                {
                    value--;
                    $('.qty-input').val(value);
                 }
               

                
            });
        });
</script>
@endsection