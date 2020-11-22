@extends('layout')

@section('extra-header')
<link rel="stylesheet" href="{{asset('css/cart.css')}}">
<!-- <script src="https://js.stripe.com/v3/"></script> -->
@endsection()
@section('content')

@if ( App\Http\Controllers\CartController::getItemQty() == 0)
    <div class="d-flex flex-column justify-content-center w-50 m-auto text-center" style="height: 70vh;">
        <h1>Your Cart</h1>
        <p class="m-5">your cart is currently empty.</p>
        <a href="{{route('store')}}" class="btn btn-dark">CONTINUE SHOPPING</a>
    </div>
@else
    <div class="container" style="margin-bottom: 100px; margin-top: 50px; max-width: 90vw">
        <div class="row row-cols-1">
            <form class="text-center" action="{{route('cart.update')}}" method="post" style="margin: 0px auto 0px auto; border: solid rgb(234, 234, 234) 1px; border-radius: 3px">
                @csrf
                <div class="container-fluid d-none d-md-block p-3" style="border-bottom: solid rgb(234, 234, 234) 1px">
                    <div class="row row-cols-5">
                        <div></div>
                        <div></div>
                        <div>NAME</div>
                        <div>QUANTITY</div>
                        <div>PRICE</div>
                    </div>
                </div>
                @foreach($in_cart_products as $product)
                    <div class="container-fluid p-2" style="background: white; border-bottom: solid rgb(234, 234, 234) 1px">
                        <div class="row row-cols-1 row-cols-md-5">
                            <!-- delete buttom -->
                            <div class="d-flex justify-content-center align-items-center mb-3 p-1">
                                <a class="{{'remove-from-cart-' . $loop->index}} remove-from-cart" href="{{ route('cart.delete', $product['id']) }}" style="font-size: 1.2rem; border: solid rgb(198,198,198) 1px; border-radius: 50%; width: 30px; height: 30px; color: rgb(198,198,198);">X</a>
                            </div> 
                            <img src="{{asset('storage/images/products/' . $product['image'][0])}}" style="width:100px; height:100px; object-fit: contain">
                            <div class="d-flex justify-content-between justify-content-md-center align-items-center n p-3 mt-2">
                                <span class="d-md-none" style="color: 858585; font-weight: 800">Name:</span>
                                <span style="font-weight: 100;">{{ $product['attribute'] ? $product['name'] . " - " . $product['attribute'] : $product['name'] }}</span>
                            </div>
                            <div class="d-flex justify-content-between justify-content-md-center align-items-center p-3">
                                <span class="d-md-none" style="color: 858585; font-weight: 800">Quantity:</span>
                                <div class="d-flex justify-content-center justify-content-md-start align-items-center">
                                    <i class="fas fa-chevron-up btn-increase" style="cursor: pointer; padding: 2px; color: rgb(198,198,198);"></i>
                                    <input type="hidden" name="product_id[]" value="{{$product['id']}}">
                                    <input class="item-number" name="quantity[]" value="{{ $product['quantity'] }}" type="text" style="width: 60px; outline: none; text-align: center; border: rgb(198,198,198) 2px solid; padding: 2px; border-left: none; border-right: none;">
                                    <i class="fas fa-chevron-down btn-decrease" style="cursor: pointer; padding: 2px; color: rgb(198,198,198);"></i>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between justify-content-md-center align-items-center px-3 py-3">
                                <span class="d-md-none" style="color: 858585; font-weight: 800">Subtotal:</span>
                                <span>{{"$" . $product['price']}}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
                <button class="update-cart-items btn btn-dark w-100 mt-4">UPDATE CART</button>
            </form>
        </div>
        <div class="row" style="margin-top: 100px">
            <div class="col-md-6 offset-md-6" style="background: white; border: solid rgb(234, 234, 234) 1px;">
                <div class="d-flex flex-column justify-content-between py-4">
                    <!-- Total price -->
                    <div class="text-center py-3">
                        <h5>CART TOTALS</h5>
                        <h3 id="total-price">{{ '$' . App\Http\Controllers\CartController::getTotalPrice() }}</h3>
                    </div>
                    <a class="btn btn-dark" href="{{route('infomation')}}">PROCEED TO CHECKOUT</a>
                </div>
            </div>
        </div>
    </div>
@endif
@endsection


@section('extra-footer')
    <script>
        //Render the paypal botton
        // paypal.Buttons({
        //     style: {
        //         layout: 'horizontal',
        //         color: 'black',
        //         shape:   'rect',
        //         label:   'paypal'
        //     },
        //     createOrder: function(data, actions) {
        //         return actions.order.create({
        //             purchase_units: [{
        //                 amount: {
        //                     value: 1
        //                 }
        //             }]
        //         });
        //     },
        //     onApprove: function(data, actions) {
        //         return  actions.order.capture().then(function(details) {
        //                     alert('Transaction completed by ' + details.payer.name.given_name);
        //                 });
        //     }
        // }).render('#paypal-button-container');
        //Animation on remove btn
        const remove_from_cart = document.querySelectorAll('.remove-from-cart');
        let count = 0;
        remove_from_cart.forEach(()=>{
            count +=1;
        });
        for (let i = 0; i < count; i++) {
            const current = document.querySelector(".remove-from-cart-" + i);
            current.addEventListener("click", ()=>{
                current.classList.add('disabled');
                current.innerHTML = "  <span class='spinner-grow spinner-grow-sm' role='status' aria-hidden='true'></span> removing..."
            })
        }
        //Animation on update btn
        const update_cart_items = document.querySelector(".update-cart-items");
        update_cart_items.addEventListener("click", ()=>{
            update_cart_items.innerHTML = "  <span class='spinner-grow spinner-grow-sm' role='status' aria-hidden='true'></span> updating..."
        });
        //Increase and Decrease item number
        const item_number = document.querySelectorAll('.item-number');
        const btn_increase = document.querySelectorAll('.btn-increase');
        const btn_decrease = document.querySelectorAll('.btn-decrease');
        btn_increase.forEach((element, index) => {
            element.addEventListener('click', ()=>{
                item_number[index].value++;
            })
        });
        btn_decrease.forEach((element, index) => {
            element.addEventListener('click', ()=>{
                if(item_number[index].value > 0){
                    item_number[index].value--;
                }
            })
        });
    </script>
@endsection