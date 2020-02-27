const mix = require('laravel-mix');
const path = require('path')

mix.webpackConfig({
    resolve: {
        extensions: ['.js', '.vue', '.json', '.scss'],
        alias: {
            '@p': path.join(__dirname, './resources/assets/package')
        }
    }
})

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */



// admin template configuration: [admire]
const adminVendors = "node_modules/";
const adminBowervendors = "bower_components/";
const adminResourcesAssets = "resources/assets/admin/";
const adminSrcCss = adminResourcesAssets + "css/";
const adminSrcJs = adminResourcesAssets + "js/";

//destination path configuration
const adminDest = "../public_html/admin/";
const adminDestFonts = adminDest + "fonts/";
const adminDestCss = adminDest + "css/";
const adminDestJs = adminDest + "js/";
const adminDestImg = adminDest + "img/";
const adminDestVendors = adminDest + "vendors/";

const paths = {
    jquery: adminVendors + "jquery/dist/",
    bootstrap: adminVendors + "bootstrap/dist/",
    fontawesome: adminVendors + "font-awesome/",
    popperjs: adminVendors + "popper.js/dist/umd/",
    animate: adminVendors + "animate.css/",
    autosize: adminVendors + "jquery-autosize/",
    bootstrap3_wysihtml5: adminBowervendors + "bootstrap3-wysihtml5-bower/dist/",
    bootstrap_datepicker: adminVendors + "bootstrap-datepicker/dist/",
    bootstrap_daterangepicker: adminVendors + "bootstrap-daterangepicker/",
    bootstrap_switch: adminVendors + "bootstrap-switch/dist/",
    jquery_tagsinput: adminVendors + "jQuery-Tags-Input/dist/",
    bootstrap_timepicker: adminVendors + "bootstrap-timepicker/",
    bootstrap_calendar: adminBowervendors + "bootstrap_calendar/bootstrap_calendar/",
    buttons: adminVendors + "Buttons/",
    c3: adminVendors + "c3/",
    chosen: adminVendors + "chosen-js/",

    ckeditor: adminVendors + "ckeditor4/",

    countup: adminVendors + "countup.js/dist/",
    datatables: adminVendors + "datatables.net/",
    fullcalendar: adminVendors + "fullcalendar/dist/",
    gmaps: adminVendors + "gmaps/",
    holder: adminVendors + "holderjs/",
    inputlimiter: adminBowervendors + "jquery-inputlimiter/",
    jasny_bootstrap: adminVendors + "jasny-bootstrap/",
    jquery_uniform: adminVendors + "jquery.uniform/src/js/",
    bootstrap_colorpicker: adminVendors + "bootstrap-colorpicker/dist/",
    modal: adminBowervendors + "ModalWindowEffects/",
    moment: adminVendors + "moment/",
    noty: adminVendors + "noty/",
    rangy: adminVendors + "rangy-1.3/",
    bootstrap_slider: adminVendors + "bootstrap-slider/dist/",
    select2: adminVendors + "select2/dist/",
    slimscroll: adminVendors + "jquery-slimscroll/",
    tinymce: adminVendors + "tinymce/",
    toastr: adminVendors + "toastr/build/",
    twitter_bootstrap_wizard: adminVendors + "twitter-bootstrap-wizard/",
    wysihtml5x: adminVendors + "wysihtml5x/dist/",
    themify: adminBowervendors + "themify-icons/",
    validation_engine: adminBowervendors + "jQuery-Validation-Engine/",
    jquery_validation: adminVendors + "jquery-validation/dist/",
    ion_rangeslider: adminVendors + "ion-rangeslider/",
    knob: adminVendors + "jquery-knob/",
    flotchart: adminVendors + "flot/",
    flotspline: adminVendors + "flot-spline/js/",
    flottooltip: adminVendors + "jquery.flot.tooltip/js/",
    datatablesbs4: adminVendors + "datatables.net-bs4/",
    datatablesbutton: adminVendors + "datatables.net-buttons/",
    datatablesbsbuttons: adminVendors + "datatables.net-buttons-bs/",
    datatablescolreorder: adminVendors + "datatables.net-colreorder/",
    datatablescolreorderbs: adminVendors + "datatables.net-colreorder-bs/",
    datatablesresponsive: adminVendors + "datatables.net-responsive/",
    datatablesresponsivebs4: adminVendors + "datatables.net-responsive-bs4/",
    datatablesrowreorder: adminVendors + "datatables.net-rowreorder/",
    datatablesrowreorderbs: adminVendors + "datatables.net-rowreorder-bs/",
    datatablesscroll: adminVendors + "datatables.net-scroller/",
    datatablesscrollbs: adminVendors + "datatables.net-scroller-bs/",
    raphael: adminVendors + "raphael/",
    bootstrapValidator: adminBowervendors + "bootstrapValidator/dist/",
    ionicons: adminBowervendors + "ionicons/",
    fancybox: adminBowervendors + "fancybox/",
    summernote: adminVendors + "summernote/dist/",
    sortable: adminVendors + "sortablejs/",
    chartist: adminVendors + "chartist/dist/",
    inputmask: adminVendors + "inputmask/dist/",
    snabbt: adminVendors + "snabbt.js/",
    hover: adminBowervendors + "hover/",
    switchery: adminVendors + "switchery/dist/",
    wow: adminVendors + "wowjs/",
    radio_css: adminVendors + "radiobox.css/dist/",
    checkbox_css: adminVendors + "checkbox.css/dist/",
    datetimepicker: adminVendors + "datetimepicker/dist/",
    pnotify: adminVendors + "pnotify/dist/",
    imagehover: adminVendors + "imagehover.css/css/",
    j_timepicker: adminVendors + "timepicker/",
    starability: adminVendors + "starability/",
    starrating: adminVendors + "bootstrap-star-rating/",
    jqvmap: adminVendors + "jqvmap/dist/",
    nvd3: adminVendors + "nvd3/build/",
    sweetalert: adminVendors + "sweetalert2/dist/",
    rickshaw: adminVendors + "rickshaw/",
    d3: adminVendors + "d3/",
    bootstrap_tagsinput: adminVendors + "bootstrap-tagsinput/dist/",
    jquery_newsTicker: adminBowervendors + "jquery.newsTicker/js/",
    clockpicker: adminVendors + "clockpicker/dist/",
    intel_tel: adminVendors + "intl-tel-input/build/",
    rateYo: adminVendors + "rateyo/",
    swiper: adminVendors + "swiper/dist/",
    circliful: adminBowervendors + "circliful/",
    jqplot: adminVendors + "jqplot/",
    cropper: adminVendors + "cropper/dist/",
    fileinput: adminVendors + "bootstrap-fileinput/",
    jstree: adminVendors + "jstree/",
    tooltipster: adminVendors + "tooltipster/dist/",
    tipso: adminVendors + "tipso/src/",
    datatables_responsive: adminVendors + "datatables.net-responsive/",
    backstretch: adminVendors + "jquery-backstretch/",
    flip: adminVendors + "flip/",
    izitoast: adminVendors + "izitoast/",
    ihover: adminBowervendors + "ihover/",
    blueimp_file_upload: adminVendors + "blueimp-file-upload/",
    blueimpgallery: adminVendors + "blueimp-gallery/",
    blueimpcanvas: adminVendors + "blueimp-canvas-to-blob/js/",
    blueimptmpl: adminVendors + "blueimp-tmpl/",
    imgLoad: adminVendors + "blueimp-load-image/",
    dropify: adminVendors + "dropify/dist/",
    dropzone: adminVendors + "dropzone/dist/",
    unitegallery: adminBowervendors + "unitegallery/",
    multiselect: adminVendors + "multiselect/"
};

