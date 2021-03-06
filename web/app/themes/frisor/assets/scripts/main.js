// import external dependencies
import 'jquery';
import 'bootstrap/dist/js/bootstrap';

// import local dependencies
import Router from './util/router';
import common from './routes/Common';
import home from './routes/Home';
import aboutUs from './routes/About';

// jquery('.mobile-burger').on('click', () => {
//   jquery('.bar-left').toggleClass('rotateL');
//   jquery('.bar-middle').toggleClass('box-out');
//   jquery('.bar-right').toggleClass('rotateR');
//   jquery('.mobile-menu').toggle(50);
// });
//
// Fire up lazyLoading globally
window.lazySizes = require('lazysizes');

const routes = {
  // All pages
  common,
  // Home page
  home,
  // About us page, note the change from about-us to about_us.
  aboutUs,
};

// Load Events
$(document).ready(() => new Router(routes).loadEvents());
