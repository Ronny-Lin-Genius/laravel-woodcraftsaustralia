@extends('layout')

@section('extra-header')
<link rel="stylesheet" href="{{asset('css/home.css')}}">
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&display=swap" rel="stylesheet">
@endsection

@section('content')
<div class="home">
    <section>
        <div class="sec sec1">
            <img class="img-1" src="https://www.woodcraftsaustralia.com/wp-content/uploads/2020/08/71597466240_.pic_hd-1-scaled-1-e1598068023387.jpg" alt="">
            <img class="img-2" src="https://www.woodcraftsaustralia.com/wp-content/uploads/2020/10/WechatIMG36-side-1-scaled.jpeg" alt="">
        </div>
    </section>
    <section>
        <div class="sec sec2">
            <p> We have a shop in <span>Queen Victoria Market(J Shed 1)</span> Welcome to visit.</p>
            <img src="https://www.woodcraftsaustralia.com/wp-content/uploads/2020/08/LogoMakr_8f2LzQ.png" alt="">
            <p><span>Woodcrafts Australia</span> is an unique shop, we sell different wood products, such as <span>Camphor Laurel cutting boards, vases,bowls, coasters, trivets, pens, my name train, clock, etc.</span>They are all made in Australia, using high quality local timbers, with all of them made by hand, making them one-of-a-kind</p>
        </div>
    </section>
    <section class="section-3">
        <div class="sec sec3">
            <img src="https://www.woodcraftsaustralia.com/wp-content/uploads/2020/08/Hnet.com-image.png" alt="">
            <div>
                <h2 style="border-right: rgb(52,122,94) solid 3px;" class="font-size-2">OUR CERTIFICATE</h2>
                <p style="margin-top: 25px;"><span class="light-brown">WoodCrafts Australia</span> has been licensed by Australian Made Campaign Limited to use the Australia Made, Australian Grown logo on product listed in accordance with the AMAG Logo Code Of Practice</p>
                <span class="font-size-3">100%</span>
                <p style="border-right: rgb(52,122,94) solid 3px;">AUSTRALIA MADE</p>
            </div>
        </div>
    </section>
    <section class="section-4">
        <div class="sec section-res sec4">
            <div class="category-container">
                <img class="category-img" src="https://www.woodcraftsaustralia.com/wp-content/uploads/2020/09/1541599216389_.pic_hd-scaled.jpg" alt="">
            </div>
            <div class="text-center flex-context">
                <h3 style="margin-top: 10px;">Cutting Board</h3>
                <p>Made from Camphor Laurael, that grows in Northern NSW and Southern Queensland, Australia. These boards are made in the Byron Bay area by a family bussiness for us.</p>
                <button class="btn-1">See More</button>
            </div>
        </div>
    </section>
    <section class="section-5">
        <div class="sec section-res sec5">
            <div class="text-center flex-context">
                <h3>Coaster</h3>
                <p>Each item is designed to be purposeful and uniquely Australia.</p>
                <button class="btn-1" style="margin: 0px 0px 20px 0px;">See More</button>
            </div>
            <div class="category-container">
                <img class="category-img" src="https://www.woodcraftsaustralia.com/wp-content/uploads/2020/08/151598847952_.pic_hd-scaled-e1598848533205.jpg" alt="">
            </div>
        </div>
    </section>
    <section class="section-6">
        <div class="sec section-res sec6">
            <div class="category-container">
                <img class="category-img" src="https://www.woodcraftsaustralia.com/wp-content/uploads/2020/08/WechatIMG1-scaled-e1598071700830.jpeg" alt="">
            </div>
            <div class="text-center flex-context">
                <h3 style="margin-top: 10px;">Banksia Products</h3>
                <p>We use a particular type of Banksia called ‘Grandis’. It is also commonly known as Bull Banksia or Giant Banksia. The tree itself will grow to approximately 10 metrus, it produces brilliant yellow flowers followed by large seed pod. it the extreeme temperatures of the Western Australian Bush the pods open up to release seeds for regermination.</p>
                <button class="btn-1">See More</button>
            </div>
        </div>
    </section>
</div>
@endsection