// ckEditor4
mix.copy(paths.ckeditor, adminDestVendors + 'ckeditor');

// Copy fonts straight to public
mix.copy(paths.fontawesome + "fonts", adminDestFonts);

//COPY CSS,JS AND IMAGES TO PUBLIC
mix.copy(adminSrcCss, adminDestCss, false);
mix.copy(adminResourcesAssets + "img", adminDestImg, false);
mix.copy(adminSrcJs, adminDestJs, false);

//bootstrap
mix.copy(paths.bootstrap + "js/bootstrap.min.js", adminDestJs);

//fontawesome
mix.copy(paths.fontawesome + "css/font-awesome.min.css", adminDestCss);
mix.copy(paths.fontawesome + "fonts", adminDestFonts);

//jquery
mix.copy(paths.jquery + "jquery.min.js", adminDestJs);

//popper.js
mix.copy(paths.popperjs + "popper.min.js", adminDestJs);
//jquery.newsTicker
mix.copy(
    paths.jquery_newsTicker + "newsTicker.js",
    adminDestVendors + "jquery_newsTicker/js"
);

// animate
mix.copy(paths.animate + "animate.min.css", adminDestVendors + "animate/css");

// animate
mix.copy(
    paths.autosize + "jquery.autosize.min.js",
    adminDestVendors + "autosize/js"
);

// bootstrap-datepicker
mix.copy(
    paths.bootstrap_datepicker + "js/bootstrap-datepicker.min.js",
    adminDestVendors + "datepicker/js"
);
mix.copy(
    paths.bootstrap_datepicker + "css/bootstrap-datepicker.min.css",
    adminDestVendors + "datepicker/css"
);
mix.copy(
    paths.bootstrap_datepicker + "css/bootstrap-datepicker3.css",
    adminDestVendors + "datepicker/css"
);

//rickshaw
mix.copy(paths.rickshaw + "rickshaw.min.css", adminDestVendors + "rickshaw/css");
mix.copy(paths.rickshaw + "rickshaw.min.js", adminDestVendors + "rickshaw/js");

// daterange picker
mix.copy(
    paths.bootstrap_daterangepicker + "daterangepicker.js",
    adminDestVendors + "daterangepicker/js"
);
mix.copy(
    paths.bootstrap_daterangepicker + "daterangepicker.css",
    adminDestVendors + "daterangepicker/css"
);

// bootstrap switch
mix.copy(
    paths.bootstrap_switch + "css/bootstrap3/bootstrap-switch.min.css",
    adminDestVendors + "bootstrap-switch/css"
);
mix.copy(
    paths.bootstrap_switch + "js/bootstrap-switch.min.js",
    adminDestVendors + "bootstrap-switch/js"
);

// bootstrap tagsinput
mix.copy(
    paths.jquery_tagsinput + "jquery.tagsinput.min.css",
    adminDestVendors + "jquery-tagsinput/css"
);
mix.copy(
    paths.jquery_tagsinput + "jquery.tagsinput.min.js",
    adminDestVendors + "jquery-tagsinput/js"
);

// bootstrap-timepicker
mix.copy(
    paths.bootstrap_timepicker + "css/bootstrap-timepicker.min.css",
    adminDestVendors + "bootstrap-timepicker/css"
);
mix.copy(
    paths.bootstrap_timepicker + "js/bootstrap-timepicker.min.js",
    adminDestVendors + "bootstrap-timepicker/js"
);

//sweetalert
mix.copy(
    paths.sweetalert + "sweetalert2.min.css",
    adminDestVendors + "sweetalert/css"
);
mix.copy(
    paths.sweetalert + "sweetalert2.min.js",
    adminDestVendors + "sweetalert/js"
);

// Buttons
mix.copy(paths.buttons + "css/buttons.min.css", adminDestVendors + "Buttons/css");
mix.copy(paths.buttons + "showcase/js/scrollto.js", adminDestVendors + "Buttons/js");
mix.copy(paths.buttons + "js/buttons.js", adminDestVendors + "Buttons/js");

//c3 charts
mix.copy(paths.c3 + "c3.min.css", adminDestVendors + "c3/css");
mix.copy(paths.c3 + "c3.min.js", adminDestVendors + "c3/js");

// pnotify
mix.copy(paths.pnotify + "pnotify.css", adminDestVendors + "pnotify/css");
mix.copy(
    paths.pnotify + "pnotify.brighttheme.css",
    adminDestVendors + "pnotify/css"
);
mix.copy(paths.pnotify + "pnotify.buttons.css", adminDestVendors + "pnotify/css");
mix.copy(paths.pnotify + "pnotify.mobile.css", adminDestVendors + "pnotify/css");
mix.copy(paths.pnotify + "pnotify.history.css", adminDestVendors + "pnotify/css");

