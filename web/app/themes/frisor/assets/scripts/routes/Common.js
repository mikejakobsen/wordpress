/* eslint-disable global-require */
import { Common } from '../util/common';

export default {
  init() {
    Common.initPace();
    Common.backgroundLazyload();
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
