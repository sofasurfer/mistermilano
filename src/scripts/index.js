// import Navigation from './navigation';
// import ScrollToTop from './scroll-to-top';

console.log('WORKS');
/**
 * app.main
 */
const main = async (err) => {
    console.log('WORKS_inner');

    if (err) {
        // handle hmr errors
        console.error(err);
    }

    // application code
    app();

    /**
     * Initialize
     *
     * @see https://webpack.js.org/api/hot-module-replacement
     */
    // domReady(main);
    import.meta.webpackHot?.accept(main);
};

/**
 * Now runs without HMR too
 */
const app = () => {
    document.addEventListener("DOMContentLoaded", function (event) {
        // new Navigation();
        // new ScrollToTop();
    });
}

app();
