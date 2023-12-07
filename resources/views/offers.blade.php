@extends('layout')
@section('title')
Hotel Miranda | Offers
@endsection
@section('content')
<section class="offerspageintro">
    <div class="offerspageintro__inner">
        <h6 class="offerspageintro__pretitle">THE ULTIMATE LUXURY</h6>
        <h1 class="offerspageintro__title">Our Offers</h1>
        <div class="offerspageintro__pages">
            <a class="offerspageintro__linkprev" href="/">Home</a>
            <span class="offerspageintro__linkbar">|</span>
            <span class="offerspageintro__linktext">Offers</span>
        </div>
    </div>
</section>
<section class="roomoffer">
    <div class="roomoffer__inner">
        <div class="swiper roomoffer__swiper">
            <div class="swiper-wrapper roomoffer__swiper-wrapper">
                @foreach($discountedRooms as $chunk)
                <div class="swiper-slide roomoffer__swiper-slide">
                    @foreach($chunk as $room)
                    <div class="roomoffer__offer">
                        <div class="roomoffer__imgwrapper">
                            <img class="roomoffer__imgwrapper-img" src="{{ $room['photo'] }}" alt="Luxury Room">
                            <div class="roomoffer__imgwrapper-prevprice">
                                <span class="roomoffer__imgwrapper-prevprice-price">${{ $room['price'] }}</span>
                                <span class="roomoffer__imgwrapper-prevprice-night">/Night</span>
                            </div>
                            <div class="roomoffer__imgwrapper-newprice">
                                <span class="roomoffer__imgwrapper-newprice-price">${{ $room['discountedPrice'] }}</span>
                                <span class="roomoffer__imgwrapper-newprice-night">/Night</span>
                            </div>
                        </div>
                        <div class="roomoffer__contentwrapper">
                            <div class="roomoffer__upperrowcontent">
                                <h6 class="roomoffer__pretitle">Room {{ $room['number'] }}</h6>
                                <h2 class="roomoffer__title">{{ $room['type'] }}</h2>
                            </div>
                            <div class="roomoffer__belowrowcontent">
                                <p class="roomoffer__content">{{ $room['description'] }}</p>
                                <div class="roomoffer__facilities">
                                    <div class="roomoffer__facility">
                                        <img class="roomoffer__facility-icon" src="/assets/OffersPage/airconditioner.svg" alt="Air conditioner">
                                        <span class="roomoffer__facility-desc">Air conditioner</span>
                                    </div>
                                    <div class="roomoffer__facility">
                                        <img class="roomoffer__facility-icon" src="/assets/OffersPage/restaurant.svg" alt="Breakfast">
                                        <span class="roomoffer__facility-desc">Breakfast</span>
                                    </div>
                                    <div class="roomoffer__facility">
                                        <img class="roomoffer__facility-icon" src="/assets/OffersPage/cleaning.svg" alt="Cleaning">
                                        <span class="roomoffer__facility-desc">Cleaning</span>
                                    </div>
                                    <div class="roomoffer__facility">
                                        <img class="roomoffer__facility-icon" src="/assets/OffersPage/grocery.svg" alt="Grocery">
                                        <span class="roomoffer__facility-desc">Grocery</span>
                                    </div>
                                    <div class="roomoffer__facility">
                                        <img class="roomoffer__facility-icon" src="/assets/OffersPage/shop.svg" alt="Shop near">
                                        <span class="roomoffer__facility-desc">Shop near</span>
                                    </div>
                                    <div class="roomoffer__facility">
                                        <img class="roomoffer__facility-icon" src="/assets/OffersPage/wifi.svg" alt="High speed WiFi">
                                        <span class="roomoffer__facility-desc">High speed WiFi</span>
                                    </div>
                                    <div class="roomoffer__facility">
                                        <img class="roomoffer__facility-icon" src="/assets/OffersPage/kitchen.svg" alt="Kitchen">
                                        <span class="roomoffer__facility-desc">Kitchen</span>
                                    </div>
                                    <div class="roomoffer__facility">
                                        <img class="roomoffer__facility-icon" src="/assets/OffersPage/shower.svg" alt="Shower">
                                        <span class="roomoffer__facility-desc">Shower</span>
                                    </div>
                                    <div class="roomoffer__facility">
                                        <img class="roomoffer__facility-icon" src="/assets/OffersPage/bed.svg" alt="Single bed">
                                        <span class="roomoffer__facility-desc">Single bed</span>
                                    </div>
                                    <div class="roomoffer__facility">
                                        <img class="roomoffer__facility-icon" src="/assets/OffersPage/towel.svg" alt="Towels">
                                        <span class="roomoffer__facility-desc">Towels</span>
                                    </div>
                                </div>
                            </div>
                            <a href="roomdetails?id={{ $room['id'] }}" class="roomoffer__btn">BOOK NOW</a>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endforeach
            </div>
            <div class="swiper-pagination roomoffer__swiper-pagination"></div>
        </div>
    </div>
</section>
<section class="popularlist">
    <div class="popularlist__inner">
        <h6 class="popularlist__pretitle">POPULAR LIST</h6>
        <h2 class="popularlist__title">Popular Rooms</h2>
        <div class="swiper popularlist__swiper" id="popularlist__swiper">
            <div class="swiper-wrapper popularlist__swiperwrapper">
                @foreach($rooms as $room)
                <div class="swiper-slide popularlist__cardslide">
                    <div class="popularlist__card">
                        <div class="popularlist__roomwrapper">
                            <img class="popularlist__photo" src="{{ $room['photo'] }}" alt="Hotel Room">
                            <div class="popularlist__icons">
                                <img src="/assets/Rooms__desc Icons/icon 1.svg" alt="Icon 1" class="">
                                <img src="/assets/Rooms__desc Icons/icon 2.svg" alt="Icon 2" class="">
                                <img src="/assets/Rooms__desc Icons/icon 3.svg" alt="Icon 3" class="">
                                <img src="/assets/Rooms__desc Icons/icon 4.svg" alt="Icon 4" class="">
                                <img src="/assets/Rooms__desc Icons/icon 5.svg" alt="Icon 5" class="">
                                <img src="/assets/Rooms__desc Icons/icon 6.svg" alt="Icon 6" class="">
                                <img src="/assets/Rooms__desc Icons/icon 7.svg" alt="Icon 7" class="">
                            </div>
                            <div class="popularlist__desc">
                                <h3 class="popularlist__room-title">{{ $room['type'] }}</h3>
                                <p class="popularlist__content">{{ $room['description'] }}</p>
                                <span class="popularlist__price">${{ $room['discountedPrice'] }}/Night</span>
                                <a href="roomdetails?id={{ $room['id'] }}" class="popularlist__booknow">Book Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="swiper-button-next" id="popularlist-nextslide"></div>
            <div class="swiper-button-prev" id="popularlist-prevslide"></div>
        </div>
    </div>
</section>
@endsection
@section('scripts')
<script src="/scripts/Offers.js"></script>
@endsection