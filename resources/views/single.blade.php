@extends('layout')
@section('extra-header')
    <!-- <link href="{{asset('css/single.css')}}" rel="stylesheet"/> -->
    <style>
        .product-info h2{
            font-family: 'Roboto', sans-serif;
        }
        .show{
            padding-top: 100%;
            background-size: cover;
            background-position: center;
        }
        .show:hover{
            background-size: 175%;
        }
        .thumbnail-container {
            position: relative;
        }
        .thumbnail-container:after {
            content: "";
            display: block;
            padding-bottom: 100%; /* The padding depends on the width, not on the height, so with a padding-bottom of 100% you will get a square */
        }
        .thumbnail{
            position: absolute; 
            top: 0;
            bottom: 0;
            left: 0;
            right: 0; 
            width: 100%;
            height: 100%;
            object-fit: cover; 
            object-position: center;
            opacity: .7;
            border: rgb(52,58,64) 3px solid;
            border-radius: 5px;
        }
        .thumbnail:hover{
            opacity: 1;
        }
        .active{
            opacity: 1;
        }
        @media only screen and (min-width: 992px){
            .wrap-show{
                width: 85%;
            }
            .thumbnail-group{
                width: 85%;
            }
        }
    </style>
@endsection
@section('content')
<div class="container-fluid" style="padding-top: 100px; padding-bottom: 100px">
    <div class="row row-cols-1 row-cols-sm-2" style="background: white; width: 90%; margin: auto;">
        <div>
            <div class="wrap-show" style="margin: auto;">
                <div class="show" style="background-image: url({{asset('/storage/images/products/' . $product['image'][0])}})"></div>
            </div>
            <div class="thumbnail-group container-fluid px-0 m-auto justify-content-start py-4">
                <div class="row row-cols-4 m-0">
                    @foreach( $product['image'] as $image)
                    <div class="thumbnail-container">
                        <img class="thumbnail" src="{{asset('/storage/images/products/' . $image)}}">
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="px-3 product-info">
            <h2 style="font-weight: 700; font-size: 1.6rem; border-bottom: 2px rgb(241,241,241) solid; padding-bottom: 20px;">{{ $product['name'] }}</h2>
            <div style="border-bottom: 2px rgb(241,241,241) solid; padding: 20px 0px 30px 0px;">
                <h2 style="font-weight: 300; font-size: 2.3rem; padding-bottom: 10px;">{{ '$' . $product['price'] }}</h2>
                <div style="font-color: rgb(202,202,202); font-weight: 300; font-size: 1rem;">
                    Our Banksia Tea Lights are stunning when lit at night, the candle light shines through the holes of the seed pod. These holes are created when the Banksia seed pod is shaped and hollowed by hand on a wood lathe.
                    {{ $product['desc'] }}
                </div>
            </div>
            <form class="my-4" action="{{route('cart.create')}}" method="post" style="border-bottom: 2px rgb(241,241,241) solid; padding-bottom: 20px;">
                @csrf
                <input type="hidden" name="id" value="{{$product['id']}}">
                @if($product['in_cart'])
                <button class="btn btn-success disabled" style="width: 100%; max-width: 300px; color: white; border-bottom: 1px rgb(241,241,241) solid;">Already In Cart</button>
                @else
                <button class="add-to-cart btn btn-dark" style="width: 100%; max-width: 300px; color: white;">Add To Cart</button>
                @endif
            </form>
        </div>
    </div>
</div>
@endsection
<!--////////////////////////////////////////////////////////////////////////////////////////////
                      Script Section
//////////////////////////////////////////////////////////////////////////////////////////// -->
@section('extra-footer')
<!-- Slide Gallery -->
<script>
    const show = document.querySelector('.show');
    show.addEventListener('mousemove', (e)=>{
        const width = show.clientWidth;
        const height = show.clientHeight;
        const x = e.offsetX;
        const y = e.offsetY;
        const bgPosX = x / width * 100;
        const bgPosY = y / height * 100;
        show.style.backgroundPosition = `${bgPosX}% ${bgPosY}%`;
    });
    const thumbnails = document.querySelectorAll(".thumbnail");
    thumbnails.forEach(element =>{
        element.addEventListener("click", ()=>{
            show.style.backgroundImage = `url(${element.src})`;
        })
    });
</script>
<!-- Add To Cart Event -->
<script>
    const add_to_cart = document.querySelector('.add-to-cart');
    if(add_to_cart){
        add_to_cart.addEventListener('click', ()=>{
            add_to_cart.classList.add('disabled');
            add_to_cart.innerHTML = "  <span class='spinner-grow spinner-grow-sm' role='status' aria-hidden='true'></span> Adding to cart..."
        });
    }
</script>
@endsection