// pnotify js
mix.copy(paths.pnotify + "pnotify.js", adminDestVendors + "pnotify/js");
mix.copy(paths.pnotify + "pnotify.animate.js", adminDestVendors + "pnotify/js");
mix.copy(paths.pnotify + "pnotify.buttons.js", adminDestVendors + "pnotify/js");
mix.copy(paths.pnotify + "pnotify.confirm.js", adminDestVendors + "pnotify/js");
mix.copy(paths.pnotify + "pnotify.nonblock.js", adminDestVendors + "pnotify/js");
mix.copy(paths.pnotify + "pnotify.mobile.js", adminDestVendors + "pnotify/js");
mix.copy(paths.pnotify + "pnotify.desktop.js", adminDestVendors + "pnotify/js");
mix.copy(paths.pnotify + "pnotify.history.js", adminDestVendors + "pnotify/js");
mix.copy(paths.pnotify + "pnotify.callbacks.js", adminDestVendors + "pnotify/js");

//imagehover
mix.copy(
    paths.imagehover + "imagehover.min.css",
    adminDestVendors + "imagehover/css"
);

//chosen
mix.copy(paths.chosen + "chosen.jquery.min.js", adminDestVendors + "chosen/js");
mix.copy(paths.chosen + "chosen.min.css", adminDestVendors + "chosen/css");
mix.copy(paths.chosen + "chosen-sprite.png", adminDestVendors + "chosen/css");
mix.copy(paths.chosen + "chosen-sprite@2x.png", adminDestVendors + "chosen/css");

// countUp js
mix.copy(paths.countup + "countUp.min.js", adminDestVendors + "countUp.js/js");

// datatables
mix.copy(
    paths.datatables + "js/jquery.dataTables.js",
    adminDestVendors + "datatables/js"
);
mix.copy(
    paths.datatablesbs4 + "js/dataTables.bootstrap4.min.js",
    adminDestVendors + "datatables/js"
);
mix.copy(
    paths.datatablesbs4 + "css/dataTables.bootstrap4.min.css",
    adminDestVendors + "datatables/css"
);
mix.copy(
    paths.datatablesbutton + "js/buttons.print.min.js",
    adminDestVendors + "datatables/js"
);
mix.copy(
    paths.datatablesbutton + "js/dataTables.buttons.min.js",
    adminDestVendors + "datatables/js"
);
mix.copy(
    paths.datatablesbsbuttons + "css/buttons.bootstrap.css",
    adminDestVendors + "datatables/css"
);
mix.copy(
    paths.datatablesbsbuttons + "js/buttons.bootstrap.min.js",
    adminDestVendors + "datatables/js"
);
mix.copy(
    paths.datatablescolreorder + "js/dataTables.colReorder.js",
    adminDestVendors + "datatables/js"
);
mix.copy(
    paths.datatablescolreorderbs + "css/colReorder.bootstrap.min.css",
    adminDestVendors + "datatables/css"
);
mix.copy(
    paths.datatablesresponsive + "js/dataTables.responsive.min.js",
    adminDestVendors + "datatables/js"
);

// datatables responsive bs4
mix.copy(
    paths.datatablesresponsivebs4 + "js/responsive.bootstrap4.min.js",
    adminDestVendors + "datatables/js"
);

mix.copy(
    paths.datatablesresponsivebs4 + "css/responsive.bootstrap4.min.css",
    adminDestVendors + "datatables/css"
);

mix.copy(
    paths.datatablesrowreorder + "js/dataTables.rowReorder.min.js",
    adminDestVendors + "datatables/js"
);
mix.copy(
    paths.datatablesbutton + "js/buttons.html5.min.js",
    adminDestVendors + "datatables/js"
);
mix.copy(
    paths.datatablesbutton + "js/buttons.colVis.min.js",
    adminDestVendors + "datatables/js"
);
mix.copy(
    paths.datatablesbutton + "js/buttons.print.min.js",
    adminDestVendors + "datatables/js"
);
mix.copy(
    paths.datatablesrowreorderbs + "css/rowReorder.bootstrap.css",
    adminDestVendors + "datatables/css"
);
mix.copy(
    paths.datatablesscroll + "js/dataTables.scroller.min.js",
    adminDestVendors + "datatables/js"
);
mix.copy(
    paths.datatablesscrollbs + "css/scroller.bootstrap.min.css",
    adminDestVendors + "datatables/css"
);

// fullcalendar
mix.copy(
    paths.fullcalendar + "fullcalendar.min.css",
    adminDestVendors + "fullcalendar/css"
);
mix.copy(
    paths.fullcalendar + "fullcalendar.print.css",
    adminDestVendors + "fullcalendar/css"
);
mix.copy(
    paths.fullcalendar + "fullcalendar.min.js",
    adminDestVendors + "fullcalendar/js"
);

// gmaps
mix.copy(paths.gmaps + "examples/examples.css", adminDestVendors + "gmaps/css");
mix.copy(paths.gmaps + "gmaps.min.js", adminDestVendors + "gmaps/js");

// handlebars
// mix.copy(paths.handlebars + 'handlebars.js', adminDestVendors + 'handlebars/js');

// holderjs
mix.copy(paths.holder + "holder.js", adminDestVendors + "holderjs/js");

//jasny-bootstrap
mix.copy(
    paths.jasny_bootstrap + "dist/css/jasny-bootstrap.min.css",
    adminDestVendors + "jasny-bootstrap/css"
);
mix.copy(
    paths.jasny_bootstrap + "dist/js/jasny-bootstrap.min.js",
    adminDestVendors + "jasny-bootstrap/js"
);
mix.copy(
    paths.jasny_bootstrap + "js/inputmask.js",
    adminDestVendors + "jasny-bootstrap/js"
);

