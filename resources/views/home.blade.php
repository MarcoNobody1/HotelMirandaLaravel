@extends('layout')
@section('title')
Hotel Miranda | Home
@endsection
@section('content')
<section class="intro">
    <div class="intro__info">
        <h6 class="intro__info-pretitle">THE ULTIMATE LUXURY EXPERIENCE</h6>
        <h1 class="intro__info-maintitle">The Perfect Base For You</h1>
        <button id="takeatour" onclick="scrollToFirstStop()" class="intro__info-takebtn">TAKE A TOUR</button>
        <button type="button" onclick="goToAboutUs()" class="intro__info-learnbtn">LEARN MORE</button>
    </div>

    <form name="dates-form" class="intro__form" id="checkavailability_form" action="/rooms" method="GET">
        <label for="arrival" class="intro__form-arrivallbl">Arrival Date</label>
        <input name="arrival" type="date" value="{{date('Y-m-d')}}" min="{{date('Y-m-d')}}" max="{{date('Y-m-d', strtotime('+1 Year'))}}" id="arrival" class="intro__form-arrivalinp">
        <label for="departure" class="intro__form-departurelbl">Departure Date</label>
        <input name="departure" type="date" value="{{date('Y-m-d', strtotime('+1 day'))}}" min="{{date('Y-m-d', strtotime('+1 day'))}}" max="{{date('Y-m-d', strtotime('+1 Year'))}}" id="departure" class="intro__form-departureinp">
        <br>
        <button name="availability-btn" type="submit" class="intro__form-btn">CHECK AVAILABILITY</button>

    </form>
</section>
<section class="about">
    <article class="about__intro">
        <h6 class="about__intro-pretitle">About Us</h6>
        <h1 class="about__intro-maintitle">Discover Our Underground.</h1>
        <p class="about__intro-content">Welcome to a narrative of passion and hospitality, where the essence of
            Hotel Miranda comes to life beneath the surface. Unearth the story behind our establishment, a journey
            that transcends mere accommodation. Delve into the depths of our commitment to exceptional service, the
            rich history that shaped us, and the unparalleled experiences that await your arrival. Join us in
            exploring the heartbeat of Hotel Miranda: a destination where every detail is meticulously crafted to
            ensure an unforgettable stay.</p>
        <button type="button" onclick="goToOffers()" class="about__intro-bookbtn">BOOK NOW</button>
    </article>
    <article class="about__cards">
        <div class="about__cards-cardone">
            <img src="/assets/AboutUs-Card-one-img.jpg" alt="Team of junior programmers" class="about__cards-cardone-img">
            <div class="about__cards-cardone-skill">
                <img src="/assets/AboutUs-Icon-One.svg" alt="" class="about__cards-cardone-skill-icon">
                <h4 class="about__cards-cardone-skill-title">Strong Team</h4>
                <p class="about__cards-cardone-skill-text"> Our dedicated professionals ensure a seamless blend of
                    excellence and hospitality, shaping your stay with unparalleled service.</p>
            </div>

        </div>
        <div class="about__cards-cardtwo">
            <img src="/assets/AboutUs-Card-two-img.jpg" alt="Team of junior programmers" class="about__cards-cardtwo-img">
            <div class="about__cards-cardtwo-skill">
                <img src="/assets/AboutUs-Icon-Two.svg" alt="" class="about__cards-cardtwo-skill-icon">
                <h4 class="about__cards-cardtwo-skill-title">Luxury Room</h4>
                <p class="about__cards-cardtwo-skill-text">Elevate your stay with opulent comfort and exquisite
                    design, where every moment is a celebration of indulgence.</p>
            </div>
        </div>
    </article>
