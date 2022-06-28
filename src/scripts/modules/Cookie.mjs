/**
 * Initially sets up the cookie banner functionality
 * and provides a way to set & get cookies
 *
 * @param {boolean} setupCookieBanner - if true (default), the cookie banner will be setup
 */
export default class Cookie {

    constructor(setupCookiebanner = true) {
        if (setupCookiebanner) {
            this.setupCookieBanner();
        }
    }

    /**
     * Adds functionality to the cookie banner.
     */
    setupCookieBanner() {
        if (!this.getCookie('cookiebanner')) {
            let cookie = document.getElementById('cookie-notice');
            let cookieAccept = document.getElementById('accept-cookie-notice');

            cookie.style.display = 'block';

            cookieAccept?.addEventListener('click', (event) => {
                event.preventDefault();
                this.setCookie('cookiebanner', 'TRUE');
                cookie.style.display = 'none';
            });
        }
    }

    /**
     * Adds a cookie to the browser.
     * @param key
     * @param value
     */
    setCookie(key, value) {
        const expires = new Date();
        expires.setTime(expires.getTime() + (24 * 60 * 60 * 1000));
        document.cookie = key + '=' + value + ';expires=' + expires.toUTCString() + "; path=/";
    }

    /**
     * Gets a cookie from the browser.
     * @param key
     * @returns {string|null}
     */
    getCookie(key) {
        const keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');
        return keyValue ? keyValue[2] : null;
    }
}