// bootstrap color picker
mix.copy(
    paths.bootstrap_colorpicker + "css/bootstrap-colorpicker.min.css",
    adminDestVendors + "bootstrap-colorpicker/css"
);
mix.copy(
    paths.bootstrap_colorpicker + "js/bootstrap-colorpicker.min.js",
    adminDestVendors + "bootstrap-colorpicker/js"
);
mix.copy(
    paths.bootstrap_colorpicker + "img/bootstrap-colorpicker",
    adminDestCss + "lib/colorpicker/img"
);

// advanced modals
mix.copy(paths.modal + "css", adminDestVendors + "modal/css");
// mix.copy(srcCss + 'pages/advmodals.css',  destCss + 'pages');
mix.copy(paths.modal + "js/", adminDestVendors + "modal/js");

// moment
mix.copy(paths.moment + "min/moment.min.js", adminDestVendors + "moment/js");

// noty
mix.copy(
    paths.noty + "js/noty/packaged/jquery.noty.packaged.min.js",
    adminDestVendors + "noty/js"
);

// seiyria-bootstrap-slider
mix.copy(
    paths.bootstrap_slider + "css/bootstrap-slider.min.css",
    adminDestVendors + "bootstrap-slider/css"
);
mix.copy(
    paths.bootstrap_slider + "bootstrap-slider.min.js",
    adminDestVendors + "bootstrap-slider/js"
);

//select2
mix.copy(paths.select2 + "css/select2.min.css", adminDestVendors + "select2/css");
mix.copy(paths.select2 + "js/select2.js", adminDestVendors + "select2/js");

// tinymce
mix.copy(paths.tinymce + "tinymce.min.js", adminDestVendors + "tinymce/js");
mix.copy(paths.tinymce + "jquery.tinymce.min.js", adminDestVendors + "tinymce/js");
mix.copy(paths.tinymce + "plugins", adminDestVendors + "tinymce/js/plugins");
mix.copy(paths.tinymce + "themes", adminDestVendors + "tinymce/js/themes");
mix.copy(paths.tinymce + "skins", adminDestVendors + "tinymce/js/skins");

// toastr
mix.copy(paths.toastr + "toastr.min.css", adminDestVendors + "toastr/css");
mix.copy(paths.toastr + "toastr.min.js", adminDestVendors + "toastr/js");

//twitter bootstrapWizard
mix.copy(
    paths.twitter_bootstrap_wizard + "jquery.bootstrap.wizard.min.js",
    adminDestVendors + "twitter-bootstrap-wizard/js"
);

// bootstrap3-wysihtml5-bower
mix.copy(
    paths.bootstrap3_wysihtml5 + "bootstrap3-wysihtml5.min.css",
    adminDestVendors + "bootstrap3-wysihtml5-bower/css"
);
mix.copy(
    paths.bootstrap3_wysihtml5 + "bootstrap3-wysihtml5.all.min.js",
    adminDestVendors + "bootstrap3-wysihtml5-bower/js"
);
mix.copy(
    paths.bootstrap3_wysihtml5 + "bootstrap3-wysihtml5.min.js",
    adminDestVendors + "bootstrap3-wysihtml5-bower/js"
);

// bootstrap_calendar
mix.copy(
    paths.bootstrap_calendar + "css/bootstrap_calendar.css",
    adminDestVendors + "bootstrap_calendar/css"
);
mix.copy(
    paths.bootstrap_calendar + "js/bootstrap_calendar.min.js",
    adminDestVendors + "bootstrap_calendar/js"
);

//inputlimiter
mix.copy(
    paths.inputlimiter + "jquery.inputlimiter.css",
    adminDestVendors + "inputlimiter/css"
);
mix.copy(
    paths.inputlimiter + "jquery.inputlimiter.js",
    adminDestVendors + "inputlimiter/js"
);

//jquery.uniform
mix.copy(
    paths.jquery_uniform + "jquery.uniform.js",
    adminDestVendors + "jquery.uniform/js"
);

//slimscroll
mix.copy(
    paths.slimscroll + "jquery.slimscroll.min.js",
    adminDestVendors + "slimscroll/js"
);

//themify icons
mix.copy(paths.themify + "css/themify-icons.css", adminDestVendors + "themify/css");

mix.copy(paths.themify + "fonts/themify.woff", adminDestVendors + "themify/fonts");
mix.copy(paths.themify + "fonts/themify.ttf", adminDestVendors + "themify/fonts");

//validation engine
mix.copy(
    paths.validation_engine + "css/validationEngine.jquery.css",
    adminDestVendors + "jquery-validation-engine/css"
);
mix.copy(
    paths.validation_engine + "js/jquery.validationEngine.js",
    adminDestVendors + "jquery-validation-engine/js"
);
mix.copy(
    paths.validation_engine + "js/languages/jquery.validationEngine-en.js",
    adminDestVendors + "jquery-validation-engine/js"
);

//jquery validation
mix.copy(
    paths.jquery_validation + "jquery.validate.js",
    adminDestVendors + "jquery-validation/js"
);

//ion rangeslider
mix.copy(
    paths.ion_rangeslider + "css/ion.rangeSlider.css",
    adminDestVendors + "ion-rangeslider/css"
);
mix.copy(
    paths.ion_rangeslider + "css/ion.rangeSlider.skinFlat.css",
    adminDestVendors + "ion-rangeslider/css"
);
mix.copy(
    paths.ion_rangeslider + "js/ion.rangeSlider.min.js",
    adminDestVendors + "ion-rangeslider/js"
);
mix.copy(
    paths.ion_rangeslider + "img/sprite-skin-flat.png",
    adminDestVendors + "ion-rangeslider/img"
);

// knob jquery
mix.copy(paths.knob + "js/jquery.knob.js", adminDestVendors + "Knob/js");

// flotchart
mix.copy(
    paths.flotchart + "examples/examples.css",
    adminDestVendors + "flotchart/css"
);
mix.copy(paths.flotchart + "jquery.flot.js", adminDestVendors + "flotchart/js");
mix.copy(
    paths.flotchart + "jquery.flot.threshold.js",
    adminDestVendors + "flotchart/js"
);
mix.copy(
    paths.flotchart + "jquery.flot.stack.js",
    adminDestVendors + "flotchart/js"
);
mix.copy(paths.flotchart + "jquery.flot.time.js", adminDestVendors + "flotchart/js");
mix.copy(
    paths.flotchart + "jquery.flot.resize.js",
    adminDestVendors + "flotchart/js"
);
mix.copy(
    paths.flotchart + "jquery.flot.categories.js",
    adminDestVendors + "flotchart/js"
);
mix.copy(paths.flotchart + "jquery.flot.pie.js", adminDestVendors + "flotchart/js");
mix.copy(
    paths.flottooltip + "jquery.flot.tooltip.min.js",
    adminDestVendors + "flot.tooltip/js"
);
mix.copy(
    paths.flotspline + "jquery.flot.spline.min.js",
    adminDestVendors + "flotspline/js"
);