</section>
<section class="rooms">
    <h6 class="rooms__pretitle">ROOMS</h6>
    <h1 class="rooms__title">Hand Picked Rooms</h1>
    <div class="rooms__icons">
        <img src="/assets/Rooms__desc Icons/icon 1.svg" alt="" class="">
        <img src="/assets/Rooms__desc Icons/icon 2.svg" alt="" class="">
        <img src="/assets/Rooms__desc Icons/icon 3.svg" alt="" class="">
        <img src="/assets/Rooms__desc Icons/icon 4.svg" alt="" class="">
        <img src="/assets/Rooms__desc Icons/icon 5.svg" alt="" class="">
        <img src="/assets/Rooms__desc Icons/icon 6.svg" alt="" class="">
        <img src="/assets/Rooms__desc Icons/icon 7.svg" alt="" class="">
    </div>
    <div class="rooms__swiper">
        <div class="swiper roomswiper">
            <div class="swiper-wrapper">
                @foreach($rooms as $room)
                <div alt="Hotel Room nº1" src="/assets/Rooms_swiper/room 1.jpg" class="swiper-slide sliderooms">
                    <img alt="Hotel Room nº1" src="{{ $room['photo'] }}">
                    <div class="rooms__desc">
                        <h3 class="rooms__desc-title">{{ $room['type'] }}</h3>
                        <p class="rooms__desc-content">{{ $room['description'] }}</p>
                        <span class="rooms__desc-price">${{ $room['discountedPrice'] }}</span>
                        <span class="rooms__desc-night">/Night</span>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>

</section>
<section class="introvideo" id="firststop">
    <div class="introvideo__innercontent">
        <div class="introvideo__layout">
            <h6 class="introvideo__pretitle">INTRO VIDEO</h6>
            <h1 class="introvideo__title">Meet With Our Luxury Place.</h1>
            <p class="introvideo__content">Discover the allure of Hotel Miranda, where luxury meets tranquility.
                Immerse yourself in the enchanting surroundings that define our exquisite establishment. As you
                embark on a visual journey through the captivating video showcasing the scenic beauty surrounding
                the hotel, let the allure of our premium accommodations and breathtaking locale unfold. Welcome to a
                world where sophistication and serenity harmonize seamlessly: a haven awaiting your presence at
                Hotel Miranda.</p>
            <iframe class="introvideo__video" width="335" height="270" src="https://www.youtube.com/embed/Bu3Doe45lcU?controls=0&start=25&end=75&autoplay=0&" title="YouTube video player" frameborder="0" allowfullscreen></iframe>
            <button type="button" onclick="goToOffers()" class="introvideo__button">BOOK NOW</button>
        </div>
    </div>
</section>
<section class="facilities">
    <div class="facilities__inner">
        <h6 class="facilities__pretitle">FACILITIES</h6>
        <h1 class="facilities__title">Core Features</h1>
        <div class="swiper facilities__swiper">
            <div class="swiper-wrapper wrapperfacilities">
                <div class="swiper-slide facilitiescard">
                    <div class="facilities__swiper-card cardone">
                        <img src="/assets/Facilities__swiper/card 1 icon.png" alt="Core Features 1" class="facilities__swiper-card-img">
                        <h4 class="facilities__swiper-card-title">Have High Rating</h4>
                        <p class="facilities__swiper-card-content">Embrace excellence with our high-rated services,
                            where guest satisfaction is our hallmark.</p>
                    </div>
                </div>
                <div class="swiper-slide facilitiescard">
                    <div class="facilities__swiper-card cardtwo">
                        <img src="/assets/Facilities__swiper/card 2 icon.png" alt="Core Features 2" class="facilities__swiper-card-img">
                        <h4 class="facilities__swiper-card-title">Quiet Hours</h4>
                        <p class="facilities__swiper-card-content">Unwind in serenity during our designated quiet
                            hours, ensuring a peaceful retreat for all guests.</p>
                    </div>
                </div>
                <div class="swiper-slide facilitiescard">
                    <div class="facilities__swiper-card cardthree">
                        <img src="/assets/Facilities__swiper/card 3 icon.png" alt="Core Features 3" class="facilities__swiper-card-img">
                        <h4 class="facilities__swiper-card-title">Best Locations</h4>
                        <p class="facilities__swiper-card-content">Discover prime locations that complement your
                            stay, offering convenience and accessibility.</p>
                    </div>
                </div>
                <div class="swiper-slide facilitiescard">
                    <div class="facilities__swiper-card cardfour">
                        <img src="/assets/Facilities__swiper/card 4 icon.png" alt="Core Features 4" class="facilities__swiper-card-img">
                        <h4 class="facilities__swiper-card-title">Free Cancellation</h4>
                        <p class="facilities__swiper-card-content">Flexibility at its finest: enjoy the freedom of
                            free cancellation for a worry-free reservation experience.</p>
                    </div>
                </div>
                <div class="swiper-slide facilitiescard">
                    <div class="facilities__swiper-card cardfive">
                        <img src="/assets/Facilities__swiper/card 5 icon.png" alt="Core Features 5" class="facilities__swiper-card-img">
                        <h4 class="facilities__swiper-card-title">Payment Options</h4>
                        <p class="facilities__swiper-card-content">Seamless transactions await with our diverse
                            payment options, providing convenience tailored to you.</p>
                    </div>
                </div>
                <div class="swiper-slide facilitiescard">
                    <div class="facilities__swiper-card cardsix">
                        <img src="/assets/Facilities__swiper/card 6 icon.png" alt="Core Features 6" class="facilities__swiper-card-img">
                        <h4 class="facilities__swiper-card-title">Special Offers</h4>
                        <p class="facilities__swiper-card-content">Experience exclusivity with our special offers,
                            designed to elevate your stay and create lasting memories.</p>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>
