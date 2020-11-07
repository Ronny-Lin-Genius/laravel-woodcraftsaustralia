@extends('layout')

@section('extra-header')
<link rel="stylesheet" href="{{asset('css/contact.css')}}">
<script src="https://kit.fontawesome.com/807899bdcd.js" crossorigin="anonymous"></script>
@endsection

@section('content')
<section>
    <div class="sec sec-1">
        <h3>Contact Us</h3>
        <form style="width: 80%; margin: 50px 0px;">
            <div class ="form-group">
                <label for="exampleFormControlInput1">Name:</label>
                <input type="email" class="form-control" id="exampleFormControlInput1">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Email address:</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Message:</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <button>
                SEND
            </button>
        </form>
    </div>
</section>
<section>
    <div class="sec sec-2">
        <h2>OR</h2>
        <div class="contacts">
            <div class="contact contact-1">
                <i class="fas fa-home"></i>
                <span> 
                    VISIT US
                </span>
                <span> 
                    Queen Victory Market (J Shed 1)
                </span>
            </div>
            <div class="contact contact-2">
                <i class="fas fa-phone-alt"></i>
                <span> 
                    CALL US
                </span> 
                <span> 
                    0406099978
                </span>
            </div>
            <div class="contact contact-3">
                <i class="fas fa-envelope"></i>
                <span>
                    EMAIL US
                </span>
                <span>
                    help@woodcraftsaustralia.com
                </span>
            </div>
        </div>
    </div>
</section>
@endsection