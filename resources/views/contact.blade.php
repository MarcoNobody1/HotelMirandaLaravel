@extends('layout')
@section('title')
Hotel Miranda | Contact
@endsection
@section('content')
<section class="contactintro">
    <div class="contactintro__inner">
        <h6 class="contactintro__pretitle">THE ULTIMATE LUXURY</h6>
        <h1 class="contactintro__title">New Details</h1>
        <div class="contactintro__pages">
            <a class="contactintro__linkprev" href="/">Home</a>
            <span class="contactintro__linkbar">|</span>
            <span class="contactintro__linktext">Blog</span>
        </div>
    </div>
</section>
<section class="contactoptions">
    <div class="contactoptions__inner">
        <div class="contactoptions__alloptions">
            <div class="contactoptions__option1">
                <img class="contactoptions__icon" src="../assets/Footer/contact-maps.png" alt="Address">
                <div class="contactoptions__textwrapper">
                    <h4 class="contactoptions__title">Hotel Address</h4>
                    <p class="contactoptions__content">C. de la Princesa, 31, 2º, 28008 Madrid</p>
                </div>
            </div>
            <div class="contactoptions__option2">
                <img class="contactoptions__icon" src="../assets/Footer/contact-phone.png" alt="Phone">
                <div class="contactoptions__textwrapper">
                    <h4 class="contactoptions__title">Phone Number</h4>
                    <p class="contactoptions__content">+34 671 25 13 77</p>
                </div>
            </div>
            <div class="contactoptions__option3">
                <img class="contactoptions__icon" src="../assets/Footer/contact email.png" alt="Email">
                <div class="contactoptions__textwrapper">
                    <h4 class="contactoptions__title">Email</h4>
                    <p class="contactoptions__content">marcocamaradiaz@gmail.com</p>
                </div>
            </div>
        </div>
        <img class="contactoptions__img" src="../assets/ContactPage/screen.jpg" alt="Man on the Mountain">
    </div>
</section>
<section class="contactform">
    <div class="contactform__inner">
        <form class="contactform__form" method="POST" id="contact_form">
            <div class="contactform__firstrow">
                <div class="contactform__inputwrapper --space">
                    <input autocomplete="true" placeholder="Your full name" type="text" name="name" id="name">
                </div>
                <div class="contactform__inputwrapper">
                    <input autocomplete="true" placeholder="Enter email address" type="email" name="email" id="email">
                </div>
            </div>
            <div class="contactform__secondrow">
                <div class="contactform__inputwrapper  --space">
                    <input autocomplete="true" placeholder="Add your phone number" type="tel" name="phone" id="phone">
                </div>
                <div class="contactform__inputwrapper">
                    <input placeholder="Enter subject" type="text" name="subject" id="subject">
                </div>
            </div>
            <div class="contactform__inputwrapper--textarea">
                <textarea placeholder="Tell us what you need" name="message" id="message" cols="30" rows="10"></textarea>
            </div>
            <button class="contactform__btn" type="submit">GET FREE QUOTE</button>
        </form>
    </div>
</section>
@endsection
@section('scripts')
<script src="/scripts/Contact.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@endsection