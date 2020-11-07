@extends('layout')
<!--////////////////////////////////////////////////////////////////////////////////////////////
                        Header Section
//////////////////////////////////////////////////////////////////////////////////////////// -->
@section('extra-header')
    <link href="{{asset('css/single.css')}}" rel="stylesheet"/>
@endsection
<!--////////////////////////////////////////////////////////////////////////////////////////////
                          Content
//////////////////////////////////////////////////////////////////////////////////////////// -->
@section('content')
<div class="container-fluid" style="padding-top: 100px; padding-bottom: 100px">
    <div class="row row-cols-1 row-cols-sm-2 text-center text-sm-left" style="background: white;">
        <div>
            <div class="wrap-show m-auto w-75">
                <div class="show" style="background-image: url({{asset('/storage/images/' . $product['image'])}})"></div>
            </div>
            <div class="container-fluid px-0 w-75 m-auto justify-content-start py-4">
                <div class="row row-cols-4 m-0">
                    <div class="thumbnail-container">
                        <img class="thumbnail" src="{{asset('/storage/images/' . $product['image'])}}">
                    </div>
                    <div class="thumbnail-container">
                        <img class="thumbnail" src="https://www.woodcraftsaustralia.com/wp-content/uploads/2020/08/361598669833_.pic_hd-scaled-e1598670246482.jpg">
                    </div>
                    @foreach( $product['product_images'] as $image)
                    <div class="thumbnail-container">
                        <img class="thumbnail" src="{{asset('/storage/images/' . $image['image'])}}">
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div style="border-left: 1px black solid" class="px-5">
            <div class="justify-content-center justify-content-sm-start" style="display:flex; flex-direction:row" >
                <h2>Name: </h2>
                <h2>{{ $product['name'] }}</h2>
            </div>
            <div class="justify-content-center justify-content-sm-start" style="display:flex; flex-direction: row; margin-top: 20px">
                <h2>Price:</h2>
                <h2>{{ '$' . $product['price'] }}</h2>
            </div>
            <form class="my-4" action="{{route('cart.create')}}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{$product['id']}}">
                <div style="margin-top: 20px">
                    <h2>Description:</h2>
                    <p>{{ $product['desc'] }}</p> 
                </div>
                @if($product['in_cart'])
                <button class="btn btn-success disabled" style="width: 100%; margin-top: 35px; max-width: 300px; color: white">Already In Cart</button>
                @else
                <button class="add-to-cart btn btn-dark" style="width: 100%; margin-top: 35px; max-width: 300px; color: white">Add To Cart</button>
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