// raphael
mix.copy(paths.raphael + "raphael.min.js", adminDestVendors + "raphael/js");

// bootstrapvalidator
mix.copy(
    paths.bootstrapValidator + "css/bootstrapValidator.min.css",
    adminDestVendors + "bootstrapvalidator/css"
);
mix.copy(
    paths.bootstrapValidator + "js/bootstrapValidator.min.js",
    adminDestVendors + "bootstrapvalidator/js"
);

// ionicons
mix.copy(paths.ionicons + "css/ionicons.min.css", adminDestVendors + "ionicons/css");
mix.copy(paths.ionicons + "fonts", adminDestVendors + "ionicons/fonts");

// fancybox
mix.copy(
    paths.fancybox + "lib/jquery.mousewheel.pack.js",
    adminDestVendors + "fancybox/js"
);
mix.copy(
    paths.fancybox + "source/jquery.fancybox.js",
    adminDestVendors + "fancybox/js"
);
mix.copy(
    paths.fancybox + "source/jquery.fancybox.pack.js",
    adminDestVendors + "fancybox/js"
);
mix.copy(
    paths.fancybox + "source/helpers/jquery.fancybox-buttons.js",
    adminDestVendors + "fancybox/js"
);
mix.copy(
    paths.fancybox + "source/helpers/jquery.fancybox-thumbs.js",
    adminDestVendors + "fancybox/js"
);
mix.copy(
    paths.fancybox + "source/helpers/jquery.fancybox-media.js",
    adminDestVendors + "fancybox/js"
);
mix.copy(
    paths.fancybox + "source/helpers/jquery.fancybox-thumbs.css",
    adminDestVendors + "fancybox/css"
);
mix.copy(
    paths.fancybox + "source/helpers/jquery.fancybox-buttons.css",
    adminDestVendors + "fancybox/css"
);
mix.copy(
    paths.fancybox + "source/jquery.fancybox.css",
    adminDestVendors + "fancybox/css"
);
mix.copy(
    paths.fancybox + "source/fancybox_overlay.png",
    adminDestVendors + "fancybox/css"
);
mix.copy(
    paths.fancybox + "source/fancybox_loading.gif",
    adminDestVendors + "fancybox/css"
);
mix.copy(
    paths.fancybox + "source/fancybox_sprite.png",
    adminDestVendors + "fancybox/css"
);
mix.copy(
    paths.fancybox + "source/fancybox_sprite@2x.png",
    adminDestVendors + "fancybox/css"
);
mix.copy(
    paths.fancybox + "source/fancybox_loading@2x.gif",
    adminDestVendors + "fancybox/css"
);
mix.copy(paths.fancybox + "source/blank.gif", adminDestVendors + "fancybox/css");

// bootstrapvalidator
mix.copy(paths.summernote + "summernote.css", adminDestVendors + "summernote/css");
mix.copy(paths.summernote + "summernote.js", adminDestVendors + "summernote/js");
mix.copy(paths.summernote + "font", adminDestVendors + "summernote/css/font");

//Sortable
mix.copy(paths.sortable + "Sortable.js", adminDestVendors + "sortable/js");

//chartist
mix.copy(paths.chartist + "chartist.min.css", adminDestVendors + "chartist/css");

//Sortable
mix.copy(paths.chartist + "chartist.min.js", adminDestVendors + "chartist/js");

//inputmask
mix.copy(
    paths.inputmask + "inputmask/inputmask.js",
    adminDestVendors + "inputmask/js"
);
mix.copy(
    paths.inputmask + "inputmask/jquery.inputmask.js",
    adminDestVendors + "inputmask/js"
);
mix.copy(
    paths.inputmask + "inputmask/inputmask.extensions.js",
    adminDestVendors + "inputmask/js"
);
mix.copy(
    paths.inputmask + "inputmask/inputmask.phone.extensions.js",
    adminDestVendors + "inputmask/js"
);
mix.copy(
    paths.inputmask + "inputmask/inputmask.date.extensions.js",
    adminDestVendors + "inputmask/js"
);
mix.copy(
    paths.inputmask + "jquery.inputmask.bundle.js",
    adminDestVendors + "inputmask/js"
);

//snabbt
mix.copy(paths.snabbt + "snabbt.min.js", adminDestVendors + "snabbt/js");
//hover
mix.copy(paths.hover + "css/hover-min.css", adminDestVendors + "hover/css");

//switchery
mix.copy(paths.switchery + "switchery.min.css", adminDestVendors + "switchery/css");
mix.copy(paths.switchery + "switchery.min.js", adminDestVendors + "switchery/js");

//wow
mix.copy(paths.wow + "dist/wow.min.js", adminDestVendors + "wow/js");
mix.copy(paths.wow + "css/libs/animate.css", adminDestVendors + "wow/css");

//wow
mix.copy(
    paths.radio_css + "css/radiobox.min.css",
    adminDestVendors + "radio_css/css"
);

//wow
mix.copy(
    paths.checkbox_css + "css/checkbox.min.css",
    adminDestVendors + "checkbox_css/css"
);

//datetimepicker
mix.copy(
    paths.datetimepicker + "DateTimePicker.min.js",
    adminDestVendors + "datetimepicker/js"
);
mix.copy(
    paths.datetimepicker + "DateTimePicker.min.css",
    adminDestVendors + "datetimepicker/css"
);

//jt timepicker
mix.copy(
    paths.j_timepicker + "jquery.timepicker.min.js",
    adminDestVendors + "j_timepicker/js"
);
mix.copy(
    paths.j_timepicker + "jquery.timepicker.css",
    adminDestVendors + "j_timepicker/css"
);

