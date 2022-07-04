/**
 * This file will find and replace image paths from "data-src" in the HTML to the actual path into "src".
 *
 * input:
 * <img data-src="logo.svg" />
 * result:
 * <img src="../../dist/logo.svg" />
 */
document.addEventListener('DOMContentLoaded', function (event) {
    fetch('../../dist/manifest.json')
        .then(response => response.json())
        .then(data => replaceSrcAttributes(data))

    let replaceSrcAttributes = (data) => {
        const srcNodeList = document.querySelectorAll('[data-src]');

        for (let i = 0; i < srcNodeList.length; ++i) {
            const item = srcNodeList[i];
            // data-src should be the simlified path to the image found in the manifest.json file
            const dataSrc = item.getAttribute('data-src');

            if (dataSrc === null) return;

            const manifestPath = data[dataSrc];

            if (!manifestPath) return;

            item.src = '../../dist' + manifestPath;
        }
    };
});