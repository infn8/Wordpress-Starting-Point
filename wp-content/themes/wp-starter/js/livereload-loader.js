Modernizr.load({
  test: Modernizr.websockets,
  yep : window.location.protocol + '//' + window.location.host + ':35729/livereload.js'
});