//starability
mix.copy(
    paths.starability + "starability-css/starability-all.css",
    adminDestVendors + "starability/css"
);
// mix.copy(paths.starability + 'starability-images/icons.png', adminDestVendors + 'starability/starability-images');
// mix.copy(paths.starability + 'starability-images/icons@2x.png', adminDestVendors + 'starability/starability-images');
// mix.copy(paths.starability + 'starability-images/icons-checkmark.png', adminDestVendors + 'starability/starability-images');
// mix.copy(paths.starability + 'starability-images/icons-checkmark@2x.png', adminDestVendors + 'starability/starability-images');

//bootstrap star rating
mix.copy(
    paths.starrating + "css/star-rating.min.css",
    adminDestVendors + "bootstraprating/css"
);
mix.copy(
    paths.starrating + "js/star-rating.min.js",
    adminDestVendors + "bootstraprating/js"
);
mix.copy(
    paths.starrating + "img/loading.gif",
    adminDestVendors + "bootstraprating/img"
);

//nvd3
mix.copy(paths.nvd3 + "nv.d3.js", adminDestVendors + "nvd3/js");
mix.copy(paths.nvd3 + "nv.d3.css", adminDestVendors + "nvd3/css");

//d3
mix.copy(paths.d3 + "d3.min.js", adminDestVendors + "d3/js");

//jqvmaps
mix.copy(paths.jqvmap + "jqvmap.min.css", adminDestVendors + "jqvmap/css");
mix.copy(paths.jqvmap + "jquery.vmap.min.js", adminDestVendors + "jqvmap/js");
mix.copy(paths.jqvmap + "maps/jquery.vmap.world.js", adminDestVendors + "jqvmap/js");
mix.copy(
    paths.jqvmap + "maps/jquery.vmap.canada.js",
    adminDestVendors + "jqvmap/js"
);
mix.copy(paths.jqvmap + "maps/jquery.vmap.usa.js", adminDestVendors + "jqvmap/js");
mix.copy(
    paths.jqvmap + "maps/jquery.vmap.europe.js",
    adminDestVendors + "jqvmap/js"
);
mix.copy(
    paths.jqvmap + "maps/continents/jquery.vmap.australia.js",
    adminDestVendors + "jqvmap/js"
);
mix.copy(
    paths.jqvmap + "maps/jquery.vmap.russia.js",
    adminDestVendors + "jqvmap/js"
);

//bootstrap_tagsinput
mix.copy(
    paths.bootstrap_tagsinput + "bootstrap-tagsinput.css",
    adminDestVendors + "bootstrap-tagsinput/css"
);
mix.copy(
    paths.bootstrap_tagsinput + "bootstrap-tagsinput.js",
    adminDestVendors + "bootstrap-tagsinput/js"
);

//clockpicker
mix.copy(
    paths.clockpicker + "jquery-clockpicker.css",
    adminDestVendors + "clockpicker/css"
);
mix.copy(
    paths.clockpicker + "jquery-clockpicker.min.js",
    adminDestVendors + "clockpicker/js"
);

//intl tel input
mix.copy(
    paths.intel_tel + "css/intlTelInput.css",
    adminDestVendors + "intl-tel-input/css"
);
mix.copy(
    paths.intel_tel + "js/intlTelInput.js",
    adminDestVendors + "intl-tel-input/js"
);
mix.copy(paths.intel_tel + "js/utils.js", adminDestVendors + "intl-tel-input/js");

mix.copy(paths.intel_tel + "img/flags.png", adminDestVendors + "intl-tel-input/img");
mix.copy(
    paths.intel_tel + "img/flags@2x.png",
    adminDestVendors + "intl-tel-input/img"
);

// rateyo
mix.copy(paths.rateYo + "src/jquery.rateyo.css", adminDestVendors + "rateyo/css");
mix.copy(paths.rateYo + "src/jquery.rateyo.js", adminDestVendors + "rateyo/js");

// swiper
mix.copy(paths.swiper + "css/swiper.min.css", adminDestVendors + "swiper/css");
mix.copy(paths.swiper + "js/swiper.min.js", adminDestVendors + "swiper/js");

// circliful
mix.copy(
    paths.circliful + "css/jquery.circliful.css",
    adminDestVendors + "circliful/css"
);
mix.copy(
    paths.circliful + "js/jquery.circliful.min.js",
    adminDestVendors + "circliful/js"
);

//jqplot

mix.copy(paths.jqplot + "jquery.jqplot.min.css", adminDestVendors + "jqplot/css");
mix.copy(paths.jqplot + "jquery.jqplot.min.js", adminDestVendors + "jqplot/js");
mix.copy(paths.jqplot + "jqplot.highlighter.js", adminDestVendors + "jqplot/js");

//cropper
mix.copy(paths.cropper + "cropper.min.js", adminDestVendors + "cropper/js");
mix.copy(paths.cropper + "cropper.min.css", adminDestVendors + "cropper/css");

//fileinput
mix.copy(
    paths.fileinput + "css/fileinput.min.css",
    adminDestVendors + "fileinput/css"
);
mix.copy(paths.fileinput + "js/fileinput.min.js", adminDestVendors + "fileinput/js");
mix.copy(paths.fileinput + "themes/fa/theme.js", adminDestVendors + "fileinput/js");
mix.copy(paths.fileinput + "img/loading.gif", adminDestVendors + "fileinput/img");

// jstree
mix.copy(
    paths.jstree + "dist/themes/default/throbber.gif",
    adminDestVendors + "jstree/css"
);
mix.copy(
    paths.jstree + "dist/themes/default/32px.png",
    adminDestVendors + "jstree/css"
);
mix.copy(
    paths.jstree + "dist/themes/default/style.min.css",
    adminDestVendors + "jstree/css"
);
mix.copy(paths.jstree + "dist/jstree.min.js", adminDestVendors + "jstree/js");

// tooltipster
mix.copy(
    paths.tooltipster + "css/plugins/tooltipster/sideTip/themes",
    adminDestVendors + "tooltipster/css"
);
mix.copy(
    paths.tooltipster + "css/tooltipster.bundle.min.css",
    adminDestVendors + "tooltipster/css"
);
mix.copy(
    paths.tooltipster + "js/tooltipster.bundle.min.js",
    adminDestVendors + "tooltipster/js"
);

