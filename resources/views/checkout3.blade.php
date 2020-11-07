@extends('layout2')

@section('extra-header')
<script src="https://js.stripe.com/v3/"></script>
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
    /* ul li:nth-child(2)::before{ */
        /* content: "";
        width: 40px;
        height: 40px;
        border-color: rgb(193,193,193);
        background-size: cover;
        background-image: url({{asset("pic/done.png")}}); */
    /* } */
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
    h2{
        color: rgb(52,58,64);
        font-size: 1.2rem;
        font-weight: 400;
        margin-top: 50px;
        margin-bottom: 10px;
    }
    h3{
        color: rgb(52,58,64);
        font-size: .9rem;
        font-weight: 400;
        margin-bottom: 13px;
    }
    /* .billing-address__ro-flex{
        display: flex;
        justify-content: space-between;
    } */
    .billing-form{
        background-color: rgb(250,250,250);
        border-top: solid 1px rgb(193,193,193);
        grid-gap: 10px;
        padding: 10px;
    }
    .field{
        border: solid 1px rgb(193,193,193);
        border-radius: 5px;
        position: relative;
    }
    .field__label{
        color: black;
        font-size: 1rem;
        font-weight: 200;
        position: absolute;
        top: 13px;
        left: 10px;
        pointer-events: none;
        transition: 100ms;
    }
    .field__input{
        border: none;
        font-weight: 300;
        width: 100%;
        padding: 20px 0px 0px 10px;
    }
    .input-active{
            font-size: .8rem;
            top: 2px;
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
    <h2>
        Billing address
    </h2>
    <h3>
        Select the address that matches your card or payment method
    </h3>
    <div class="billing-address">
        <div class="billing-address__ro-flex" style="margin: 10px 10px 3px 10px;">
            <input  class="billing-address__radio" type="radio" id="same" name="billing_address" value="Free Shipping (2 to 8 Business Days)" checked>
            <label for="same">Same as shipping address</label><br/>
        </div>
        <div class="billing-address__ro-flex" style="margin: 0px 10px 3px 10px; padding-top: 10px; border-top: rgb(193,193,193) 1px solid;">
            <input  class="billing-address__radio" type="radio" id="different" name="billing_address" value="">
            <label for="different">Use a different billing address</label>
        </div>
        <form class="billing-form display-none" id="billing-form" method="post">
            @csrf
            <div class="field ro-grid__1-4">
                <input class="field__input" name="first_name" type="text" required>
                <span class="field__label">First name</span>
            </div>
            <div class="field ro-grid__4-7">
                <input class="field__input" name="last_name" type="text" required>
                <span class="field__label">Last name</span>
            </div>
            <div class="field ro-grid__1-7">
                <input class="field__input" name="address" type="text" required>
                <span class="field__label">Address</span>
            </div>
            <div class="field ro-grid__1-7">
                <input class="field__input" name="city" type="text" required>
                <span class="field__label">City</span>
            </div>
            <div class="field ro-grid__1-3">
                <input class="field__input" name="country" type="text" required>
                <span class="field__label">Country/Region</span>
            </div>
            <div class="field ro-grid__3-5">
                <input class="field__input" name="state" type="text" required>
                <span class="field__label">State/territory</span>
            </div>
            <div class="field ro-grid__5-7">
                <input class="field__input" name="postcode" type="text" required>
                <span class="field__label">Postcode</span>
            </div>
        </form>
    </div>
    <div class="display-grid mt-40 align-items-center">
        <a class="ro-grid__1-4" href="{{route('shipping')}}">Return to shipping</a>
        <button class="ro-grid__4-7 payment-btn" id="checkout-button" data-secret="{{$session->id}}">Pay now</button>
    </div>
</div>
@endsection

@section('extra-footer')
<script>
    var stripe = Stripe('pk_test_51GsMzhD2QcqvamdP5ZmYoSzJ0AqYv7rXvRSZI7QQb7XnGSJqANRQ5Q5PnfGJOj7QlS3dwrdoK3sWz5HPSNlvIefz00NafcrLvY');
    var checkoutButton = document.getElementById('checkout-button');
    checkoutButton.addEventListener('click', function() {
        stripe.redirectToCheckout({
            // Make the id field from the Checkout Session creation API response
            // available to this file, so you can provide it as argument here
            // instead of the {CHECKOUT_SESSION_ID} placeholder.
            sessionId: '{{$session->id}}'
        }).then(function (result) {
            // If `redirectToCheckout` fails due to a browser or network
            // error, display the localized error message to your customer
            // using `result.error.message`.
        });
    });
</script>
<script src="{{asset('js/checkout3.js')}}"></script>
@endsection