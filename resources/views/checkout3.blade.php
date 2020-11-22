@extends('layouts/layout2')

@section('extra-header')
<script src="https://js.stripe.com/v3/"></script>
<script src="https://polyfill.io/v3/polyfill.min.js?version=3.52.1&features=fetch"></script>
<!-- Stripe client js file -->
<script src="{{ asset('js/checkout3.js') }}" defer></script>
<link href="{{ asset('css/checkout3.css') }}" rel="stylesheet">

<style>
    .process-bar{
        margin-bottom: 40px;
    }
    ul li:nth-child(1)::before, ul li:nth-child(2)::before{
        content: "";
        width: 40px;
        height: 40px;
        border-color: rgb(193,193,193);
        background-size: cover;
        background-image: url({{asset("pic/done.png")}});
    }
    ul li:nth-child(3), ul li:nth-child(3) a{
        color: black;
    }
    ul li:nth-child(3)::before{
        border-color: rgb(52,58,64);
    }
    .payment-section{
        font-weight: 300;
    }
    .confirmation, .billing-address{
        border: rgb(193,193,193) 1px solid; 
    }
    .confirmation__ro-flex{
        display: flex;
        margin: 10px; 
    }
    .confirmation__ro-flex span{
        color: rgb(163,163,163); 
        width: 90px;
    }
    .confirmation__ro-flex div{
        flex-grow: 1;
    }
    .confirmation__ro-flex a{   
        font-size: .9rem;
    }
</style>
@endsection

@section('content')
<div class="payment-section">
    <ul class="process-bar">
        <li class="process-bar__step1">
            <a href="{{route('infomation')}}">
                <span>INFORMATION</span>
            </a>
        </li>
        <li class="process-bar__step2">
            <a href="{{route('shipping')}}">
                <span>SHIPPING</span>
            </a>        
        </li>
        <li class="process-bar__step3">
            <a href="{{route('payment')}}">
                <span>PAYMENT</span>
            </a>
        </li>
    </ul> 
    <div class="confirmation">
        <div class="confirmation__ro-flex">
            <span>Contact</span>
            <div>{{$infomation == null ? "" : $infomation['email']}}</div>
            <a href="{{route('infomation')}}">Change</a>
        </div>
        <div class="confirmation__ro-flex" style="padding-top: 10px; border-top: rgb(193,193,193) 1px solid;">
            <span>Ship to</span>
            <div>{{$infomation == null ? "" : $infomation['address']}}</div>
            <a href="{{route('infomation')}}">Change</a>
        </div>
        <div class="confirmation__ro-flex" style="padding-top: 10px; border-top: rgb(193,193,193) 1px solid;">
            <span>Method</span>
            <div>
                @if ($infomation == null)
                    Nothing selected
                @elseif ($infomation['shipping_method'] == "normal")
                    Free Shipping (2 to 8 Business Days) · Free
                @elseif($infomation['shipping_method'] == "express")
                    Express Shipping (1 to 2 Business Days) · $5.99
                @endif
            </div>
            <a href="{{'shipping'}}">Change</a>
        </div>
    </div>
    <form id="payment-form">
      <div id="card-element"><!--Stripe.js injects the Card Element--></div>
      <button id="submit" class="stripe-submit">
        <div class="spinner hidden" id="spinner"></div>
        <span id="button-text">Pay</span>
      </button>
      <p id="card-error" role="alert"></p>
      <p class="result-message hidden">
        Payment succeeded, see the result in your
        <a href="" target="_blank">Stripe dashboard.</a> Refresh the page to pay again.
      </p>
    </form>
    <div class="display-grid mt-40 align-items-center">
        <a class="ro-grid__1-4" href="{{route('shipping')}}">Return to shipping</a>
        <!-- <button class="ro-grid__4-7 payment-btn" id="checkout-button" data-secret="{{$session->id}}">Pay now</button> -->
    </div>
</div>
@endsection

@section('extra-footer')
<script>
    // var stripe = Stripe('pk_test_51GsMzhD2QcqvamdP5ZmYoSzJ0AqYv7rXvRSZI7QQb7XnGSJqANRQ5Q5PnfGJOj7QlS3dwrdoK3sWz5HPSNlvIefz00NafcrLvY');
    // var style = {
    //   base: {
    //     color: "#32325d",
    //     fontFamily: 'Arial, sans-serif',
    //     fontSmoothing: "antialiased",
    //     fontSize: "16px",
    //     "::placeholder": {
    //         // f07439 32325d
    //       color: "#32325d"
    //     }
    //   },
    //   invalid: {
    //     fontFamily: 'Arial, sans-serif',
    //     color: "#fa755a",
    //     iconColor: "#fa755a"
    //   }
    // };

    // var elements = stripe.elements();
    // var cardElement = elements.create('card', {style : style} );
    // cardElement.mount('#card-element');

    // var checkoutButton = document.getElementById('checkout-button');
    // checkoutButton.addEventListener('click', function() {
    //     stripe.redirectToCheckout({
    //         // Make the id field from the Checkout Session creation API response
    //         // available to this file, so you can provide it as argument here
    //         // instead of the {CHECKOUT_SESSION_ID} placeholder.
    //         sessionId: '{{$session->id}}'
    //     }).then(function (result) {
    //         // If `redirectToCheckout` fails due to a browser or network
    //         // error, display the localized error message to your customer
    //         // using `result.error.message`.
    //     });
    // });
</script>
@endsection