// lazyload config
var MODULE_CONFIG = {
    chat:           [
                      '../public/libs/list.js/dist/list.js',
                      '../public/libs/notie/dist/notie.min.js',
                      '../public/assets/js/plugins/notie.js',
                      '../public/assets/js/app/chat.js'
                    ],
    mail:           [
                      '../public/libs/list.js/dist/list.js',
                      '../public/libs/notie/dist/notie.min.js',
                      '../public/assets/js/plugins/notie.js',
                      '../public/assets/js/app/mail.js'
                    ],
    user:           [
                      '../public/libs/list.js/dist/list.js',
                      '../public/libs/notie/dist/notie.min.js',
                      '../public/assets/js/plugins/notie.js',
                      '../public/assets/js/app/user.js'
                    ],
    search:         [
                      '../public/libs/list.js/dist/list.js',
                      '../assets/js/app/search.js'
                    ],
    invoice:        [
                      '../public/libs/list.js/dist/list.js',
                      '../public/libs/notie/dist/notie.min.js',
                      '../public/assets/js/app/invoice.js'
                    ],
    musicapp:       [
                      '../public/libs/list.js/dist/list.js',
                      '../public/assets/js/plugins/musicapp.js'
                    ],
    fullscreen:     [
                      '../public/libs/jquery-fullscreen-plugin/jquery.fullscreen-min.js',
                      '../public/assets/js/plugins/fullscreen.js'
                    ],
    jscroll:        [
                      '../public/libs/jscroll/dist/jquery.jscroll.min.js'
                    ],
    countTo:        [
                      '../public/libs/jquery-countto/jquery.countTo.js'
                    ],
    stick_in_parent:[
                      '../public/libs/sticky-kit/dist/sticky-kit.min.js'
                    ],
    stellar:        [
                      '../public/libs/jquery.stellar/jquery.stellar.min.js',
                      '../public/assets/js/plugins/stellar.js'
                    ],
    masonry:        [
                      '../public/libs/masonry-layout/dist/masonry.pkgd.min.js'
                    ],
    slick:          [
                      '../public/libs/slick-carousel/slick/slick.css',
                      '../public/libs/slick-carousel/slick/slick-theme.css',
                      '../public/libs/slick-carousel/slick/slick.min.js'
                    ],
    sort:           [
                      '../public/libs/html5sortable/dist/html.sortable.min.js',
                      '../public/assets/js/plugins/sort.js'
                    ],
    apexcharts:     [
                      '../public/libs/apexcharts/dist/apexcharts.min.js',
                      '../public/assets/js/plugins/apexcharts.js'
                    ],
    chartjs:        [
                      '../public/libs/moment/min/moment-with-locales.min.js',
                      '../public/libs/chart.js/dist/Chart.min.js',
                      '../public/libs/chart.js/dist/chart.ext.js',
                      '../public/assets/js/plugins/chartjs.js'
                    ],
    chartist:       [
                      '../public/libs/chartist/dist/chartist.min.css',
                      '../public/libs/chartist/dist/chartist.min.js',
                      '../public/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js',
                      '../public/libs/chartist/dist/chartist.ext.js',
                      '../public/assets/js/plugins/chartist.js'
                    ],
    dataTable:      [
                      '../public/libs/datatables/media/js/jquery.dataTables.min.js',
                      '../public/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js',
                      '../public/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css',
                      '../public/assets/js/plugins/datatable.js'
                    ],
    bootstrapTable: [
                      '../public/libs/bootstrap-table/dist/bootstrap-table.min.js',
                      '../public/libs/bootstrap-table/dist/extensions/export/bootstrap-table-export.min.js',
                      '../public/libs/bootstrap-table/dist/extensions/mobile/bootstrap-table-mobile.min.js',
                      '../public/assets/js/plugins/tableExport.min.js',
                      '../public/assets/js/plugins/bootstrap-table.js'
                    ],
    bootstrapWizard:[
                      '../public/libs/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js'
                    ],
    dropzone:       [
                      '../public/libs/dropzone/dist/min/dropzone.min.js',
                      '../public/libs/dropzone/dist/min/dropzone.min.css'
                    ],
    typeahead:      [
                      '../public/libs/typeahead.js/dist/typeahead.bundle.min.js',
                      '../public/assets/js/plugins/typeahead.js'
                    ],
    datepicker:     [
                      "../public/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js",
                      "../public/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css",
                    ],
    daterangepicker:[
                      "../public/libs/daterangepicker/daterangepicker.css",
                      '../public/libs/moment/min/moment-with-locales.min.js',
                      "../public/libs/daterangepicker/daterangepicker.js"
                    ],
    fullCalendar:   [
                      '../public/libs/moment/min/moment-with-locales.min.js',
                      '../public/libs/fullcalendar/dist/fullcalendar.min.js',
                      '../public/libs/fullcalendar/dist/fullcalendar.min.css',
                      '../public/libs/notie/dist/notie.min.js',
                      '../public/assets/js/plugins/notie.js',
                      '../public/assets/js/app/calendar.js'
                    ],
    parsley:        [
                      '../public/libs/parsleyjs/dist/parsley.min.js'
                    ],
    select2:        [
                      '../public/libs/select2/dist/css/select2.min.css',
                      '../public/libs/select2/dist/js/select2.min.js',
                      '../public/assets/js/plugins/select2.js'
                    ],
    summernote:     [
                      '../libs/summernote/dist/summernote.css',
                      '../libs/summernote/dist/summernote-bs4.css',
                      '../libs/summernote/dist/summernote.min.js',
                      '../libs/summernote/dist/summernote-bs4.min.js'
                    ],
    vectorMap:      [
                      '../public/libs/jqvmap/dist/jqvmap.min.css',
                      '../public/libs/jqvmap/dist/jquery.vmap.js',
                      '../public/libs/jqvmap/dist/maps/jquery.vmap.world.js',
                      '../public/libs/jqvmap/dist/maps/jquery.vmap.usa.js',
                      '../public/libs/jqvmap/dist/maps/jquery.vmap.france.js',
                      '../public/assets/js/plugins/jqvmap.js'
                    ],
    plyr:           [
                      '../public/libs/plyrist/src/plyrist.css',
                      '../public/libs/plyr/dist/plyr.polyfilled.min.js',
                      '../public/libs/wavesurfer.js/dist/wavesurfer.min.js',
                      '../public/libs/plyrist/src/plyrist.js',
                      '../public/assets/js/plugins/plyr.js'
                    ]
  };

var MODULE_OPTION_CONFIG = {
  parsley: {
    errorClass: 'is-invalid',
    successClass: 'is-valid',
    errorsWrapper: '<ul class="list-unstyled text-sm mt-1 text-muted"></ul>'
  }
}
