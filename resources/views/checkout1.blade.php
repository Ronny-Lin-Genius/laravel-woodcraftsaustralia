@extends('layout2')

@section('extra-header')
<style>
    ul li:nth-child(1), ul li:nth-child(1) a{
        color: black;
    }
    ul li:nth-child(1)::before{
        border-color: rgb(52,58,64);
    }
    .div-1{
        position: relative;
        margin-top: 30px;
    }
    .div-2{
        margin-top: 20px;
    }
    h2{
        color: rgb(52,58,64);
        background-color: white;
        font-size: .9rem;
        font-weight: 400;
        text-align: center;
    }
    .h2-1{
        background-color: white;
        display: inline-block;
        margin-left: 45%;
    }
    .h2-1::before{
        content: "";
        border: solid 2px rgb(193,193,193);
        position: absolute;
        top: 10px;
        left: 0px;
        width: 100%;
        height: 90px;
        z-index: -1;
    }
    h3{
        color: rgb(52,58,64);
        font-size: 1.3rem;
        font-weight: 400;
        margin-top: 40px;
        margin-bottom: 15px;
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
    /* .field .field__input:valid + .field__label, */
    /* .field .field__input:focus + .field__label{
        font-size: .8rem;
        top: 2px;
    } */
    .span-1{
        color: rgb(193,193,193);
        background-color: white;
        font-size: 1rem;
        font-weight: 400;
        margin: auto;
    }
    .span-1::before{
        content: "";
        position: absolute;
        background-color: rgb(193,193,193);
        height: 1px;
        width: 48%;
        left: 0px;
        top: 50%;
    }
    .span-1::after{
        content: "";
        position: absolute;
        background-color: rgb(193,193,193);
        height: 1px;
        width: 48%;
        right: 0px;
        top: 50%;
    }
    .infomation-form{
        grid-gap: 10px;
        margin-bottom: 70px;
    }
</style>
@endsection

@section('content')
<section class="infomation-section">
    <ul class="process-bar">
        <li class="process-bar__step1">
            <a href="{{route('infomation')}}">
                <span>INFORMATION</span>
            </a>
        </li>
        <li class="process-bar__step2">
            <span>SHIPPING</span>
        </li>
        <li class="process-bar__step3">
            <span>PAYMENT</span>
        </li>
    </ul> 
    <div class="div-1">
        <h2 class="h2-1">
            Express checkout
        </h2>
        <div id="paypal-button-container" style="margin: 15px auto 0px auto; width: 50%;"></div>
    </div>
    <div class="ro-flex div-2">
        <span class="span-1">
            or
        </span>
    </div>
    <form class="infomation-form display-grid" method="post" action="{{route('postInfomation')}}">
        @csrf
        <h3 class="ro-grid__1-7">
            Contact infomation
        </h3>
        <div class="field ro-grid__1-7">
            <input class="field__input feild__input-email" name="email" value="{{$infomation == null ? '' : $infomation['email']}}" type="email" required/>
            <span class="field__label">Email</span>
        </div>
        <h3 class="ro-grid__1-7">
            Shipping address
        </h3>
        <div class="field ro-grid__1-4">
            <input class="field__input" name="first_name" value="{{$infomation == null ? '' : $infomation['first_name']}}" type="text" required>
            <span class="field__label">First name</span>
        </div>
        <div class="field ro-grid__4-7">
            <input class="field__input" name="last_name" value="{{$infomation == null ? '' : $infomation['last_name']}}" type="text" required>
            <span class="field__label">Last name</span>
        </div>
        <div class="field ro-grid__1-7">
            <input class="field__input" name="address" value="{{$infomation == null ? '' : $infomation['address']}}" type="text" required>
            <span class="field__label">Address</span>
        </div>
        <!-- <div class="field ro-grid__1-7">
            <input class="field__input" type="text">
            <span class="field__label">Apartment, suite, etc. (optional)</span>
        </div> -->
        <div class="field ro-grid__1-7">
            <input class="field__input" name="city" value="{{$infomation == null ? '' : $infomation['city']}}" type="text" required>
            <span class="field__label">City</span>
        </div>
        <div class="field ro-grid__1-3">
            <input class="field__input" name="country" value="{{$infomation == null ? '' : $infomation['country']}}" type="text" required>
            <span class="field__label">Country/Region</span>
        </div>
        <div class="field ro-grid__3-5">
            <input class="field__input" name="state" value="{{$infomation == null ? '' : $infomation['state']}}" type="text" required>
            <span class="field__label">State/territory</span>
        </div>
        <div class="field ro-grid__5-7">
            <input class="field__input" name="postcode" value="{{$infomation == null ? '' : $infomation['postcode']}}" type="text" required>
            <span class="field__label">Postcode</span>
        </div>
        <div class="field ro-grid__1-7">
            <input class="field__input" name="phone" value="{{$infomation == null ? '' : $infomation['phone']}}" type="text">
            <span class="field__label">Phone - exclusive offers (per checkbox above)</span>
        </div>
        <button class="payment-btn ro-grid__4-7 mt-40">Continue to shipping</button>
    </form>
</section>
@endsection

@section('extra-footer')
    <script src="{{asset('js/checkout1.js')}}"></script>
    <!-- Paypal JavaScript SDK -->
    <script src="https://www.paypal.com/sdk/js?client-id=AYrsn8DJAElheNz-ZLIb8qJVfIyExIX4LGRAFCcYYZu6UyuEVOGRdb-LDmjI7wP0ebkLKQybNai2SyCB"></script>
    <script>
    paypal.Buttons({
        style: {
            layout: 'horizontal',
            color: 'black',
            shape:   'rect',
            label:   'paypal'
        },
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: 1
                    }
                }]
            });
        },
        onApprove: function(data, actions) {
            return  actions.order.capture().then(function(details) {
                        alert('Transaction completed by ' + details.payer.name.given_name);
                    });
        }
    }).render('#paypal-button-container');
    </script>
@endsection