// datatables responsive
// mix.copy(paths.datatables_responsive + 'css/responsive.dataTables.scss', adminDestVendors + 'datatables/css');
mix.copy(
    paths.datatables_responsive + "js/dataTables.responsive.js",
    adminDestVendors + "datatables/js"
);

// tipso
mix.copy(paths.tipso + "tipso.min.css", adminDestVendors + "tipso/css");
mix.copy(paths.tipso + "tipso.min.js", adminDestVendors + "tipso/js");

// jquery.backstretch
mix.copy(
    paths.backstretch + "jquery.backstretch.js",
    adminDestVendors + "jquery.backstretch/js"
);

//flip
mix.copy(paths.flip + "dist/jquery.flip.min.js", adminDestVendors + "flip/js");

// izitoast
mix.copy(
    paths.izitoast + "dist/css/iziToast.min.css",
    adminDestVendors + "izitoast/css"
);
mix.copy(
    paths.izitoast + "dist/js/iziToast.min.js",
    adminDestVendors + "izitoast/js"
);

//ihover
mix.copy(paths.ihover + "src/ihover.min.css", adminDestVendors + "ihover/css");

// blueimp-file-upload
mix.copy(
    paths.blueimp_file_upload + "css/jquery.fileupload.css",
    adminDestVendors + "blueimp_file_upload/css"
);
mix.copy(
    paths.blueimp_file_upload + "css/jquery.fileupload-ui.css",
    adminDestVendors + "blueimp_file_upload/css"
);
mix.copy(
    paths.blueimp_file_upload + "css/jquery.fileupload-noscript.css",
    adminDestVendors + "blueimp_file_upload/css"
);
mix.copy(
    paths.blueimp_file_upload + "css/jquery.fileupload-ui-noscript.css",
    adminDestVendors + "blueimp_file_upload/css"
);
mix.copy(
    paths.blueimp_file_upload + "js/jquery.fileupload.js",
    adminDestVendors + "blueimp_file_upload/js"
);
mix.copy(
    paths.blueimp_file_upload + "js/jquery.fileupload-audio.js",
    adminDestVendors + "blueimp_file_upload/js"
);
mix.copy(
    paths.blueimp_file_upload + "js/jquery.fileupload-image.js",
    adminDestVendors + "blueimp_file_upload/js"
);
mix.copy(
    paths.blueimp_file_upload + "js/jquery.fileupload-process.js",
    adminDestVendors + "blueimp_file_upload/js"
);
mix.copy(
    paths.blueimp_file_upload + "js/jquery.fileupload-ui.js",
    adminDestVendors + "blueimp_file_upload/js"
);
mix.copy(
    paths.blueimp_file_upload + "js/jquery.fileupload-validate.js",
    adminDestVendors + "blueimp_file_upload/js"
);
mix.copy(
    paths.blueimp_file_upload + "js/jquery.fileupload-video.js",
    adminDestVendors + "blueimp_file_upload/js"
);
mix.copy(
    paths.blueimp_file_upload + "js/jquery.iframe-transport.js",
    adminDestVendors + "blueimp_file_upload/js"
);
mix.copy(
    paths.blueimp_file_upload + "js/vendor/jquery.ui.widget.js",
    adminDestVendors + "blueimp_file_upload/js"
);
mix.copy(
    paths.blueimp_file_upload + "img/loading.gif",
    adminDestVendors + "blueimp_file_upload/img"
);
mix.copy(
    paths.blueimp_file_upload + "img/progressbar.gif",
    adminDestVendors + "blueimp_file_upload/img"
);

// blueimp-tmpl
mix.copy(paths.blueimptmpl + "js/tmpl.js", adminDestVendors + "blueimp-tmpl/js");

// blueimp-load-image
mix.copy(
    paths.imgLoad + "js/load-image.all.min.js",
    adminDestVendors + "blueimploadimage/js"
);
mix.copy(
    paths.imgLoad + "js/load-image.js",
    adminDestVendors + "blueimploadimage/js"
);

// blueimp-canvas-to-blob
mix.copy(
    paths.blueimpcanvas + "canvas-to-blob.js",
    adminDestVendors + "blueimp-canvas-to-blob/js"
);

// blueimp-gallery-with-desc
mix.copy(
    paths.blueimpgallery + "css/blueimp-gallery.min.css",
    adminDestVendors + "blueimp-gallery-with-desc/css"
);
mix.copy(
    paths.blueimpgallery + "js/jquery.blueimp-gallery.min.js",
    adminDestVendors + "blueimp-gallery-with-desc/js"
);

//dropify
mix.copy(paths.dropify + "css/dropify.css", adminDestVendors + "dropify/css");
mix.copy(paths.dropify + "js/dropify.js", adminDestVendors + "dropify/js");
mix.copy(paths.dropify + "fonts", adminDestVendors + "dropify/fonts");

//dropify
mix.copy(paths.dropzone + "min/dropzone.min.css", adminDestVendors + "dropzone/css");
mix.copy(paths.dropzone + "dropzone.js", adminDestVendors + "dropzone/js");

// unitegallery
mix.copy(paths.unitegallery + "dist", adminDestVendors + "unitegallery/");

// multiselect
mix.copy(
    paths.multiselect + "css/multi-select.css",
    adminDestVendors + "multiselect/css"
);
mix.copy(paths.multiselect + "img/switch.png", adminDestVendors + "multiselect/img");
mix.copy(
    paths.multiselect + "js/jquery.multi-select.js",
    adminDestVendors + "multiselect/js"
);

/*
 browserSync for auto-reloading browser on changes
 */
// mix.browserSync("admire-laravel58.test");

mix.sass(adminResourcesAssets + "sass/admire.scss", adminDestCss + "custom.css").options({
    processCssUrls: false
});
mix.sass(
    adminResourcesAssets + "sass/bootstrap/app.scss",
    adminDestCss + "bootstrap.min.css"
).options({
    processCssUrls: false
});
mix.sass(
    adminResourcesAssets + "sass/sweetalert/sweetalert2.scss",
    adminDestCss + "pages/sweet_alert.css"
).options({
    processCssUrls: false
});

