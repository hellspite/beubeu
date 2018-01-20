const $ = require('jquery');

global.$ = global.jQuery = $;

require('bootstrap-sass');

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
