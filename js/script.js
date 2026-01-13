// BANNER DE SLIDE
var classBanner = document.querySelectorAll('.swiper-banner').length;
if (classBanner) {
    var slideBanner = new Swiper(".swiper-banner", {
        slidesPerView: 1,
        loop: true,
        autoplay: {
            delay: 5000,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
}
// BANNER DE SLIDE
var classBrochure = document.querySelectorAll('.swiper-brochure').length;
if (classBrochure) {
    var slideBrochure = new Swiper(".swiper-brochure", {
        loop: false,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
			el: '.swiper-pagination',
			type: 'fraction',
		},
    });
}

// BANNER DE OFERTAS
var classOffersBanners = document.querySelectorAll('.swiper-offers').length;
if (classOffersBanners) {
    var slideOffers = new Swiper(".swiper-offers", {
        slidesPerView: 4,
        spaceBetween: 30,
        loop: false,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
			el: '.swiper-pagination',
			type: 'fraction',
		},
        breakpoints: {
            320: { slidesPerView: 1, spaceBetween: 15 }, 
            480: { slidesPerView: 2, spaceBetween: 15 },
            640: { slidesPerView: 3, spaceBetween: 20 },
            768: { slidesPerView: 4, spaceBetween: 30 }
        }
    });
}

// VERIFICAÇÃO DE COOKIES
var validadeContinue = document.getElementById('validateContinue');
if (validadeContinue) {
    validadeContinue.addEventListener('click', function () {
        const form = new FormData();
        form.append('action', 'cookie');
        form.append('make', 'save');
        const params = new URLSearchParams(form);

        fetch(search_object.location, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
                'Cache-Control': 'no-cache',
            },
            body: params
        }).then(function (responseCookie) {
            responseCookie.json().then((responseDataCookie) => {
                console.log(responseDataCookie.status);
                if (responseDataCookie.status == true) {
                    document.getElementById('cookie-alert').remove();
                }
            });
        }).catch();
    });
}

// FUNCIONAMENTO DO MENU
function toggleMenu () {
    document.querySelector('.hamburger').classList.toggle('is-active');
    document.getElementById('header-bar-mobile').classList.toggle('-right-full');
    document.getElementById('header-bar-mobile').classList.toggle('right-0');
}
var buttonMenu = document.getElementById("mobile-menu-hamburger");
if (buttonMenu) {
    buttonMenu.addEventListener('click', function () {
        toggleMenu();
    });
}
var buttonMenu = document.getElementById("header-bar-mobile-close");
if (buttonMenu) {
    buttonMenu.addEventListener('click', function () {
        toggleMenu();
    });
}


const menuItems = document.querySelectorAll('.button-offer');

function getScrollTopByHref(element) {
    const id = element.getAttribute('href');
    return document.querySelector(id).offsetTop;
}

function scrollToPosition(to) {
    smoothScrollTo(0, to);
}

function scrollToIdOnClick(event) {
    event.preventDefault();
    const to = getScrollTopByHref(event.currentTarget) - 80;
    scrollToPosition(to);
}

menuItems.forEach(item => {
    item.addEventListener('click', scrollToIdOnClick);
});

function smoothScrollTo(endX, endY, duration) {
    const startX = window.scrollX || window.pageXOffset;
    const startY = window.scrollY || window.pageYOffset;
    const distanceX = endX - startX;
    const distanceY = endY - startY;
    const startTime = new Date().getTime();

    duration = typeof duration !== 'undefined' ? duration : 400;
    
    const easeInOutQuart = (time, from, distance, duration) => {
        if ((time /= duration / 2) < 1) return distance / 2 * time * time * time * time + from;
        return -distance / 2 * ((time -= 2) * time * time * time - 2) + from;
    };

    const timer = setInterval(() => {
        const time = new Date().getTime() - startTime;
        const newX = easeInOutQuart(time, startX, distanceX, duration);
        const newY = easeInOutQuart(time, startY, distanceY, duration);
        if (time >= duration) {
            clearInterval(timer);
        }
        window.scroll(newX, newY);
    }, 1000 / 60);
};

document.getElementById("action-email-marketing").addEventListener('click', function () {
    gtag_report_conversion('#info-cadastre');
});