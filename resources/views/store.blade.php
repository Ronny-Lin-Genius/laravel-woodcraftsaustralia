@extends('layout')
@section('content')
<div class="container-fluid mt-5">
    <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4">
        @foreach($products as $product)
        <div class="p-4 mb-5 p-lg-4">
            <div class="justify-content-center" style="padding-top:100%; position: relative">
                <a style="position: absolute; top: 0; width:100%; height: 100%;" href="{{ route('product.show', $product['id']) }}">
                    <img style="width:100%; height: 100%; object-fit:cover;" src="{{$product['image']}}" class="card-img-top">
                </a>
            </div>
            <div class="d-flex flex-column">
                <a class="mt-2" href="#" style="font-size: 1.2rem; color: black; font-weight: 100">{{$product['name']}}</a>
                <img style="width: 40%; max-width: 100px" src="{{asset('pic/star.png')}}">
                <span class="mt-2">{{'$' . $product['price']}}</span>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection