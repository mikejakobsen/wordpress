import $ from 'jquery';
import 'bootstrap/dist/js/bootstrap.min';
import Router from './util/router';
import wpAdmin from './routes/Admin';
import login from './routes/Login';

const routes = {
  wpAdmin,
  login,
};

// Load Events
$(document).ready(() => new Router(routes).loadEvents());
