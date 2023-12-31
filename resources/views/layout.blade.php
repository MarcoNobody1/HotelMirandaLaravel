<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/styles/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;600;700&family=Old+Standard+TT&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
</head>

<body>
    <div class="header-bg-rectangle">We Make Your Feel Comfortable</div>
    <header class="header">
        <img id="menuBurguer" class="header__menuiconburguer" src="/assets/MenuBurgerIcon.svg" alt="Menu Burger Icon">
        <img id="menuCross" class="header__menuiconcross header__menuiconcross--closed" src="/assets/MenuCrossIcon.svg" alt="Menu Cross Icon">
        <div class="header__logo">
            <a href="/"> <img class="header__logo-img" src="/assets/Logo.png" alt="Logo"></a>
            <a href="/">
                <div class="header__logo-name focus">
                    <span class="header__logo-name-hotel">HOTEL</span>
                    <br>
                    <span class="header__logo-name-miranda">MIRANDA</span>
                </div>
            </a>
        </div>
        <nav id="nav" class="header__menucontent header__menucontent--hidden">
            <a href="/aboutus" class="header__menucontent-about">About Us</a>
            <a href="/rooms" class="header__menucontent-rooms">Rooms</a>
            <a href="/offers" class="header__menucontent-offers">Offers</a>
            <a href="/contact" class="header__menucontent-contact">Contact</a>
        </nav>
        <div class="header__icons">
            <a href="/orders">
                <img class="header__icons-profile" src="/assets/HeaderProfileIcon.svg" alt="Profile Icon">
            </a>
        </div>
    </header>
    <main>
        @yield('content')
    </main>
    <footer class="footer">
        <div class="footer__inner">
            <div class="footer__goodbye">
                <div class="footer__logo pulsating">
                    <a href="/"> <img class="footer__logo-img" src="/assets/Footer/footer logo.png" alt="Logo"></a>
                    <div class="footer__logo-name">
                        <span class="footer__logo-name-hotel">HOTEL</span>
                        <br>
                        <span class="footer__logo-name-miranda">MIRANDA</span>
                    </div>
                </div>
                <p class="footer__goodbye-content">Thank you for choosing Hotel Miranda. Immerse yourself in
                    unparalleled luxury, exceptional service, and unforgettable moments. Stay connected for updates and
                    special offers. Your journey with us continues. Safe travels!</p>
                <div class="footer__goodbye-icongroup">
                    <a href="https://www.facebook.com/?locale=es_ES" target="_blank" rel="noopener noreferrer"><img src="/assets/Footer/facebook logo.svg" alt="Facebook" class="footer__goobdbye-icon"></a>
                    <a href="https://twitter.com/home?lang=es" target="_blank" rel="noopener noreferrer"><img src="/assets/Footer/twitter logo.svg" alt="Twitter" class="footer__goobdbye-icon"></a>
                    <a href="https://www.behance.net/" target="_blank" rel="noopener noreferrer"><img src="/assets/Footer/behance logo.svg" alt="Behance" class="footer__goobdbye-icon"></a>
                    <a href="https://www.linkedin.com/feed/" target="_blank" rel="noopener noreferrer"><img src="/assets/Footer/linkedin logo.svg" alt="LinkedIn" class="footer__goobdbye-icon"></a>
                    <a href="https://www.youtube.com/" target="_blank" rel="noopener noreferrer"><img src="/assets/Footer/youtube logo.svg" alt="Youtube" class="footer__goobdbye-icon"></a>
                </div>
            </div>
            <div class="footer__services">
                <h5 class="footer__services-title">Services.</h5>
                <div class="footer__services-content">
                    <ul class="footer__services-content-list">
                        <li class="footer__services-listelement">Restaurant &amp; Bar</li>
                        <li class="footer__services-listelement">Swimming Pool</li>
                        <li class="footer__services-listelement">Wellness &amp; Spa</li>
                        <li class="footer__services-listelement">Restaurant</li>
                        <li class="footer__services-listelement">Conference Room</li>
                        <li class="footer__services-listelement">Coctail Party House</li>
                        <li class="footer__services-listelement">Gaming Zone</li>
                        <li class="footer__services-listelement">Marrige Party</li>
                        <li class="footer__services-listelement">Party Planning</li>
                        <li class="footer__services-listelement">Tour Consultancy</li>
                    </ul>
                </div>
            </div>
            <div class="footer__contactus">
                <h5 class="footer__contactus-title">Contact Us.</h5>
                <a class="footer__link" title="phone" href="tel:+98787676576577">
                    <div class="footer__contactus-group">
                        <img class="footer__contactus-group-icon" src="/assets/Footer/contact-phone.png" alt="Phone Ringing">
                        <div class="footer__contactus-group-textgroup">
                            <p class="footer__contactus-group-title">Phone Number</p>
                            <p class="footer__contactus-group-content">+987 876 765 76 577</p>
                        </div>
                    </div>
                </a>
                <a class="footer__link" title="email" href="mailto:example@mirandahotel.com">
                    <div class="footer__contactus-group">
                        <img class="footer__contactus-group-icon" src="/assets/Footer/contact email.png" alt="E-mail">
                        <div class="footer__contactus-group-textgroup">
                            <p class="footer__contactus-group-title">E-mail</p>
                            <p class="footer__contactus-group-content">example@mirandahotel.com</p>
                        </div>
                    </div>
                </a>
                <a class="footer__link" rel="noopener noreferrer" target="_blank" title="maps" href="https://maps.app.goo.gl/3PCGJd1gSEht7YACA">
                    <div class="footer__contactus-group">
                        <img class="footer__contactus-group-icon" src="/assets/Footer/contact-maps.png" alt="Google Maps Point">
                        <div class="footer__contactus-group-textgroup">
                            <p class="footer__contactus-group-title">Address</p>
                            <p class="footer__contactus-group-content">Oxygen St. 25th Avenue, California</p>
                        </div>
                    </div>
                </a>
            </div>

        </div>
        <div class="footer__endbar">
            <div class="footer__wrapper">
                <a href="/" class="footer__endbar-copy">Copyright By@Example - 2020</a>
                <a href="/" class="footer__endbar-terms">Terms of use | Privacy Environmental Policy</a>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    @yield('scripts')
</body>

</html>