<section class="menu">
    <div class="menu__donutwrapper">
        <img src="/assets/Menu__IndexSection/donutIcon.png" alt="A flying donut" class="menu__donut">
    </div>
    <div class="menu__inner">
        <h6 class="menu__pretitle">MENU</h6>
        <h1 class="menu__title">Our Foods Menu</h1>
        <div class="swiper menu__swiper" id="menu__swiper">
            <div class="swiper-wrapper menu__swiper-wrapper">
                <div class="swiper-slide menu__swiper-pageone">
                    <div class="menu__swiper-recipe">
                        <img class="menu__swiper-recipe-img" src="/assets/Menu__IndexSection/eggs&bacon.jpg" alt="Eggs & Bacon">
                        <div class="menu__swiper-recipe-textcontainer">
                            <h5 class="menu__swiper-recipe-title">Eggs &amp; Bacon</h5>
                            <p class="menu__swiper-recipe-content">Start your day right with our classic Eggs &amp;
                                Bacon, a hearty and delicious breakfast staple.</p>
                        </div>
                        <svg class="menu__swiper-recipe-arrow" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                            <g clip-path="url(#clip0_11_665)">
                                <path d="M31.6334 15.1152C31.633 15.1148 31.6327 15.1144 31.6322 15.114L25.1007 8.614C24.6114 8.12706 23.82 8.12887 23.3329 8.61825C22.8459 9.10756 22.8478 9.899 23.3371 10.386L27.7224 14.75H1.25C0.559625 14.75 0 15.3096 0 16C0 16.6904 0.559625 17.25 1.25 17.25H27.7223L23.3372 21.614C22.8479 22.101 22.846 22.8924 23.333 23.3817C23.8201 23.8712 24.6116 23.8729 25.1008 23.386L31.6323 16.886C31.6327 16.8856 31.633 16.8852 31.6334 16.8848C32.123 16.3962 32.1214 15.6022 31.6334 15.1152Z" />
                            </g>
                            <defs>
                                <clippath id="clip0_11_665">
                                    <rect width="32" height="32" fill="white" />
                                </clippath>
                            </defs>
                        </svg>
                    </div>
                    <div class="menu__swiper-recipe">
                        <img class="menu__swiper-recipe-img" src="/assets/Menu__IndexSection/tea&coffe.jpg" alt="Tea or Coffe">
                        <div class="menu__swiper-recipe-textcontainer">
                            <h5 class="menu__swiper-recipe-title">Tea or Coffee</h5>
                            <p class="menu__swiper-recipe-content">Sip and savor with our premium Tea or Coffee
                                selection, crafted to awaken your senses.</p>
                        </div>
                        <svg class="menu__swiper-recipe-arrow" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                            <g clip-path="url(#clip0_11_665)">
                                <path d="M31.6334 15.1152C31.633 15.1148 31.6327 15.1144 31.6322 15.114L25.1007 8.614C24.6114 8.12706 23.82 8.12887 23.3329 8.61825C22.8459 9.10756 22.8478 9.899 23.3371 10.386L27.7224 14.75H1.25C0.559625 14.75 0 15.3096 0 16C0 16.6904 0.559625 17.25 1.25 17.25H27.7223L23.3372 21.614C22.8479 22.101 22.846 22.8924 23.333 23.3817C23.8201 23.8712 24.6116 23.8729 25.1008 23.386L31.6323 16.886C31.6327 16.8856 31.633 16.8852 31.6334 16.8848C32.123 16.3962 32.1214 15.6022 31.6334 15.1152Z" />
                            </g>
                            <defs>
                                <clippath id="clip0_11_666">
                                    <rect width="32" height="32" fill="white" />
                                </clippath>
                            </defs>
                        </svg>
                    </div>
                    <div class="menu__swiper-recipe">
                        <img class="menu__swiper-recipe-img" src="/assets/Menu__IndexSection/chiaoatmeal.jpg" alt="Chia Oatmeal">
                        <div class="menu__swiper-recipe-textcontainer">
                            <h5 class="menu__swiper-recipe-title">Chia Oatmeal</h5>
                            <p class="menu__swiper-recipe-content">Nourish your morning with the wholesome goodness
                                of our Chia Oatmeal, a nutritious and satisfying choice.</p>
                        </div>
                        <svg class="menu__swiper-recipe-arrow" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                            <g clip-path="url(#clip0_11_665)">
                                <path d="M31.6334 15.1152C31.633 15.1148 31.6327 15.1144 31.6322 15.114L25.1007 8.614C24.6114 8.12706 23.82 8.12887 23.3329 8.61825C22.8459 9.10756 22.8478 9.899 23.3371 10.386L27.7224 14.75H1.25C0.559625 14.75 0 15.3096 0 16C0 16.6904 0.559625 17.25 1.25 17.25H27.7223L23.3372 21.614C22.8479 22.101 22.846 22.8924 23.333 23.3817C23.8201 23.8712 24.6116 23.8729 25.1008 23.386L31.6323 16.886C31.6327 16.8856 31.633 16.8852 31.6334 16.8848C32.123 16.3962 32.1214 15.6022 31.6334 15.1152Z" />
                            </g>
                            <defs>
                                <clippath id="clip0_11_667">
                                    <rect width="32" height="32" fill="white" />
                                </clippath>
                            </defs>
                        </svg>
                    </div>
                </div>
                <div class="swiper-slide menu__swiper-pagetwo">
                    <div class="menu__swiper-recipe">
                        <img class="menu__swiper-recipe-img" src="/assets/Menu__IndexSection/fruitparfait.jpg" alt="Fruit Parfait">
                        <div class="menu__swiper-recipe-textcontainer">
                            <h5 class="menu__swiper-recipe-title">Fruit Parfait</h5>
                            <p class="menu__swiper-recipe-content">Indulge in a burst of freshness with our Fruit
                                Parfait, a colorful and delightful blend of seasonal fruits.</p>
                        </div>
                        <svg class="menu__swiper-recipe-arrow" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                            <g clip-path="url(#clip0_11_665)">
                                <path d="M31.6334 15.1152C31.633 15.1148 31.6327 15.1144 31.6322 15.114L25.1007 8.614C24.6114 8.12706 23.82 8.12887 23.3329 8.61825C22.8459 9.10756 22.8478 9.899 23.3371 10.386L27.7224 14.75H1.25C0.559625 14.75 0 15.3096 0 16C0 16.6904 0.559625 17.25 1.25 17.25H27.7223L23.3372 21.614C22.8479 22.101 22.846 22.8924 23.333 23.3817C23.8201 23.8712 24.6116 23.8729 25.1008 23.386L31.6323 16.886C31.6327 16.8856 31.633 16.8852 31.6334 16.8848C32.123 16.3962 32.1214 15.6022 31.6334 15.1152Z" />
                            </g>
                            <defs>
                                <clippath id="clip0_11_668">
                                    <rect width="32" height="32" fill="white" />
                                </clippath>
                            </defs>
                        </svg>
                    </div>
                    <div class="menu__swiper-recipe">
                        <img class="menu__swiper-recipe-img" src="/assets/Menu__IndexSection/marmaladeselection.jpg" alt="Mermelade Selection">
                        <div class="menu__swiper-recipe-textcontainer">
                            <h5 class="menu__swiper-recipe-title">Mermelade Selection</h5>
                            <p class="menu__swiper-recipe-content">Enhance your breakfast experience with our
                                Marmalade Selection, offering a variety of flavors to elevate your palate.</p>
                        </div>
                        <svg class="menu__swiper-recipe-arrow" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                            <g clip-path="url(#clip0_11_665)">
                                <path d="M31.6334 15.1152C31.633 15.1148 31.6327 15.1144 31.6322 15.114L25.1007 8.614C24.6114 8.12706 23.82 8.12887 23.3329 8.61825C22.8459 9.10756 22.8478 9.899 23.3371 10.386L27.7224 14.75H1.25C0.559625 14.75 0 15.3096 0 16C0 16.6904 0.559625 17.25 1.25 17.25H27.7223L23.3372 21.614C22.8479 22.101 22.846 22.8924 23.333 23.3817C23.8201 23.8712 24.6116 23.8729 25.1008 23.386L31.6323 16.886C31.6327 16.8856 31.633 16.8852 31.6334 16.8848C32.123 16.3962 32.1214 15.6022 31.6334 15.1152Z" />
                            </g>
                            <defs>
                                <clippath id="clip0_11_669">
                                    <rect width="32" height="32" fill="white" />
                                </clippath>
                            </defs>
                        </svg>
                    </div>
                    <div class="menu__swiper-recipe">
                        <img class="menu__swiper-recipe-img" src="/assets/Menu__IndexSection/cheeseplate.jpg" alt="Cheese Plate">
                        <div class="menu__swiper-recipe-textcontainer">
                            <h5 class="menu__swiper-recipe-title">Cheese Plate</h5>
                            <p class="menu__swiper-recipe-content">Elevate your morning with sophistication: our
                                Cheese Plate presents a curated selection of premium cheeses for a delightful start
                                to your day.</p>
                        </div>
                        <svg class="menu__swiper-recipe-arrow" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                            <g clip-path="url(#clip0_11_665)">
                                <path d="M31.6334 15.1152C31.633 15.1148 31.6327 15.1144 31.6322 15.114L25.1007 8.614C24.6114 8.12706 23.82 8.12887 23.3329 8.61825C22.8459 9.10756 22.8478 9.899 23.3371 10.386L27.7224 14.75H1.25C0.559625 14.75 0 15.3096 0 16C0 16.6904 0.559625 17.25 1.25 17.25H27.7223L23.3372 21.614C22.8479 22.101 22.846 22.8924 23.333 23.3817C23.8201 23.8712 24.6116 23.8729 25.1008 23.386L31.6323 16.886C31.6327 16.8856 31.633 16.8852 31.6334 16.8848C32.123 16.3962 32.1214 15.6022 31.6334 15.1152Z" />
                            </g>
                            <defs>
                                <clippath id="clip0_11_670">
                                    <rect width="32" height="32" fill="white" />
                                </clippath>
                            </defs>
                        </svg>
                    </div>
                </div>
                <div class="swiper-slide menu__swiper-pagethree">
                    <div class="menu__swiper-recipe">
                        <img class="menu__swiper-recipe-img" src="/assets/Menu__IndexSection/eggs&bacon.jpg" alt="Eggs & Bacon">
                        <div class="menu__swiper-recipe-textcontainer">
                            <h5 class="menu__swiper-recipe-title">Eggs &amp; Bacon</h5>
                            <p class="menu__swiper-recipe-content">Start your day right with our classic Eggs &amp;
                                Bacon, a hearty and delicious breakfast staple.</p>
                        </div>
                        <svg class="menu__swiper-recipe-arrow" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                            <g clip-path="url(#clip0_11_665)">
                                <path d="M31.6334 15.1152C31.633 15.1148 31.6327 15.1144 31.6322 15.114L25.1007 8.614C24.6114 8.12706 23.82 8.12887 23.3329 8.61825C22.8459 9.10756 22.8478 9.899 23.3371 10.386L27.7224 14.75H1.25C0.559625 14.75 0 15.3096 0 16C0 16.6904 0.559625 17.25 1.25 17.25H27.7223L23.3372 21.614C22.8479 22.101 22.846 22.8924 23.333 23.3817C23.8201 23.8712 24.6116 23.8729 25.1008 23.386L31.6323 16.886C31.6327 16.8856 31.633 16.8852 31.6334 16.8848C32.123 16.3962 32.1214 15.6022 31.6334 15.1152Z" />
                            </g>
                            <defs>
                                <clippath id="clip0_11_671">
                                    <rect width="32" height="32" fill="white" />
                                </clippath>
                            </defs>
                        </svg>

                    </div>
                    <div class="menu__swiper-recipe">
                        <img class="menu__swiper-recipe-img" src="/assets/Menu__IndexSection/tea&coffe.jpg" alt="Tea or Coffe">
                        <div class="menu__swiper-recipe-textcontainer">
                            <h5 class="menu__swiper-recipe-title">Tea or Coffee</h5>
                            <p class="menu__swiper-recipe-content">Sip and savor with our premium Tea or Coffee
                                selection, crafted to awaken your senses.</p>
                        </div>
                        <svg class="menu__swiper-recipe-arrow" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                            <g clip-path="url(#clip0_11_665)">
                                <path d="M31.6334 15.1152C31.633 15.1148 31.6327 15.1144 31.6322 15.114L25.1007 8.614C24.6114 8.12706 23.82 8.12887 23.3329 8.61825C22.8459 9.10756 22.8478 9.899 23.3371 10.386L27.7224 14.75H1.25C0.559625 14.75 0 15.3096 0 16C0 16.6904 0.559625 17.25 1.25 17.25H27.7223L23.3372 21.614C22.8479 22.101 22.846 22.8924 23.333 23.3817C23.8201 23.8712 24.6116 23.8729 25.1008 23.386L31.6323 16.886C31.6327 16.8856 31.633 16.8852 31.6334 16.8848C32.123 16.3962 32.1214 15.6022 31.6334 15.1152Z" />
                            </g>
                            <defs>
                                <clippath id="clip0_11_672">
                                    <rect width="32" height="32" fill="white" />
                                </clippath>
                            </defs>
                        </svg>
                    </div>
                    <div class="menu__swiper-recipe">
                        <img class="menu__swiper-recipe-img" src="/assets/Menu__IndexSection/chiaoatmeal.jpg" alt="Chia Oatmeal">
                        <div class="menu__swiper-recipe-textcontainer">
                            <h5 class="menu__swiper-recipe-title">Chia Oatmeal</h5>
                            <p class="menu__swiper-recipe-content">Nourish your morning with the wholesome goodness
                                of our Chia Oatmeal, a nutritious and satisfying choice.</p>
                        </div>
                        <svg class="menu__swiper-recipe-arrow" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                            <g clip-path="url(#clip0_11_665)">
                                <path d="M31.6334 15.1152C31.633 15.1148 31.6327 15.1144 31.6322 15.114L25.1007 8.614C24.6114 8.12706 23.82 8.12887 23.3329 8.61825C22.8459 9.10756 22.8478 9.899 23.3371 10.386L27.7224 14.75H1.25C0.559625 14.75 0 15.3096 0 16C0 16.6904 0.559625 17.25 1.25 17.25H27.7223L23.3372 21.614C22.8479 22.101 22.846 22.8924 23.333 23.3817C23.8201 23.8712 24.6116 23.8729 25.1008 23.386L31.6323 16.886C31.6327 16.8856 31.633 16.8852 31.6334 16.8848C32.123 16.3962 32.1214 15.6022 31.6334 15.1152Z" />
                            </g>
                            <defs>
                                <clippath id="clip0_11_673">
                                    <rect width="32" height="32" fill="white" />
                                </clippath>
                            </defs>
                        </svg>
                    </div>
                </div>
                <div class="swiper-slide menu__swiper-pagefour">
                    <div class="menu__swiper-recipe">
                        <img class="menu__swiper-recipe-img" src="/assets/Menu__IndexSection/fruitparfait.jpg" alt="Fruit Parfait">
                        <div class="menu__swiper-recipe-textcontainer">
                            <h5 class="menu__swiper-recipe-title">Fruit Parfait</h5>
                            <p class="menu__swiper-recipe-content">Indulge in a burst of freshness with our Fruit
                                Parfait, a colorful and delightful blend of seasonal fruits.</p>
                        </div>
                        <svg class="menu__swiper-recipe-arrow" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                            <g clip-path="url(#clip0_11_665)">
                                <path d="M31.6334 15.1152C31.633 15.1148 31.6327 15.1144 31.6322 15.114L25.1007 8.614C24.6114 8.12706 23.82 8.12887 23.3329 8.61825C22.8459 9.10756 22.8478 9.899 23.3371 10.386L27.7224 14.75H1.25C0.559625 14.75 0 15.3096 0 16C0 16.6904 0.559625 17.25 1.25 17.25H27.7223L23.3372 21.614C22.8479 22.101 22.846 22.8924 23.333 23.3817C23.8201 23.8712 24.6116 23.8729 25.1008 23.386L31.6323 16.886C31.6327 16.8856 31.633 16.8852 31.6334 16.8848C32.123 16.3962 32.1214 15.6022 31.6334 15.1152Z" />
                            </g>
                            <defs>
                                <clippath id="clip0_11_674">
                                    <rect width="32" height="32" fill="white" />
                                </clippath>
                            </defs>
                        </svg>
                    </div>
                    <div class="menu__swiper-recipe">
                        <img class="menu__swiper-recipe-img" src="/assets/Menu__IndexSection/marmaladeselection.jpg" alt="Mermelade Selection">
                        <div class="menu__swiper-recipe-textcontainer">
                            <h5 class="menu__swiper-recipe-title">Mermelade Selection</h5>
                            <p class="menu__swiper-recipe-content">Enhance your breakfast experience with our
                                Marmalade Selection, offering a variety of flavors to elevate your palate.</p>
                        </div>
                        <svg class="menu__swiper-recipe-arrow" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                            <g clip-path="url(#clip0_11_665)">
                                <path d="M31.6334 15.1152C31.633 15.1148 31.6327 15.1144 31.6322 15.114L25.1007 8.614C24.6114 8.12706 23.82 8.12887 23.3329 8.61825C22.8459 9.10756 22.8478 9.899 23.3371 10.386L27.7224 14.75H1.25C0.559625 14.75 0 15.3096 0 16C0 16.6904 0.559625 17.25 1.25 17.25H27.7223L23.3372 21.614C22.8479 22.101 22.846 22.8924 23.333 23.3817C23.8201 23.8712 24.6116 23.8729 25.1008 23.386L31.6323 16.886C31.6327 16.8856 31.633 16.8852 31.6334 16.8848C32.123 16.3962 32.1214 15.6022 31.6334 15.1152Z" />
                            </g>
                            <defs>
                                <clippath id="clip0_11_675">
                                    <rect width="32" height="32" fill="white" />
                                </clippath>
                            </defs>
                        </svg>
                    </div>
                    <div class="menu__swiper-recipe">
                        <img class="menu__swiper-recipe-img" src="/assets/Menu__IndexSection/cheeseplate.jpg" alt="Cheese Plate">
                        <div class="menu__swiper-recipe-textcontainer">
                            <h5 class="menu__swiper-recipe-title">Cheese Plate</h5>
                            <p class="menu__swiper-recipe-content">Elevate your morning with sophistication: our
                                Cheese Plate presents a curated selection of premium cheeses for a delightful start
                                to your day.</p>
                        </div>
                        <svg class="menu__swiper-recipe-arrow" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                            <g clip-path="url(#clip0_11_665)">
                                <path d="M31.6334 15.1152C31.633 15.1148 31.6327 15.1144 31.6322 15.114L25.1007 8.614C24.6114 8.12706 23.82 8.12887 23.3329 8.61825C22.8459 9.10756 22.8478 9.899 23.3371 10.386L27.7224 14.75H1.25C0.559625 14.75 0 15.3096 0 16C0 16.6904 0.559625 17.25 1.25 17.25H27.7223L23.3372 21.614C22.8479 22.101 22.846 22.8924 23.333 23.3817C23.8201 23.8712 24.6116 23.8729 25.1008 23.386L31.6323 16.886C31.6327 16.8856 31.633 16.8852 31.6334 16.8848C32.123 16.3962 32.1214 15.6022 31.6334 15.1152Z" />
                            </g>
                            <defs>
                                <clippath>
                                    <rect width="32" height="32" fill="white" />
                                </clippath>
                            </defs>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="swiper-button-next" id="menunextslide"></div>
            <div class="swiper-button-prev" id="menuprevslide"></div>
        </div>

        <div class="swiper menu__photoswiper" id="menuphotoswiper">
            <div class="swiper-wrapper menu__photowrapper">
                <div class="swiper-slide menu__photoswiper-photo">
                    <img src="https://dashboardgeneralassets.s3.eu-west-1.amazonaws.com/Fotos+Dashboard/room6.jpeg" alt="Restaurant Photo 1">
                </div>
                <div class="swiper-slide menu__photoswiper-photo">
                    <img src="https://dashboardgeneralassets.s3.eu-west-1.amazonaws.com/Fotos+Dashboard/room7.jpeg" alt="Restaurant Photo 2">
                </div>
                <div class="swiper-slide menu__photoswiper-photo">
                    <img src="https://dashboardgeneralassets.s3.eu-west-1.amazonaws.com/Fotos+Dashboard/room8.jpeg" alt="Restaurant Photo 3">
                </div>
            </div>
            <div class="swiper-pagination" id="menuphotopagination"></div>
        </div>
    </div>
