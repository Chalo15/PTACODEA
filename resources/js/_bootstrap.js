/**
 * Lodash
 */
window._ = require("lodash");

/**
 * Popper JS
 */
window.Popper = require("popper.js").default;

/**
 * JQuery
 */
window.$ = window.jQuery = require("jquery");

/**
 * Bootstrap
 */
require("bootstrap");

/**
 * Axios
 */
window.axios = require("axios");

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

/**
 * AlpineJS
 */
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

/**
 * CKEditor
 */
window.ClassicEditor = require('@ckeditor/ckeditor5-build-classic');
