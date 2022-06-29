# Wordpress Theme: Starter

This is a starter theme for Wordpress utilizing a modern build process with webpack 5.

These technologies are used:

- [Wordpress](https://wordpress.org/)
- [Webpack](https://webpack.js.org/)
- [bud.js](https://bud.js.org/) for the compilation process
- [sass/scss](https://sass-lang.com/)
- [Javascript ES6](https://javascript.info/)
- [yarn](https://yarnpkg.com/) or [npm](https://www.npmjs.com/)
- [node (v18)](https://nodejs.org/)

# A quick word about bud.js 💮

bud.js is a javascript build framework with add-on support for Babel, React, PostCSS, Sass, Typescript, esbuild, ESLint, Prettier, and more.
In this project we use it to handle the entire build process.

The config file is located at `bud.config.mjs`. It contains Javascript, so we can do any processing with nodeJS to pass arguments. Or edit the config file to change the build process.

#### What the heck is ```.mjs```? It's the extension for "Javascript Modules" --> https://docs.fileformat.com/web/mjs/

Place further extensions for bud in ``./src/bud/``. ``./src/bud/createFontFile.mjs`` is an extension that writes all the font files into a scss file.

# Installation ⛺

[OPTIONAL] First of all, get yourself [nvm](https://github.com/nvm-sh/nvm) to switch node versions on the fly.

If you want to switch to a different node version, you can do it with the following command:

```bash
nvm use <version>
```

The minimal version of node needed is visible in ``package.json`` at ``"engines": {...}``. Most likely it is going to be v18.4.0

---

1️⃣ Install the dependencies with the following command:

| yarn             | npm             |
|------------------|-----------------|
| ``yarn install`` | ``npm install`` |

2️⃣ Run the development server:

| yarn         | npm             |
|--------------|-----------------|
| ``yarn dev`` | ``npm run dev`` |

This will start watching the files and recompile them when they change. Everything is injected via the main javascript file with browserSync.

3️⃣ Build for production:

| yarn           | npm               |
|----------------|-------------------|
| ``yarn build`` | ``npm run build`` |

---

# HTML & Styling 🎨

Go to your file ``./src/templates/...html`` and open it in a browser. For example:

``http://localhost/your_folder/wp-content/themes/wptheme.starter/src/templates/contentelements.html``

Start the development server (2️⃣).
Now add the port specified in the ``bud.config.mjs`` file (default **``:3010``** or ``:3000``), then add it to your path:

````http://localhost:3010/your_folder/wp-content/themes/wptheme.starter/src/templates/contentelements.html````

Your browser should now reload on changes.

# Hot reloading in Wordpress 🔥

Start the development server (2️⃣), then add the port to your URL and enjoy the magic.

---

# Javascript 💻

This projects requires you to use ES6 conventions. Like the extensions ``.mjs`` (module javascript) and ``.cjs`` (common javascript _for compatibility_).
``require()`` will not work. Insted you will have to use [ES6 imports](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Statements/import):

```js
import defaultExport from "module-name";
// or
import { export1 } from "module-name";
```