</section>
<section class="outro">
    <div class="outro__inner">
        <div class="outro__skill">
            <img src="/assets/Outro__IndexSection/flying rocket.png" alt="A flying rocket" class="outro__skill-icon">
            <div class="outro__skill-title">
                <h2 class="outro__skill-title-data">84k</h2>
                <span class="outro__skill-title-plus">+</span>
            </div>
            <p class="outro__skill-content">Projects are Completed</p>
        </div>
        <div class="outro__skill">
            <img src="/assets/Outro__IndexSection/Group of people.png" alt="Group of people" class="outro__skill-icon">
            <div class="outro__skill-title">
                <h2 class="outro__skill-title-data">10M</h2>
                <span class="outro__skill-title-plus">+</span>
            </div>
            <p class="outro__skill-content">Active Backers Around World</p>
        </div>
        <div class="outro__skill">
            <img src="/assets/Outro__IndexSection/Stocks.png" alt="A flying rocket" class="outro__skill-icon">
            <div class="outro__skill-title">
                <h2 class="outro__skill-title-data">02k</h2>
                <span class="outro__skill-title-plus">+</span>
            </div>
            <p class="outro__skill-content">Categories Served</p>
        </div>
        <div class="outro__skill">
            <img src="/assets/Outro__IndexSection/Idea.png" alt="A flying rocket" class="outro__skill-icon">
            <div class="outro__skill-title">
                <h2 class="outro__skill-title-data">100M</h2>
                <span class="outro__skill-title-plus">+</span>
            </div>
            <p class="outro__skill-content">Idea Raised Funds</p>
        </div>
    </div>
</section>
@endsection
@section('scripts')
<script src="/scripts/Homepage.js"></script>
@endsection