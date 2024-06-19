/**
 * Import a file with the correct ES6 Module way:
 * https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Statements/import
 * import defaultExport from "module-name";
 *
 * Then use it like this:
 * new defaultExport();
 */

import Cookie from './modules/Cookie.mjs';
import LazyLoadImages from './modules/LazyLoadImages.mjs';

/**
 * app.main
 */
const main = async (err) => {

    if (err) {
        // handle HMR errors
        console.error(err);
    }

    // application code
    app();

    /**
     * Initialize
     *
     * @see https://webpack.js.org/api/hot-module-replacement
     */
    import.meta.webpackHot?.accept(main);
};

/**
 * Add custom code inside this function
 */
const app = () => {
    // Add your imported code here, for example: new defaultExport();
    new Cookie(true);
    new LazyLoadImages();

    // Action for Language nav
    var contentLinks = document.querySelectorAll(".c-link-block a");
    for (var i = 0; i < contentLinks.length; i++) {
        var link = contentLinks[i].getAttribute("href");
        contentLinks[i].addEventListener("click", (event) => {
            const lang = event.target.href.split("#");
            if(lang[1] == 'fr'){
                document.getElementById('c-l-de').classList.remove('active');
                document.getElementById('c-l-fr').classList.add('active');
                document.getElementById('c-l-en').classList.remove('active');

                document.getElementById('c-text-de').style.display = "none";
                document.getElementById('c-text-fr').style.display = "block";
                document.getElementById('c-text-en').style.display = "none";
            }else if(lang[1] == 'en'){
                document.getElementById('c-l-de').classList.remove('active');
                document.getElementById('c-l-fr').classList.remove('active');
                document.getElementById('c-l-en').classList.add('active');

                document.getElementById('c-text-de').style.display = "none";
                document.getElementById('c-text-fr').style.display = "none";
                document.getElementById('c-text-en').style.display = "block";
            }else if(lang[1] == 'de'){
                document.getElementById('c-l-de').classList.add('active');
                document.getElementById('c-l-fr').classList.remove('active');
                document.getElementById('c-l-en').classList.remove('active');

                document.getElementById('c-text-de').style.display = "block";
                document.getElementById('c-text-fr').style.display = "none";
                document.getElementById('c-text-en').style.display = "none";
            }
        });
      }    
}

document.addEventListener("DOMContentLoaded", function (event) {
    main();
});
