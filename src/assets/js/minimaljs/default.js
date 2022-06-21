/**
 * Scrollbar Width Test
 * Adds `layout-scrollbar-obtrusive` class to body
 * if scrollbars use up screen real estate.
 **/
var parent = document.createElement("div");
parent.setAttribute("style", "width:30px;height:30px;");
parent.classList.add('scrollbar-test');

var child = document.createElement("div");
child.setAttribute("style", "width:100%;height:40px");
parent.appendChild(child);
document.body.appendChild(parent);

/**
 *  Measure the child element, if it is not
 *  30px wide the scrollbars are obtrusive.
 **/
var scrollbarWidth = 30 - parent.firstChild.clientWidth;
if (scrollbarWidth) {
    document.body.classList.add("layout-scrollbar-obtrusive");
}

document.body.removeChild(parent);

/**
 *   General global functions
 **/
function isMobile() {
    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
        return true;
    } else {
        return false;
    }
}

function isEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
}

function setCookie(key, value) {
    var expires = new Date();
    expires.setTime(expires.getTime() + (1 * 24 * 60 * 60 * 1000));
    document.cookie = key + '=' + value + ';expires=' + expires.toUTCString() + "; path=/";
}

function getCookie(key) {
    var keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');
    return keyValue ? keyValue[2] : null;
}

/**
 *  Cookie Disclaimer
 */
if (!getCookie('cookiebanner')) {
    $('#cookie-notice').show();
    $('#accept-cookie-notice').click(function (event) {
        event.preventDefault();
        setCookie('cookiebanner', 'TRUE');
        $('#cookie-notice').hide();
    });
}

/**
 *  When page is loaded
 */
var scrollPos = 0;
$(function () {
});

// Run after the HTML document has finished loading
document.addEventListener("DOMContentLoaded", function() {
    // Get our lazy-loaded images
    let lazyImages = [].slice.call(document.querySelectorAll("img.lazy"));

    // Do this only if IntersectionObserver is supported
    if ("IntersectionObserver" in window) {
        // Create new observer object
        let lazyImageObserver = new IntersectionObserver(function(entries, observer) {
            // Loop through IntersectionObserverEntry objects
            entries.forEach(function(entry) {
                // Do these if the target intersects with the root
                if (entry.isIntersecting) {
                    let lazyImage = entry.target;
                    lazyImage.src = lazyImage.dataset.src;
                    lazyImage.srcset = lazyImage.dataset.srcset;
                    lazyImage.classList.remove("lazy");
                    lazyImageObserver.unobserve(lazyImage);
                }
            });
        });

        // Loop through and observe each image
        lazyImages.forEach(function(lazyImage) {
            lazyImageObserver.observe(lazyImage);
        });
    }
});
