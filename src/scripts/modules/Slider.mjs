import Splide from '@splidejs/splide';

const splides = document.querySelectorAll('.splide');
// https://splidejs.com/guides/options/
const options = {};

splides.forEach((element) => {
    let singleOptions = {}

    if (element.classList.contains('splide--header')) {
        singleOptions = {
            ...options,
        }
    }

    if (element.classList.contains('splide--narrow')) {
        singleOptions = {
            ...options,
        }
    }

    const splide = new Splide(element, singleOptions);
    splide.mount();
})