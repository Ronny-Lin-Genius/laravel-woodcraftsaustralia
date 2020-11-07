@extends('layout2')

@section('extra-header')
<style>
    .process-bar{
        margin-bottom: 40px;
    }
    ul li:nth-child(1)::before{
        content: "";
        width: 40px;
        height: 40px;
        border-color: rgb(193,193,193);
        background-size: cover;
        background-image: url({{asset("pic/done.png")}});
    }
    ul li:nth-child(2), ul li:nth-child(2) a{
        color: black;
    }
    ul li:nth-child(2)::before{
        border-color: rgb(52,58,64);
    }
    .infomation-section{
        font-weight: 300;
    }
    .confirmation{
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
        background-color: white;
        font-size: 1.3rem;
        font-weight: 400;
        margin-top: 50px;
        margin-bottom: 10px;
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
            <a href="{{route('shipping')}}">
                <span>SHIPPING</span>
            </a>
        </li>
        <li class="process-bar__step3">
            <span>PAYMENT</span>
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
    </div>
    <h2>Shipping method</h2>
    <form class="shipping-form" action="{{route('postShipping')}}" method="post">
        @csrf
        <div style="border: rgb(193,193,193) 1px solid;">
            <div class="display-flex justify-content-between" style="margin: 10px 10px 3px 10px;">
                <div>
                    <input type="radio" id="normal" name="shipping_method" value="normal" checked>
                    <label for="normal">Free Shipping (2 to 8 Business Days)</label><br/>
                </div>
                <span>Free</span>
            </div>
            <div class="display-flex justify-content-between" style="margin: 0px 10px 3px 10px; padding-top: 10px; border-top: rgb(193,193,193) 1px solid;">
                <div>
                    <input type="radio" id="express" name="shipping_method" value="express">
                    <label for="express">Express Shipping (1 to 2 Businees Days)</label>
                </div>
                <span>$5.99</span>
            </div>
        </div>
        <div class="display-grid align-items-center mt-40">
            <a class="ro-grid__1-4" href="{{route('infomation')}}">Return to infomation</a>
            <button class="payment-btn ro-grid__4-7" href="{{route('payment')}}">Continue to payment</button>
        </div> 
    </form>
</section>
@endsection

@section('extra-footer')
@endsection