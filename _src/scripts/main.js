// Checks if javascript is allowed in the browser
document.body.className = document.body.className.replace("no-js", "js");

function setupIntersectionObservers() {

    const navbarFixed = document.querySelector(".navbar-fixed-top");
    const header = document.querySelector("header");

    if (!navbarFixed || !header) return;

    var margin = "-200px";
    if (header.id == "post-header") margin = "-9999px";

    let navbarOptions = { rootMargin: margin };
    const navbarObserver = new IntersectionObserver(function (entries, navbarObserver) {
        entries.forEach(entry => {
            if (!entry.isIntersecting) {
                navbarFixed.classList.add("scrolled");
            } else {
                navbarFixed.classList.remove("scrolled");
            }
        })
    }, navbarOptions);

    if (!header) {
        navbarFixed.classList.add("scrolled"); // If there is no header to scroll to, add the scrolled class permanently
    }
    navbarObserver.observe(header);

    // Animated elements
    const elements = document.querySelectorAll('.animate');

    let animateOptions = { rootMargin: "0px 0px -25%" };
    const animateObserver = new IntersectionObserver(function (entries, animateObserver) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add("in-view");
            }
        })
    }, animateOptions);

    elements.forEach(elm => {
        animateObserver.observe(elm);
    });
}

function initSwipers() {
    // Full parameter list in documentation: https://swiperjs.com/swiper-api

    // Header swipers (flex-content)
    const headerSwipers = document.querySelectorAll('.swiper-header');
    headerSwipers.forEach(function (elm) {
        let swiper = new Swiper(elm, {
            // behaviour
            autoplay: {
                delay: 3000,
                disableOnInteraction: false
            },
            loop: true,
            speed: 800,
            // slide positioning and size
            spaceBetween: 0,
            slidesPerView: 1,
            // interaction
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    });

    // Card swipers (flex-content)
    const cardSwipers = document.querySelectorAll('.card-swiper');
    cardSwipers.forEach(function (elm) {
        let swiper = new Swiper(elm, {
            // behaviour
            freeMode: true,
            autoplay: {
                delay: 1,
                disableOnInteraction: false
            },
            loop: true,
            speed: 4000,
            // slide positioning and size
            spaceBetween: 32,
            slidesPerView: 1,
            centeredSlides: false,
            // autoHeight: true,

            // Responsive breakpoints
            breakpoints: {
                480: {
                    slidesPerView: 1,
                    spaceBetween: 20
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 20
                },
                1024: {
                    slidesPerView: 2.5,
                    spaceBetween: 20
                },
                1230: {
                    slidesPerView: 3,
                    spaceBetween: 20
                },
            },
        });
    });

    // Scroller swipers (flex-content)
    const scrollerSwipers = document.querySelectorAll('.scroller-swiper');
    scrollerSwipers.forEach(function (elm) {
        let swiper = new Swiper(elm, {
            // behaviour
            freeMode: true,
            autoplay: {
                delay: 1,
                disableOnInteraction: false
            },
            loop: true,
            speed: 4000,
            // slide positioning and size
            spaceBetween: 70,
            slidesPerView: 2.5,
            centeredSlides: false,
            autoHeight: false,

            // Responsive breakpoints
            breakpoints: {
                // when window width is >= 768px
                768: {
                    slidesPerView: 3,
                    spaceBetween: 20
                },
                // when window width is >= 1024px
                1024: {
                    slidesPerView: 5,
                    spaceBetween: 30
                },
            },
        });
    });

    // Image swipers (flex-content)
    const largeSwipers = document.querySelectorAll('.image-swiper-large');
    largeSwipers.forEach(function (elm) {
        let swiper = new Swiper(elm, {
            // behaviour
            autoplay: true,
            loop: true,
            speed: 800,
            // slide positioning and size
            spaceBetween: 32,
            slidesPerView: 2,
            centeredSlides: true,
            // autoHeight: true,
            // effect
            effect: "coverflow",
            coverflowEffect: {
                rotate: 50,
                stretch: 0,
                scale: .95,
                depth: 100,
                modifier: 1,
                slideShadows: true,
            },
            // interaction
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    });

    const mediumSwipers = document.querySelectorAll('.image-swiper-medium');
    mediumSwipers.forEach(function (elm) {
        let swiper = new Swiper(elm, {
            // behaviour
            autoplay: true,
            loop: true,
            speed: 800,
            // slide positioning and size
            spaceBetween: 32,
            slidesPerView: 3,
            centeredSlides: true,
            // autoHeight: true,
            // effect
            effect: "coverflow",
            coverflowEffect: {
                rotate: 40,
                stretch: 0,
                scale: .95,
                depth: 100,
                modifier: 1,
                slideShadows: true,
            },
            // interaction
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    });

    const smallSwipers = document.querySelectorAll('.image-swiper-small');
    smallSwipers.forEach(function (elm) {
        let swiper = new Swiper(elm, {
            // behaviour
            autoplay: true,
            loop: true,
            speed: 800,
            // slide positioning and size
            spaceBetween: 16,
            slidesPerView: 5,
            centeredSlides: true,
            // autoHeight: true,
            // effect
            effect: "coverflow",
            coverflowEffect: {
                rotate: 20,
                stretch: 0,
                scale: .95,
                depth: 50,
                modifier: 1,
                slideShadows: true,
            },
            // interaction
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            // Responsive breakpoints
            breakpoints: {
                480: {
                    slidesPerView: 2,
                    spaceBetween: 20
                },
                // when window width is >= 768px
                768: {
                    slidesPerView: 3,
                    spaceBetween: 20
                },
                // when window width is >= 1024px
                1024: {
                    slidesPerView: 5,
                    spaceBetween: 30
                },
            },
        });
    });
}

window.onload = (event) => {
    setupIntersectionObservers();
    initSwipers();
    console.log('JS loaded!');
};

// ACF Google Maps JS Helper code

(function( $ ) {

/**
 * initMap
 *
 * Renders a Google Map onto the selected jQuery element
 *
 * @date    22/10/19
 * @since   5.8.6
 *
 * @param   jQuery $el The jQuery element.
 * @return  object The map instance.
 */
function initMap( $el ) {

    // Find marker elements within map.
    var $markers = $el.find('.marker');

    // Create gerenic map.
    var mapArgs = {
        zoom        : $el.data('zoom') || 16,
        mapTypeId   : google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map( $el[0], mapArgs );

    // Add markers.
    map.markers = [];
    $markers.each(function(){
        initMarker( $(this), map );
    });

    // Center map based on markers.
    centerMap( map );

    // Return map instance.
    return map;
}

/**
 * initMarker
 *
 * Creates a marker for the given jQuery element and map.
 *
 * @date    22/10/19
 * @since   5.8.6
 *
 * @param   jQuery $el The jQuery element.
 * @param   object The map instance.
 * @return  object The marker instance.
 */
function initMarker( $marker, map ) {

    // Get position from marker.
    var lat = $marker.data('lat');
    var lng = $marker.data('lng');
    var latLng = {
        lat: parseFloat( lat ),
        lng: parseFloat( lng )
    };

    // Create marker instance.
    var marker = new google.maps.Marker({
        position : latLng,
        map: map
    });

    // Append to reference for later use.
    map.markers.push( marker );

    // If marker contains HTML, add it to an infoWindow.
    if( $marker.html() ){

        // Create info window.
        var infowindow = new google.maps.InfoWindow({
            content: $marker.html()
        });

        // Show info window when marker is clicked.
        google.maps.event.addListener(marker, 'click', function() {
            infowindow.open( map, marker );
        });
    }
}

/**
 * centerMap
 *
 * Centers the map showing all markers in view.
 *
 * @date    22/10/19
 * @since   5.8.6
 *
 * @param   object The map instance.
 * @return  void
 */
function centerMap( map ) {

    // Create map boundaries from all map markers.
    var bounds = new google.maps.LatLngBounds();
    map.markers.forEach(function( marker ){
        bounds.extend({
            lat: marker.position.lat(),
            lng: marker.position.lng()
        });
    });

    // Case: Single marker.
    if( map.markers.length == 1 ){
        map.setCenter( bounds.getCenter() );

    // Case: Multiple markers.
    } else{
        map.fitBounds( bounds );
    }
}

// Render maps on page load.
$(document).ready(function(){
    $('.acf-map').each(function(){
        var map = initMap( $(this) );
    });
});

})(jQuery);