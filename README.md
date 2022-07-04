# Wordpress Theme: Starter 📖

This is a starter theme for Wordpress utilizing a modern build process with webpack 5.

These technologies are used:

- [Wordpress](https://wordpress.org/)
- [Webpack](https://webpack.js.org/)
- [bud.js](https://bud.js.org/) for the compilation process
- [sass/scss](https://sass-lang.com/)
- [Javascript ES6](https://javascript.info/)
- [yarn](https://yarnpkg.com/) or [npm](https://www.npmjs.com/)
- [node (v18)](https://nodejs.org/)
- [github workflows](https://docs.github.com/en/actions/using-workflows)

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

# BrowserSync with static HTML & CSS - for Designers 🎨

Go to your file ``./src/templates/...html`` and open it in a browser. For example:

``./wptheme.starter/src/templates/contentelements.html``

Start the development server (2️⃣).
Then add the port specified in the ``bud.config.mjs`` file (default **``:3010``** or ``:3000``) to your path:

````./wptheme.starter/src/templates/contentelements.html````

Your browser should now reload on changes made in CSS or Javascript.


# BrowserSync with Wordpress - for Devs 👾

Go to your running website. For example:

``http://localhost/your_project/``

Start the development server (2️⃣).
Then add the port specified in the ``bud.config.mjs`` file (default **``:3010``** or ``:3000``) to your path:

````http://localhost:3010/your_project/````

Your browser should now reload on changes made in CSS or Javascript.


# Hot reloading in Wordpress 🔥

Start the development server (2️⃣), then add the port to your URL and enjoy the magic.

---

# Javascript 💻

This projects requires you to use ES6 conventions. Like the extensions ``.mjs`` (module javascript) and ``.cjs`` (common javascript _for compatibility_).
``require()`` will not work. However you will have to use [ES6 imports](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Statements/import):

```js
import defaultExport from "module-name";
// or
import { export1 } from "module-name";
```

# Fonts in sass 🖤

Add your font files to the ``./src/fonts/`` folder. The files will be compiled into the dynamic ``./src/fonts/inlineFonts.scss`` file.
If you import that file into SCSS the fonts will be available in your CSS as variables.

``./src/fonts/webfont_open_sans.woff`` will be available in SCSS as ``$webfont_open_sans_woff``.
 
⚠️The fonts are only recompiled on initial run of ``dev`` or ``build``, and are not watched.

# Images/Icons 🖼

Images and icons are copied into the ``./dist/`` folder and can be referenced in HTML and SASS.


| Plain HTML                                 | SASS / SCSS                       |
|--------------------------------------------|-----------------------------------|
| ``src="../../dist/logo-lanz-stripes.svg"`` | ``url(../../images/sprite.svg)``  |

⚠️Note that in plain HTML you reference the built files in the ``./dist/`` folder, however in SASS/SCSS you reference the files in the ``./src/images/`` folder (uncompiled).


# Github Workflows 🚀

Workflows are located in the ``.github/workflows/`` folder.

# For Developers 🎮

Functions, Classes and Methods are to be documented. Use this convention:
[PHP Docstrings](http://phpdocu.sourceforge.net/howto.php)

You should use the same convention for Javascript.

```php
/**
* The short description
*
* As many lines of extendend description as you want {@link element} links to an element
* {@link http://www.example.com Example hyperlink inline link} links to a website
* Below this goes the tags to further describe element you are documenting
*
* @param  	type	$varname	description
* @return 	type	description
* @access 	public or private
* @author 	author name 
* @copyright	name date
* @version	version
* @see		name of another element that can be documented, produces a link to it in the documentation
* @link		a url
* @since  	a version or a date
* @deprecated	description
* @deprec	alias for deprecated
* @magic	phpdoc.de compatibility
* @todo		phpdoc.de compatibility
* @exception	Javadoc-compatible, use as needed
* @throws  	Javadoc-compatible, use as needed
* @var		type	a data type for a class variable
* @package	package name
* @subpackage	sub package name, groupings inside of a project
*/
```

Example:
```php
/**
* return the day of the week
*
* @param string $month 3-letter Month abbreviation
* @param integer $day day of the month
* @param integer $year year
* @return integer 0 = Sunday, value returned is from 0 (Sunday) to 6 (Saturday)
*/
function day_week($month, $day, $year)
{
...
}
```