mix.styles("pages/sweet_alert.css", adminDestCss + "pages/sweet_alert.css");

//custom js
mix.copy(adminSrcJs + "custom.js", adminDestJs);
mix.styles(
    [adminDest + "css/bootstrap.min.css", adminDest + "css/font-awesome.min.css"],
    adminDestCss + "components.css"
);

mix.scripts(
    [
        //   adminDest + "js/jquery.min.js",
        //   adminDest + "js/popper.min.js",
        //   adminDest + "js/bootstrap.min.js",
        adminDestVendors + "slimscroll/js/jquery.slimscroll.min.js"
    ],
    adminDestJs + "components.js"
);



// function assetsPath (dir = '') {
//    return path.join(__dirname, './resources/assets/', dir)
// }

function publicPath(dir = '') {
    return path.join(__dirname, './../public_html/', dir)
}
mix.publicPath = publicPath
mix.setPublicPath('./../public_html/');
mix.copy('node_modules/flatpickr/dist/flatpickr.min.css', publicPath('css/lib/flatpickr.min.css'));
mix.copy('node_modules/flatpickr/dist/flatpickr.min.js', publicPath('js/lib/flatpickr.min.js'));
mix.copy('node_modules/flag-icon-css/css/flag-icon.min.css', publicPath('css/lib/flag-icon.min.css'));
mix.copyDirectory('node_modules/flag-icon-css/flags', publicPath('css/flags'));
mix.copy('node_modules/owl.carousel/dist/owl.carousel.min.js', publicPath('/js/lib/owl.carousel.min.js'));
mix.copy('node_modules/owl.carousel/dist/assets/owl.carousel.min.css', publicPath('/css/lib/owl.carousel.min.css'));
mix.copyDirectory('node_modules/@fortawesome/fontawesome-free/webfonts', publicPath('fonts'));
mix.copyDirectory('node_modules/ionicons/dist/fonts', publicPath('fonts'));
mix.js('resources/assets/frontend/js/app.js', 'js')
    .js('resources/assets/frontend/js/trading-session.js', 'js')
    .js('resources/assets/frontend/js/bootstrap.js', 'js/core.js')
    .js('resources/assets/frontend/js/bootstrap-v2.js', 'js/core-v2.js')
    .js('resources/assets/admin/assets/js/bootstrap.js', 'admin/js/core.js')
    .js('resources/assets/admin/assets/js/components/PerformanceGraph/performance-graph.js', 'admin/js/performance-graph.js')
    .js('resources/assets/admin/assets/js/components/MonthlyTradeStatement/monthly-trade-statement.js', 'admin/js/monthly-trade-statement.js')
    .js('resources/assets/admin/assets/js/components/Member/member.js', 'admin/js/member.js')
    .js('resources/assets/admin/assets/js/components/Wallet/Deposit/deposit.js', 'admin/js/deposit.js')
    .js('resources/assets/admin/assets/js/components/Wallet/Withdraw/withdraw.js', 'admin/js/withdraw.js')
    .js('resources/assets/admin/assets/js/components/Wallet/Balance/balance.js', 'admin/js/balance.js')
    .js('resources/assets/admin/assets/js/components/Subscription/subscription.js', 'admin/js/subscription.js')
    .js('resources/assets/admin/assets/js/components/Settings/PermissionManagement/permission-management.js', 'admin/js/permission-management.js')
    .js('resources/assets/admin/assets/js/components/Settings/RoleManagement/role-management.js', 'admin/js/role-management.js')
    .js('resources/assets/admin/assets/js/app.js', 'admin/js/admin.js')
    .js('resources/assets/frontend/js/components/Member/Dashboard/dashboard.js', 'member/js/dashboard.js')
    .js('resources/assets/frontend/js/components/Member/Profile/profile.js', 'member/js/profile.js')
    .sass('resources/assets/frontend/sass/app.scss', 'css')
    .sass('resources/assets/frontend/sass/navigation.scss', 'css')
    .sass('resources/assets/frontend/sass/partial/top-forex-broker.scss', 'css')
    .sass('resources/assets/frontend/sass/partial/advertisement.scss', 'css')
    .sass('resources/assets/frontend/sass/partial/recent-closed-trade.scss', 'css')
    .sass('resources/assets/frontend/sass/partial/recent-analysis.scss', 'css')
    .sass('resources/assets/frontend/sass/partial/analysis-index.scss', 'css')
    .sass('resources/assets/frontend/sass/partial/small-advertisements.scss', 'css')
    .sass('resources/assets/frontend/sass/partial/article-section.scss', 'css')
    .sass('resources/assets/frontend/sass/partial/forex-signal-index.scss', 'css')
    .sass('resources/assets/frontend/sass/partial/broker-review-details.scss', 'css')
    .sass('resources/assets/frontend/sass/partial/article-carousel.scss', 'css')
    .sass('resources/assets/frontend/sass/partial/sitemap.scss', 'css')
    .sass('resources/assets/frontend/sass/partial/regulation.scss', 'css')
    .sass('resources/assets/frontend/sass/partial/newsrelease.scss', 'css')
    .sass('resources/assets/frontend/sass/partial/career.scss', 'css')
    .sass('resources/assets/frontend/sass/partial/affiliate.scss', 'css')
    .sass('resources/assets/frontend/sass/partial/testimonial.scss', 'css')
    .sass('resources/assets/frontend/sass/partial/knowledgebase.scss', 'css')
    .sass('resources/assets/frontend/sass/partial/signal-report-details.scss', 'css')
    .sass('resources/assets/frontend/sass/partial/signal.scss', 'css')
    .sass('resources/assets/frontend/sass/style.scss', 'css')
    .sass('resources/assets/admin/assets/sass/app.scss', 'admin/css/admin.css')
    .sass('resources/assets/frontend/sass/dashboard.scss', 'member/css/dashboard.css')
    .sass('resources/assets/frontend/sass/profile.scss', 'member/css/profile.css');

if (mix.inProduction()) {
    mix.version()
}

