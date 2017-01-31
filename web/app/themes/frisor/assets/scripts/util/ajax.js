/* eslint-disable import/no-extraneous-dependencies */
/* eslint-disable import/no-unresolved */

import $ from 'jquery';
import Pace from 'pace';
import jsParams from '../jsParams';

export default class Ajax {
  /**
   * Default common endpoint
   */
  constructor(_endpoint, _data, _callback, _onError) {
    this.url = jsParams.ajaxUrl;
    this.method = 'POST';
    this.dataType = 'json';
    this.data = _data || {};

    this.endpoint = _endpoint;
    this.callback = _callback;
    this.onError = _onError;
  }

  call() {
    Pace.track(() => {
      $.ajax({
        url: this.url,
        method: this.data.method || this.method,
        data: $.extend({ action: this.endpoint }, this.data),
        dataType: this.data.dataType || this.dataType,
        success: (_response) => {
          if (typeof this.callback === 'function') {
            this.callback(_response);
          }
        },
        error: (_response) => {
          /* eslint-disable no-console */
          console.log('Ajax call failed with message:', _response);
          /* eslint-enable no-console */
          if (typeof this.onError === 'function') {
            this.onError(_response);
          }
        },
      });
    });
  }
}
